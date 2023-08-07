<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }
    public function download_file()
    {
        $fileName = 'MoonStars24.apk';
        $filePath = storage_path($fileName);
        return response()->download($filePath, $fileName);
    }
}