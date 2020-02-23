<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Samacom  - Cổng thông tin việc làm nghề Sales", // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => '• Tiết kiệm thời gian tuyển dụng cho doanh nghiệp, có được nhân viên kinh doanh thiện chiến chỉ sau 5-7 ngày.
• Có được nhân sự chất lượng, đam mê yêu nghề, thái độ tốt và phù hợp với mô hình Sales của doanh nghiệp nhờ tham dự các khoá đào tạo (giúp Sales nhận định được tố chất và phong cách Sales) và Orientation Training (đào tạo tư duy cho ứng viên, giúp ứng viên hiểu rõ về doanh nghiệp, vị trí ứng tuyển và có thái độ đúng đắn khi đi phỏng vấn, đi làm)
• Giảm thiểu rủi ro cho doanh nghiệp khi ứng viên thường xuyên “bỏ bom”, nghỉ việc khi mới đi làm trong thời gian ngắn nhờ quá trình chăm sóc, định hướng chuyên sâu của đội ngũ tuyển dụng, đào tạo chuyên sâu từ chuyên gia HRP.
• Hỗ trợ tư vấn về mặt nội dung, hình ảnh khi tuyển dụng, thu hút những ứng viên tiềm năng ứng tuyển vào vị trí doanh nghiệp cần tuyển.
• Hỗ trợ đào tạo MIỄN PHÍ chuyên sâu về kiến thức và kỹ năng bán hàng cho những NVKD đã được Samacom kết nối thành công, hỗ trợ doanh nghiệp xây dựng hệ thống đào tạo.', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['Samacom','Tuyển dụng sale','Cổng thông tin việc làm ngành sale','sale jobs','việc làm sale'],
            'canonical'    => false, // Set null for using Url::current(), set false to total remove
            'robots'       => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => false, // set false to total remove
            'description' => false, // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => false,
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => false, // set false to total remove
            'description' => false, // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
