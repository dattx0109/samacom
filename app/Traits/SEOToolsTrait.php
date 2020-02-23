<?php
/**
 * Created by toanna
 * At 2:13 PM 13/11/2017
 * Using PhpStorm.
 */

namespace App\Traits;

use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\TwitterCard;

trait SEOToolsTrait
{
    public function setSEOMetas($metas = [])
    {
        if (isset($metas['type'])) {
            OpenGraph::setType($metas['type']);
        }

        if (isset($metas['title'])) {
            $titlePrefix = config('seotools.options.title_prefix');
            $titleSeparator = ' | '; //config('seotools.meta.defaults.separator');
            SEOMeta::setTitle($metas['title']);
            OpenGraph::setTitle($metas['title']);
            TwitterCard::setTitle($metas['title']);
        }

        if (isset($metas['description'])) {
            SEOMeta::setDescription($metas['description']);
            OpenGraph::setDescription($metas['description']);
            TwitterCard::setDescription($metas['description']);
        }

        if (isset($metas['keywords'])) {
            SEOMeta::setKeywords($metas['keywords']);
        }

        if (isset($metas['image'])) {
            OpenGraph::removeProperty('image');
            OpenGraph::addProperty('image', $metas['image']);
            TwitterCard::addImage($metas['image']);
            //@TODO: Hiện tại thư viện SEOTools chưa hỗ trợ removeImage
        }

        if (isset($metas['canonical'])) {
            SEOMeta::setCanonical($metas['canonical']);
            OpenGraph::setUrl($metas['canonical']);
        }

        if (isset($metas['alternate'])) {
            //@TODO: Hỗ trợ thêm các ngôn ngữ khác
            SEOMeta::addAlternateLanguage('vi', $metas['alternate']);
        }

        if(isset($metas['robots'])){
            $robotsMetaContentSegments = [];
            array_push($robotsMetaContentSegments, isset($metas['robots']['index']) && $metas['robots']['index'] == true ? 'index' : 'noindex');
            array_push($robotsMetaContentSegments, isset($metas['robots']['follow']) && $metas['robots']['follow'] == true ? 'follow' : 'nofollow');
            SEOMeta::addMeta('robots', implode(',', $robotsMetaContentSegments));
        }
    }

    public function setSEOMetasByEntry($entry, $postType = null)
    {
        if (in_array($entry->getMorphClass(), PostType::morphClassList())) {
            $this->setSEOMetaByPost($entry);
        }

        if ($entry->getMorphClass() == 'taxonomy' && $postType) {
            $this->setSEOMetaByTaxonomy($entry, $postType);
        }

        if ($entry->getMorphClass() == 'term' && in_array($postType, PostType::morphClassList())) {
            $this->setSEOMetaByTerm($entry, $postType);
        }

        if ($entry->getMorphClass() == 'term' && in_array($postType, ['user'])) {
            $this->setSEOMetaByTermForUser($entry);
        }

        if ($entry->getMorphClass() == 'user') {
            $this->setSEOMetaByUser($entry);
        }
    }

    public function setSEOMetaByPost($entry)
    {
        $this->setSEOMetas([
            'type' => 'article',
            'title' =>  $entry->seo_title ?: $entry->title,
            'description' => $entry->seo_description ?: $entry->description,
            'keywords' => $entry->seo_keywords ?: $entry->title,
            'image' => $entry->thumbnailFileUrl('medium-large'),
            'canonical' => $entry->getPermalink($entry->getMorphClass()),
            'alternate' => $entry->getPermalinkWithSlug($entry->getMorphClass()),
            'robots' => [
                'index' => $entry->seo_is_index,
                'follow' => $entry->seo_is_follow
            ]
        ]);
    }

    public function setSEOMetaByTaxonomy($entry, $postType)
    {
        $this->setSEOMetas([
            'title' =>  $entry->seo_title ?: $entry->name,
            'description' => $entry->seo_description ?: $entry->description,
            'keywords' => $entry->seo_keywords ?: $entry->name,
            'canonical' => $entry->getPermalink($postType),
            'alternate' => $entry->getPermalinkWithSlug($postType),
            'robots' => [
                'index' => $entry->seo_is_index,
                'follow' => $entry->seo_is_follow
            ]
        ]);
    }

    public function setSEOMetaByTerm($entry, $postType)
    {
        $titleSegments = [];

        $taxonomy = $entry->taxonomy();
        if($taxonomy){
            array_push($titleSegments, $taxonomy->name);
        }

        $entryParent = $entry->parent();
        if($entryParent){
            array_push($titleSegments, $entryParent->name);
        }

        array_push($titleSegments, $entry->seo_title ?: $entry->name);

        $this->setSEOMetas([
            'title' =>  implode(' - ', $titleSegments),
            'description' => $entry->seo_description ?: $entry->description,
            'keywords' => $entry->seo_keywords ?: $entry->name,
            'canonical' => $entry->getPermalink($postType),
            'alternate' => $entry->getPermalinkWithSlug($postType),
            'robots' => [
                'index' => $entry->seo_is_index,
                'follow' => $entry->seo_is_follow
            ]
        ]);
    }

    public function setSEOMetaByTermForUser($entry)
    {
        $titleSegments = ['Chuyên gia'];

        $taxonomy = $entry->taxonomy();
        if($taxonomy){
            array_push($titleSegments, $taxonomy->name);
        }

        $entryParent = $entry->parent();
        if($entryParent){
            array_push($titleSegments, $entryParent->name);
        }

        array_push($titleSegments, $entry->seo_title ?: $entry->name);

        $this->setSEOMetas([
            'title' =>  implode(' - ', $titleSegments),
            'description' => $entry->seo_description ?: $entry->description,
            'keywords' => $entry->seo_keywords ?: $entry->name,
            'canonical' => $entry->getPermalink('user'),
            'alternate' => $entry->getPermalinkWithSlug('user'),
            'robots' => [
                'index' => $entry->seo_is_index,
                'follow' => $entry->seo_is_follow
            ]
        ]);
    }

    public function setSEOMetaByUser($entry)
    {
        $titleSegments = [];

        if($entry->isProfessional()){
            array_push($titleSegments, 'Chuyên gia');
        }else{
            array_push($titleSegments, 'Thành viên');
        }

        array_push($titleSegments, $entry->displayName());

        $this->setSEOMetas([
            'title' =>  implode(' ', $titleSegments),
            'description' => $entry->bio ? toanna_str_sub_string($entry->bio, 200): $entry->display_name,
            'image' => $entry->avatarFileUrl('medium-large'),
            'canonical' => $entry->getPermalink(),
            'robots' => [
                'index' => false,
                'follow' => true
            ]
        ]);
    }
}
