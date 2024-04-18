<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\About as ModelsAbout;
use Illuminate\Http\Request;

class About extends Controller
{
    public function index()
    {
        $about=ModelsAbout::latest()->first();
        return view('web.about.index',compact('about'));
    }
}
