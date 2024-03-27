<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Testimonal extends Controller
{
    //Add new Testimonal
    public function add()
    {

        return view('admin.testimonal.add');
    }

    public function store(Request $request)
    {
         $validate=Validator::make($request->all(),[
           "client_name"=>['required','string','max:255','min:3'],
           "image"=>['nullable','image','mimes:png,jpg','max:3096'],
           "quote"=>["rquired",'string','max:255','min:3'],

         ]);

         if($validate->fails())
         {
            return redirect()->back()->withErrors($validate->errors())->withInput();
         }

         //Save Image
         

    }

    //edit Testimonal
    public function edit($id)
    {

    }

    public function update(Request $request,$id)
    {

    }

    //Show All Testimonals
    public function index()
    {

    }

    //Active Inactve testimonials
    public function statusChange($id)
    {

    }


}
