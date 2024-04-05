<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\SubCategory;

class ServicesSubCategory extends Controller
{

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "name" => ['required', 'string', 'max:255', 'min:3','unique:sub_categories,name'],
            "category_id" => ['required','exists:services_categories,id'],


        ]);

        if ($validate->fails()) {
              return response()->json([
                "error" =>true,
                "message" => $validate->errors(),
              ]);
        }


         SubCategory::create(
            [
                "name"=>$request->name,
                "slug"=>str_replace(' ','_', strtolower($request->name)),
                "category_id"=>$request->category_id,
            ]
         );

         return response()->json([
            "error" =>false,
            "message" => "Services Sub Category Created Successfully",
         ]);





    }

    public function edit($id)
    {
        $item=SubCategory::with('category')->find($id);
        if(!$item)
        {
            return response()->json(['error' =>true, "message" => "Category not found!"]);
        }
        $item=[
            "category" => $item->category->name,
            "category_id" => $item->category->id,
            "id" => $item->id,
            "name" => $item->name,
            "slug" => $item->slug,
        ];
        return response()->json(['error'=>false,'payload'=>$item]);
    }

    public function update(Request $request, $id)
    {
          try{
            $validate = Validator::make($request->all(), [
                "name" => ['required', 'string', 'max:255', 'min:3'],
                "category_id" => ['required','exists:services_categories,id'],

            ]);

            if ($validate->fails()) {
                return response()->json([
                    "error" =>true,
                    "message" => $validate->errors(),
                ]);
            }

            $item=SubCategory::with('category')->findOrFail($id);

           //Check name is uniqu or not
           $checkName=SubCategory::where('name','=',$item->name)->where('id','!=',$id)->first();
           if($checkName)
           {
               return response()->json([
                   "error" =>true,
                   "message" => ["name"=>"Name already exists!"],
               ]);
           }


            $item->name=$request->name;
            $item->category_id=$request->category_id;




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
                "message" => "Services Sub Category Updated Successfully",
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
        $items=SubCategory::with('category')->get();
        $items=$items->map(function($item){
           return [
             'id'=>$item->id,
             'name'=>$item->name,
             'slug'=>$item->slug,
             'category'=>$item->category->name,
           ];
        });
        return response()->json(
            $items,
            200
        );
    }


    public function showServiceSubCategoryPage()
    {
        return view('admin.services.subcategory.index');
    }
}
