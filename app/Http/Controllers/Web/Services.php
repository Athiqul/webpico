<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class Services extends Controller
{
    public function index()
    {
        $items=Service::with(['category','subcategory'])->where('status','1')->latest()->take(10)->get();
       // dd($items);
        return view('web.services.index',compact('items'));
    }
}
