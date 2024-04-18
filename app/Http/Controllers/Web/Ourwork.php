<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\OurWork as ModelsOurWork;
use Illuminate\Http\Request;

class Ourwork extends Controller
{
    public function index()
    {
        $items=ModelsOurWork::where('status','1')->latest()->get();

        return view('web.ourwork.index',compact('items'));
    }
}
