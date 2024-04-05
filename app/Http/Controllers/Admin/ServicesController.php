<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function add()
    {
       return view('admin.services.add');
    }
    public function create(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'category_id' => 'required',
            'sub_category_id' => 'required',

            'desc' => 'required',
        ]);



        // Create a new service blog entry
        $serviceBlog = Service::create([
            'category_id' => $validatedData['category_id'],
            'sub_category_id' => $validatedData['sub_category_id'],
            'desc' => $validatedData['desc'],
        ]);

        // Redirect to a route after successful creation
        return redirect()->route('admin.service.index')->with(['toast-type' => 'success', 'toast-message' => 'Successfully Services created! which are now available for']);
    }

    public function index()
    {
        // Retrieve all service blog entries
        $items = Service::get();

        // Return a view with the retrieved data
        return view('admin.services.index', compact('items'));
    }

    public function edit($id)
    {
        // Find the service blog entry by ID
        $item = Service::findOrFail($id);

        // Return a view for editing with the retrieved data
        return view('admin.services.edit', compact('serviceBlog'));
    }
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'desc' => 'required',
        ]);

        // Find the service blog entry by ID
        $serviceBlog = Service::findOrFail($id);

        // Update the service blog entry fields
        $serviceBlog->category_id = $validatedData['category_id'];
        $serviceBlog->sub_category_id = $validatedData['sub_category_id'];
        $serviceBlog->desc = $validatedData['desc'];


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
}
