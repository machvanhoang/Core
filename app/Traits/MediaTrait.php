<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait MediaTrait
{
    private function getType(array $data = [])
    {
        return  $data['type'] ?? 'media';
    }
    private function getPath(string $type = 'media')
    {
        if (!File::isDirectory('uploads/temp/')) {
            File::makeDirectory(public_path('uploads/temp/'), 0777, true);
        }
        return public_path('uploads/temp/') . $type;
    }
    private function makeName(object $image, string $type = 'media', string $extension = null)
    {
        $currentName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $newName = $currentName . "_" . uniqid() . "." . $extension;
        while (File::exists($this->getPath($type) . $newName)) {
            $newName =  $currentName . "_" . uniqid() . "." . $extension;
        }
        return $newName;
    }
}
