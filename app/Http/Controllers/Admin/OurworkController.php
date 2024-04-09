<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class OurworkController extends Controller
{
    public function add()
    {

       return view('admin.ourwork.add');
    }
    public function create(Request $request)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'by' => 'required|string|max:255',

                'image' => 'required|image|mimes:png,jpg|max:2048',
            ]);


            if ($request->hasFile('image')) {

                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();

                $path = storage_path('app/uploads/ourwork/');
                if (!File::exists($path)) {
                    File::makeDirectory($path, 0777, true);
                }

                Image::make($image)->resize(308, 206)->save($path . $imageName);
            }

            // Create a new OurWork blog entry
            $data = [
                'title' => $request->title,
                'by' => $request->by,
                'image' => $imageName,
            ];

            OurWork::create($data);

            // Redirect to a route after successful creation
            return redirect()->route('admin.ourwork.index')->with(['toast-type' => 'success', 'toast-message' => 'Successfully Ourwork created! which are now available for web']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['toast-type' => 'error', 'toast-message' => 'Somthing went wrong!']);
        }
    }

    public function index()
    {
        // Retrieve all OurWork blog entries
        $items = OurWork::get();

        // Return a view with the retrieved data
        return view('admin.ourwork.index', compact('items'));
    }

    public function edit($id)
    {
        try{
            $id=decrypt($id);
            // Find the OurWork blog entry by ID

            $item = OurWork::findOrFail($id);

            // Return a view for editing with the retrieved data
            return view('admin.ourwork.edit', compact('item'));
        }catch(\Exception $e){
            return redirect()->back()->with(['toast-type'=>'error','toast-message'=>'Something went wrong!']);
        }


    }
    public function update(Request $request, $id)
    {
        try{

            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'by' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:png,jpg|max:2048',
            ]);

            // Find the OurWork blog entry by ID
            $ourWork = OurWork::findOrFail($id);

            //CHeck image
            $image_name=null;
            if($request->hasFile('image'))
            {
                 //check existence of image
                 if($ourWork->image!==null)
                {
                //delete old image
                    $path = storage_path('app/uploads/ourwork/' . $ourWork->image);
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
                $image = $request->file('image');
                $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('ourwork', $image_name, 'uploads');
                // Full path to the saved image
                $fullPath = storage_path("app/uploads/{$path}");

                Image::make($fullPath)->fit(308, 206, function ($constraint) {
                    $constraint->upsize();
                });
            }
            // Update the OurWork blog entry fields
            $ourWork->title = $validatedData['title'];
            $ourWork->by = $validatedData['by']??null;
            $ourWork->desc = $validatedData['desc'];
            $ourWork->image=$image_name??$ourWork->image;

            if($ourWork->isClean())
            {
                return redirect()->back()->with(['toast-type'=>'info','toast-message'=>'Nothing to update!']);
            }
            // Save the updated OurWork blog entry
            $ourWork->save();

            // Redirect to a route after successful update
            return redirect()->back()->with(['toast-type'=>'success','toast-message'=>'OurWork Has been updated successfully!']);
        }catch(\Exception $e){
            return redirect()->back()->with(['toast-type'=>'error','toast-message'=>'Something went wrong!']);
        }
        // Validate the incoming request data

    }

    public function destroy($id)
    {
        // Find the OurWork blog entry by ID and delete it
        $OurWorkBlog = OurWork::findOrFail($id);
        $OurWorkBlog->delete();

        // Redirect to a route after successful deletion
        return redirect()->route('admin.OurWork.index')->with('success', 'OurWork blog entry deleted successfully');
    }

    public function statusChange($id)
    {
        // Find the OurWork blog entry by ID
        $OurWorkBlog = OurWork::findOrFail($id);

        // Update the OurWork blog entry status
        $OurWorkBlog->status = $OurWorkBlog->status == '1'? '0' : '1';

        // Save the updated OurWork blog entry
        $OurWorkBlog->save();

        // Redirect to a route after successful update
        return redirect()->back()->with(['toast-type'=>'success','toast-message'=>'OurWork Has been updated successfully!']);
    }

    public function categoryWiseSub($id)
    {
        $subItems=SubCategory::where('title',$id)->get();
        return response()->json($subItems);
    }
}
