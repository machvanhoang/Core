<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait EmailTemplateTrait
{
    public static function uploadBlade($email)
    {
        return File::put(self::pathResource($email), "{{-- Code HTML HERE --}}", 0777);
    }
    public static function updateBlade($email, $content)
    {
        if (!File::exists(self::pathResource($email))) {
            self::uploadBlade($email);
        }
        return File::put(self::pathResource($email), $content, 0777);
    }
    public static function deleteBlade($email)
    {
        if (File::exists(self::pathResource($email))) {
            return File::delete(self::pathResource($email));
        }
        return false;
    }
    public static function getFileContent($email)
    {
        if (!File::exists(self::pathResource($email))) {
            self::uploadBlade($email);
        }
        return File::get(self::pathResource($email));
    }
    private static function pathResource($email)
    {
        $directoryFormTemplates = resource_path('views/email');
        if (!File::isDirectory($directoryFormTemplates)) {
            File::makeDirectory($directoryFormTemplates, 0777, true);
        }
        return $directoryFormTemplates . "/" . $email->blade_file . '.blade.php';
    }
}
