<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServicesCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function add()
    {
        $categories=ServicesCategory::get();
        if(count($categories)<1)
        {
            return redirect()->route('admin.service.category')->with(['toast-type'=>'warning','toast-message'=>'Please Add Category for create new service']);
        }
       return view('admin.services.add',compact('categories'));
    }
    public function create(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'category_id' => 'required|exists:services_categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',

            'desc' => 'required',
        ]);



        // Create a new service blog entry
        $serviceBlog = Service::create($request->all());

        // Redirect to a route after successful creation
        return redirect()->route('admin.service.index')->with(['toast-type' => 'success', 'toast-message' => 'Successfully Services created! which are now available for']);
    }

    public function index()
    {
        // Retrieve all service blog entries
        $items = Service::with(['category','subcategory'])->get();

        // Return a view with the retrieved data
        return view('admin.services.index', compact('items'));
    }

    public function edit($id)
    {
        try{
            $id=decrypt($id);
            // Find the service blog entry by ID
            $categories=ServicesCategory::get();
            $item = Service::with(['category','subcategory'])->findOrFail($id);

            // Return a view for editing with the retrieved data
            return view('admin.services.edit', compact('item','categories'));
        }catch(\Exception $e){
            return redirect()->back()->with(['toast-type'=>'error','toast-message'=>'Something went wrong!']);
        }


    }
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'category_id' => 'required',
            'sub_category_id' => 'nullable',
            'desc' => 'required',
        ]);

        // Find the service blog entry by ID
        $serviceBlog = Service::findOrFail($id);

        // Update the service blog entry fields
        $serviceBlog->category_id = $validatedData['category_id'];
        $serviceBlog->sub_category_id = $validatedData['sub_category_id']??null;
        $serviceBlog->desc = $validatedData['desc'];

        if($serviceBlog->isClean())
        {
            return redirect()->back()->with(['toast-type'=>'info','toast-message'=>'Nothing to update!']);
        }
        // Save the updated service blog entry
        $serviceBlog->save();

        // Redirect to a route after successful update
        return redirect()->back()->with(['toast-type'=>'success','toast-message'=>'Service Has been updated successfully!']);
    }

    public function destroy($id)
    {
        // Find the service blog entry by ID and delete it
        $serviceBlog = Service::findOrFail($id);
        $serviceBlog->delete();

        // Redirect to a route after successful deletion
        return redirect()->route('admin.service.index')->with('success', 'Service blog entry deleted successfully');
    }

    public function statusChange($id)
    {
        // Find the service blog entry by ID
        $serviceBlog = Service::findOrFail($id);

        // Update the service blog entry status
        $serviceBlog->status = $serviceBlog->status == 1? 0 : 1;

        // Save the updated service blog entry
        $serviceBlog->save();

        // Redirect to a route after successful update
        return redirect()->back()->with(['toast-type'=>'success','toast-message'=>'Service Has been updated successfully!']);
    }

    public function categoryWiseSub($id)
    {
        $subItems=SubCategory::where('category_id',$id)->get();
        return response()->json($subItems);
    }
}
