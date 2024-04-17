<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Models\Blogs;
class BlogsController extends Controller
{
    public function add()
    {

       return view('admin.blogs.add');
    }
    public function create(Request $request)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'title' => 'required|string|max:255|unique:blogs,title',

                'image' => 'required|image|mimes:png,jpg|max:2048',
                'desc'=>'required|string',
                'tags'=>'required|string',
                'meta_keywords'=>'nullable|string',
                'meta_desc'=>'nullable|string',
                'meta_author'=>'nullable|string',

            ]);


            if ($request->hasFile('image')) {

                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();

                $path = storage_path('app/uploads/blogs/');
                if (!File::exists($path)) {
                    File::makeDirectory($path, 0777, true);
                }

                Image::make($image)->resize(997, 639)->save($path . $imageName);
            }

             //Check slugs exist
             $slug = str_replace(' ', '-',$request->title);
             //$slugs = Blogs::where('slug', $slug)->first(); It won't create dublicate value becasue titles are unique

            // Create a  blog entry
            $data = [
                'title' => $request->title,
                'image' => $imageName,
                'desc'=>$request->desc,
                'tags'=>$request->tags,
               'meta_keywords'=>$request?->meta_keywords??null,
               'meta_desc'=>$request?->meta_desc??null,
               'meta_author'=>$request?->meta_author??null,
               'slug'=>$slug,
            ];

            Blogs::create($data);

            // Redirect to a route after successful creation
            return redirect()->route('admin.blogs.index')->with(['toast-type' => 'success', 'toast-message' => 'Successfully Blog created! which are now available for web']);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with(['toast-type' => 'error', 'toast-message' => 'Somthing went wrong!'])->withInput();
        }
    }

    public function index()
    {
        // Retrieve all OurWork blog entries
        $items = Blogs::get();

        // Return a view with the retrieved data
        return view('admin.blogs.index', compact('items'));
    }

    public function edit($id)
    {
        try{
            $id=decrypt($id);
            // Find the OurWork blog entry by ID

            $item = Blogs::findOrFail($id);

            // Return a view for editing with the retrieved data
            return view('admin.blogs.edit', compact('item'));
        }catch(\Exception $e){
            return redirect()->back()->with(['toast-type'=>'error','toast-message'=>'Something went wrong!']);
        }


    }
    public function update(Request $request, $id)
    {
        try{

            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:png,jpg|max:2048',
                'desc'=>'required|string',
                'tags'=>'required|string',
                'meta_keywords'=>'nullable|string',
                'meta_desc'=>'nullable|string',
                'meta_author'=>'nullable|string',
            ]);

            // Find the OurWork blog entry by ID
            $blog = Blogs::findOrFail($id);

            //CHeck image
            $image_name=null;
            if($request->hasFile('image'))
            {
                 //check existence of image
                 if($blog->image!==null)
                {
                //delete old image
                    $path = storage_path('app/uploads/blogs/' . $blog->image);
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
                $path = $image->storeAs('blogs', $image_name, 'uploads');
                // Full path to the saved image
                $fullPath = storage_path("app/uploads/{$path}");

                Image::make($fullPath)->fit(990, 639, function ($constraint) {
                    $constraint->upsize();
                });
            }

            //Check title is unique or not
            // Update the OurWork blog entry fields
            $blog->title = $validatedData['title'];
            $blog->desc = $validatedData['desc'];
            $blog->image=$image_name??$blog->image;
            $blog->tags=$validatedData['tags'];
            $blog->meta_keywords=$validatedData['meta_keywords']??$blog->meta_keywords;
            $blog->meta_desc=$validatedData['meta_desc']??$blog->meta_desc;
            $blog->meta_author=$validatedData['meta_author']??$blog->author;


            if($blog->isClean())
            {
                return redirect()->back()->with(['toast-type'=>'info','toast-message'=>'Nothing to update!']);
            }

            if($blog->isDirty('title'))
            {
                //Check is it unique or not then create a slug
                $check=Blogs::where('id','!=',$id)->where('title',$request->title)->first();
                if($check)
                {
                    return redirect()->back()->with(['toast-type'=>'warning','toast-message'=>'This title belongs to another blogs'])->withErrors(['title'=>'This title belongs to another blogs']);
                }
                $slug = str_replace(' ', '-',$request->title);
                $blog->slug=$slug;
            }

            // Save the updated OurWork blog entry
            $blog->save();

            // Redirect to a route after successful update
            return redirect()->back()->with(['toast-type'=>'success','toast-message'=>'Blog Has been updated successfully!']);
        }catch(\Exception $e){
            dd($e->getMessage());
            return redirect()->back()->with(['toast-type'=>'error','toast-message'=>'Something went wrong!']);
        }
        // Validate the incoming request data

    }

    public function destroy($id)
    {
        // Find the OurWork blog entry by ID and delete it
        $blogBlog = Blogs::findOrFail($id);

        //Delete blog image
        $path = storage_path('app/uploads/blogs/' . $blogBlog->image);
        if(File::exists($path))
        {
            try {
                // Delete the file
                File::delete($path);
            } catch (\Exception $e) {

            }
        }
        $blogBlog->delete();
        // Redirect to a route after successful deletion
        return redirect()->route('admin.blogs.index')->with('success', 'Blog entry deleted successfully');


    }

    public function statusChange($id)
    {
        // Find the blog entry by ID
        $blogBlog = Blogs::findOrFail($id);

        // Update the blog entry status
        $blogBlog->status = $blogBlog->status == '1'? '0' : '1';

        // Save the updated  blog entry
        $blogBlog->save();

        // Redirect to a route after successful update
        return redirect()->back()->with(['toast-type'=>'success','toast-message'=>'Blog Has been updated successfully!']);
    }
}
