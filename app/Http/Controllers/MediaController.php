<?php

namespace App\Http\Controllers;

use App\Http\Requests\Media\FileMultipleRequest;
use App\Http\Requests\Media\MediaRequest;
use App\Repositories\Media\MediaRepositoryInterface;
use App\Traits\MediaTrait;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    use MediaTrait;
    public function __construct(
        private MediaRepositoryInterface $mediaRepository
    ) {
    }
    public function single(MediaRequest $request)
    {
        if ($request->hasFile('file')) {
            $data = $request->validated();
            $file = $data['file'];
            $type = $this->getType($data);
            $extension = $file->getClientOriginalExtension();
            $name = $this->makeName($file, $type, $extension);
            $file->move($this->getPath($type), $name);
            $media = $this->mediaRepository->create([
                'alt' => null,
                'caption' => null,
                'type' => $type,
                'extention' => $extension,
                'file_name' => $name,
                'sort' => 1,
                'status' => 0
            ]);
            return response()->json([
                'success' => true,
                'message' => 'File uploaded successfully',
                'media' => $media,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'No file uploaded',
        ], 400);
    }
}
