<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        //need id and image url colum 
        $image=Image::select('id','image as url')->get();
        return response()->json($image);
    }
}
