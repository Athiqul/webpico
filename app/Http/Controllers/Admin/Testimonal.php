<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class Testimonal extends Controller
{
    //Add new Testimonal
    public function add()
    {

        return view('admin.testimonal.add');
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "client_name" => ['required', 'string', 'max:255', 'min:3'],
            "image" => ['nullable', 'image', 'mimes:png,jpg', 'max:3096'],
            "quote" => ["rquired", 'string', 'max:255', 'min:3'],

        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors())->withInput();
        }

        //Save Image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $path = 'images/testimonal/';
            if (!File::exists(storage_path($path))) {
                File::makeDirectory(storage_path($path), 0777, true);
            }
            Image::make($image)->resize(600, 600)->save(storage_path('images/testimonal/' . $image_name));
            $image_url = 'images/testimonal/' . $image_name;
        }



        try{
            Testimonial::create([
                'client_name' => $request->client_name,
                'image' => $image_url,
                'quote' => $request->quote,
            ]);
            return redirect()->back()->with(['toast-type'=>'success','toast-message'=>'Testimonal Added Successfully!']);
        }catch(\Exception $e){
           return redirect()->back()->withErrors($e->getMessage());
        }
    }

    //edit Testimonal
    public function edit($id)
    {
    }

    public function update(Request $request, $id)
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
