<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use App\Service\Document\DocumentService;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{

    private $documentService;

    public function __construct(DocumentService $documentService)
    {
        $this->documentService = $documentService;
    }

    public function listFile()
    {
        $files = $this->documentService->getAllFile();

        return view('document.document', ['files' => $files]);
    }

    public function downloadFile()
    {
        $userId = 1;
        if(isset(request()->input()['user'])){
            $userId = request()->input()['user']->id;
        }
        $file = request()->input('file');
        $rawDataLog = [
            'account_id' => $userId,
            'link'       => $file,
            'created_at' => date("Y/m/d H:i:s"),
            'updated_at' => date("Y/m/d H:i:s")
        ];
        $this->documentService->storeUserDownload($rawDataLog);
        return response()->download(storage_path('app').'/'.$file);
    }
}