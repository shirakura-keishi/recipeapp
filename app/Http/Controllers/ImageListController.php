<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UploadImage;

class ImageListController extends Controller
{
    function show()
    {
        $uploads = UploadImage::orderBy("id", "desc")->get();
        return view("image_list", ["images" => $uploads]);
    }
}
