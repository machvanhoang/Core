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
        $directoryFormTemplates = resource_path('views/admin/setting/email/templates');
        if (!File::isDirectory($directoryFormTemplates)) {
            File::makeDirectory($directoryFormTemplates, 0777, true);
        }
        return $directoryFormTemplates . "/" . $email->file_name . '.blade.php';
    }

    public static function formatEmailTemplateFileName($file_name)
    {
        $file_name = str_replace(' ', '_', $file_name);
        $file_name = str_replace('-', '_', $file_name);
        $file_name = preg_replace('/[^A-Za-z0-9_\-]/', '', $file_name);
        return strtolower($file_name) . '_' . intval(microtime(true) * 1000);
    }
}
