<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class AboutPage extends Controller
{
    public function edit()
    {
        try{

            // Find the OurWork blog entry by ID

            $item = About::latest()->first();

            // Return a view for editing with the retrieved data
            return view('admin.about.edit', compact('item'));
        }catch(\Exception $e){
            return redirect()->back()->with(['toast-type'=>'error','toast-message'=>'Something went wrong!']);
        }


    }

    public function update(Request $request)
    {
        try{

            $validatedData = $request->validate([
                'about_title' => 'required|string|max:255|min:3',
                'about_short_desc' => 'required|min:3',
                'about_left_desc' => 'required|min:3',
                'about_right_desc' => 'required|min:3',
                'left_image' => 'required|image|mimes:png,jpg|max:2048',
                'right_image' => 'required|image|mimes:png,jpg|max:2048',
                'video_link'=>'required|string|max:255',

            ]);

            // Find the About latest row
            $about = About::latest()->first();


            $left_image=null;
            $right_image=null;
            if($request->hasFile('left_image'))
            {
                 //check existence of images if about exist
                 if($about)
                 {
                    $path = storage_path('app/uploads/about/' . $about->left_image);
                    if(File::exists($path))
                    {
                        try {
                            // Delete the file
                            File::delete($path);
                        } catch (\Exception $e) {

                        }
                    }
                 }


                //Save the image
                $image = $request->file('left_image');
                $left_image = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('about', $left_image, 'uploads');
                // Full path to the saved image
                $fullPath = storage_path("app/uploads/{$path}");

                Image::make($fullPath)->fit(1100, 880, function ($constraint) {
                    $constraint->upsize();
                });
            }
            if($request->hasFile('right_image'))
            {
                 //check existence of images if about exist
                 if($about)
                 {
                    $path = storage_path('app/uploads/about/' . $about->right_image);
                    if(File::exists($path))
                    {
                        try {
                            // Delete the file
                            File::delete($path);
                        } catch (\Exception $e) {

                        }
                    }
                 }


                //Save the image
                $image = $request->file('right_image');
                $right_image = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('about', $right_image, 'uploads');
                // Full path to the saved image
                $fullPath = storage_path("app/uploads/{$path}");

                Image::make($fullPath)->fit(1100, 880, function ($constraint) {
                    $constraint->upsize();
                });
            }

            //About is not added yet
            if(!$about)
            {
               $data=[
                'about_title'=>$validatedData['about_title'],
                'about_short_desc'=>$validatedData['about_short_desc'],
                'about_left_desc'=>$validatedData['about_left_desc'],
                'about_right_desc'=>$validatedData['about_right_desc'],
                'left_image'=>$left_image,
                'right_image'=>$right_image,
                'video_link'=>$validatedData['video_link'],
               ];

               About::create($data);
               return redirect()->back()->with(['toast-type'=>'success','toast-message'=>'About page updated successfully!']);
            }

            $about->about_title = $validatedData['about_title'];
            $about->about_short_desc = $validatedData['about_short_desc'];
            $about->about_left_desc = $validatedData['about_left_desc'];
            $about->about_right_desc = $validatedData['about_right_desc'];
            $about->left_image=$left_image??$about->left_image;
            $about->right_image=$right_image??$about->right_image;
            $about->video_link=$validatedData['video_link'];



            if($about->isClean())
            {
                return redirect()->back()->with(['toast-type'=>'info','toast-message'=>'Nothing to update!']);
            }



            // Save the updated OurWork blog entry
            $about->save();

            // Redirect to a route after successful update
            return redirect()->back()->with(['toast-type'=>'success','toast-message'=>'About Page updated successfully!']);
        }catch(\Exception $e){
            dd($e->getMessage());
            return redirect()->back()->with(['toast-type'=>'error','toast-message'=>'Something went wrong!']);
        }
        // Validate the incoming request data

    }
}
