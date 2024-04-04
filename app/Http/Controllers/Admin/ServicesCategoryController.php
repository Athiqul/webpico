<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServicesCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServicesCategoryController extends Controller
{


    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "name" => ['required', 'string', 'max:255', 'min:3','unique:services_categories,name'],


        ]);

        if ($validate->fails()) {
              return response()->json([
                "error" =>true,
                "message" => $validate->errors(),
              ]);
        }


         ServicesCategory::create(
            [
                "name"=>$request->name,
                "slug"=>str_replace(' ','_', strtolower($request->name)),
            ]
         );

         return response()->json([
            "error" =>false,
            "message" => "Services Category Created Successfully",
         ]);





    }

    public function edit($id)
    {
        $item=ServicesCategory::find($id);
        if(!$item)
        {
            return response()->json(['error' =>true, "message" => "Category not found!"]);
        }
        return response()->json(['error'=>false,'payload'=>$item]);
    }

    public function update(Request $request, $id)
    {
          try{
            $validate = Validator::make($request->all(), [
                "name" => ['required', 'string', 'max:255', 'min:3'],

            ]);

            if ($validate->fails()) {
                return response()->json([
                    "error" =>true,
                    "message" => "invalid Category Name!",
                ]);
            }

            $item=ServicesCategory::findOrFail($id);

           //Check name is uniqu or not
           $checkName=ServicesCategory::where('name','=',$item->name)->where('id','!=',$id)->first();
           if($checkName)
           {
               return response()->json([
                   "error" =>true,
                   "message" => "Name Already Exist",
               ]);
           }


            $item->name=$request->name;


            if($item->isClean())
            {
                return response()->json([
                    "error" =>true,
                    "message" => "Nothing to update!",
                ]);
            }

            $item->save();

            return response()->json([
                "error" =>false,
                "message" => "Services Category Updated Successfully",
            ]);
          }catch(\Exception $e)

          {
            dd($e->getMessage());
            return response()->json([
                "error" =>true,
                "message" => "Something went wrong!",
            ]);
          }
    }


    //Show All Testimonals
    public function index()
    {
        $items=ServicesCategory::get();
        return response()->json(
            $items,
            200
        );
    }


    public function showServiceCategoryPage()
    {
        return view('admin.services.category.index');
    }


}
