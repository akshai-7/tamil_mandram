<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

trait FileUpload
{

    public  function FileEncrpty($file, $fileFolderName)
    {
        try {
            if ($file) {

                $image = $file;  // your base64 encoded
                $image = str_replace('data:image/png;base64,', '', $image);
                $image = str_replace(' ', '+', $image);

                // $fileContent = $file->get();


                if (Storage::exists($fileFolderName)) {
                    Storage::makeDirectory($fileFolderName); //creates directory
                }

                // Encrypt the Content
                $encryptedContent = $image;
                $file_location = $fileFolderName . '/' . date('Y-m-d-H-i-s') . '.dat';
                $result = Storage::put($file_location, $encryptedContent);


                // Check to see if we have a valid file uploaded
                return encrypt($file_location);
            }

        }catch(\Exception $e) {
            dd($e);
        }


    }

    public  function fileUploadAudio($file, $path)
    {



        if ($file->get()) {
            $extension = $file->getClientOriginalExtension();
            $fileName = date('Y-m-d H:i:s').$file->getClientOriginalName();
            if (Storage::exists($path)) {
                Storage::makeDirectory($path); //creates directory
            }
            $file_location = $path;
            $resutl = Storage::putFile($file_location, $file);
            return  $resutl;
        }
    }


    public function fileDecrypt($filePath)
    {

        try {
            $encryptedContent = Storage::get($filePath);
            $decryptedContent = '';
            if ($encryptedContent) {
                $decryptedContent = $encryptedContent;
            }
            return $decryptedContent;
        } catch (\Exception $e) {
            // dd($e);
            return '';
        }
    }

    public function getFileUrl($filePath)
    {

        $fileName = decrypt($filePath);
        $newFileName = explode('/', $fileName);
        $decryptedContent  = $this->fileDecrypt($fileName) ? base64_decode($this->fileDecrypt($fileName)) : "";

        $ImgName = str_replace(".dat",'',$newFileName[1]);

        if (Storage::exists('temp-data' . '/' .$ImgName)) {
            return  config('app.url') . '/storage/app/temp-data/' . $ImgName . '.png';
        } else {
            Storage::disk('local')->put('temp-data/' . $ImgName . '.png', $decryptedContent);
            return  config('app.url') . '/storage/app/temp-data/' . $ImgName . '.png';
        }
    }

    public function getPdfFileUrl($filePath)
    {
        $fileName = decrypt($filePath);
        return  config('app.url') . '/storage/app/'.$fileName;
    }
}
