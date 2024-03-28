<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact as ModelsContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Contact extends Controller
{
    //view
    public function index()
    {
        $item=ModelsContact::latest()->first();
        return view('admin.contact.index',compact('item'));
    }

    //update
    public function update(Request $request)
    {
        $validate=Validator::make($request->all(),[
            "address"=>["required",'max:255','min:3'],
            "email"=>["required","email","max:255"],
            "mobile"=>["required","regex:/^(?:\+?88)?01[3-9]\d{8}$/"],
            "phone"=>["nullable","max:20","min:5"],

        ]);

        if ($validate->failed()) {
            return redirect()->back()->withErrors($validate->errors())->withInput();
        }

        $item=ModelsContact::latest()->first();

        if(!$item) {

            ModelsContact::create([
                "address"=>$request->address,
                "email"=>$request->email,
                "mobile"=>$request->mobile,
                "phone"=>$request->phone,
            ]);

            return redirect()->back()->with(['toast-type'=>'success','toast-message'=>'Contact Information has been successfully stored into system']);
        }

        $item->address=$request->address;
        $item->email=$request->email;
        $item->mobile=$request->mobile;
        $item->phone=$request->phone;

        if($item->isClean())
        {
            return redirect()->back()->with(['toast-type'=>'info','toast-message'=>'Nothing to update!']);
        }

        $item->save();


         return redirect()->back()->with(['toast-type'=>'success','toast-message'=>'Contact Information has been successfully updated!']);


    }
}
