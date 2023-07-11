<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.settings.email.index');
    }
}