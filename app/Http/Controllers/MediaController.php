<?php

namespace App\Http\Controllers;

use App\Http\Requests\Media\MediaRequest;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function single(MediaRequest $request)
    {
        dd($request);
    }
    public function multiple(MediaRequest $request)
    {
    }
}
