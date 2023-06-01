<?php


namespace App\Utils;


use Illuminate\Support\Facades\File;


class Helper
{
    //Save File
    public static function saveFile($oldFile = null, $newFile, $filePath, $fileName = null)
    {
        try {
            $public_path = public_path($filePath);
            File::isDirectory($public_path) or File::makeDirectory($public_path, 0777, true, true);
            if ($oldFile) {
                @unlink($oldFile);
            }
            if ($fileName) {
                $filename = $fileName . '-' . time();
            } else {
                $filename = time() . rand(10000, 99999) . '-' . $newFile->getClientOriginalName();
            }

            $newFile->move($public_path, $filename);
            return $filePath . $filename;
        } catch (\Exception $exception) {
            return null;
        }
    }
}
