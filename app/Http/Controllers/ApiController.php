<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadExcelRequest;

class ApiController extends Controller {
    public function upload(UploadExcelRequest $request) {
        $file = $request->file('file');
        $newFileName = md5_file($file->getRealPath());
        $file->move(storage_path("files"), "$newFileName.xlsx");

        return ['success' => true];
    }
}
