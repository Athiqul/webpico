<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class Testimonal extends Controller
{
    //Add new Testimonal
    public function add()
    {

        return view('admin.testimonial.add');
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "client_name" => ['required', 'string', 'max:255', 'min:3'],
            "image" => ['nullable', 'image', 'mimes:png,jpg', 'max:3096'],
            "quote" => ["rquired", 'string', 'max:255', 'min:3'],
            "company_name" => ["required", 'string', 'max:255'],

        ]);

        if ($validate->failed()) {
            return redirect()->back()->withErrors($validate->errors())->withInput();
        }

        //Save Image
      //Check Image
      $image_name=null;
      if($request->hasFile('image')) {

        $file = $request->file('image');
        if (!File::isDirectory(storage_path('app/uploads/testimonials/'))) {
            File::makeDirectory(storage_path('app/uploads/testimonials/'), 0777, true, true);
        }

        // Check if the item has an existing image


        //Save image

        $image_name = uniqid() . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs('testimonials', $image_name, 'uploads');
        // Full path to the saved image
        $fullPath = storage_path("app/uploads/{$path}");

        Image::make($fullPath)->fit(600,600, function ($constraint) {
            $constraint->upsize();
        })->save($fullPath);

    }


        try{
            Testimonial::create([
                'client_name' => $request->client_name,
                'image' => $image_name,
                'quote' => $request->quote,
                'company_name' => $request->company_name,
            ]);
            return redirect()->route('admin.testimonial.list')->with(['toast-type'=>'success','toast-message'=>'Testimonal Added Successfully!']);
        }catch(\Exception $e){
           return redirect()->back()->withErrors($e->getMessage());
        }
    }

    //edit Testimonal
    public function edit($id)
    {
        try {

           $id=decrypt($id);
           $item=Testimonial::findOrFail($id);
           return view('admin.testimonial.edit',compact($item));
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
          try{
            $validate = Validator::make($request->all(), [
                "client_name" => ['required', 'string', 'max:255', 'min:3'],
                "image" => ['nullable', 'image', 'mimes:png,jpg', 'max:3096'],
                "quote" => ["rquired", 'string', 'max:255', 'min:3'],

            ]);

            if ($validate->fails()) {
                return redirect()->back()->withErrors($validate->errors())->withInput();
            }

            $id=decrypt($id);
            $item=Testimonial::findOrFail($id);

            //check Image
            $image_url=null;
            if($request->file('image'))
            {
                //Remove Previous image

                if($item->image!==null)
                {
                    unlink(storage_path($item->image));
                }

                $image = $request->file('image');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $path = 'images/testimonal/';
            if (!File::exists(storage_path($path))) {
                File::makeDirectory(storage_path($path), 0777, true);
            }
            Image::make($image)->resize(600, 600)->save(storage_path('images/testimonal/' . $image_name));
            $image_url = 'images/testimonal/' . $image_name;
            }

            $item->client_name=$request->client_name;
            $item->image=$image_url==null?$item->image:$image_url;
            $item->quote=$request->quote;

            if($item->isClean())
            {
                return redirect()->back()->with(['toast-type'=>'info','toast-message'=>'Nothing to update!']);
            }

            $item->save();

            return redirect()->back()->with(['toast-type'=>'success','toast-message'=>'Testimonial has been updated!']);
          }catch(\Exception $e)

          {
            return redirect()->back()->withErrors($e->getMessage());
          }
    }

    //Show All Testimonals
    public function index()
    {
        $items=Testimonial::get();
        return view('admin.testimonial.index',compact('items'));
    }

    //Active Inactve testimonials
    public function statusChange($id)
    {
      //  dd("hui");
        try{

            $id=decrypt($id);
            $item=Testimonial::findOrFail($id);
            $item->status=$item->status=='1'?'0':'1';
            $item->save();
            return redirect()->back()->with(['toast-type'=>'success','toast-message'=>"Successfully Testimonial status changed to ".$item->status=='1'?'Active':'inactive']);
        }
        catch(\Exception $e){
            dd($e->getMessage());
            return redirect()->back()->with(['toast-type'=>'danger','toast-message'=>$e->getMessage()]);
        }
    }

    public function image($folder,$image)
    {


        $path = 'uploads/'.$folder.'/' . $image;

        // Check if the file exists
        if (Storage::exists($path)) {
            // Get the MIME type of the file
            $mimeType = Storage::mimeType($path);

            // Set the appropriate headers for the response
            $headers = [
                'Content-Type' => $mimeType,
            ];

            // Return the file as a response
            return response()->file(storage_path("app/{$path}"), $headers);
        } else {
            // File not found, return a 404 response
            return response()->json(['error' => 'File not found'], 400);
        }
    }
}
