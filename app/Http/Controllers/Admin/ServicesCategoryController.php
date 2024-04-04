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

    //edit Testimonal
    public function edit($id)
    {
        try {

           $id=decrypt($id);
           $item=ServicesCategory::findOrFail($id);

        }
        catch(\Exception $e)
        {
            dd($e->getMessage());

        }
    }

    public function update(Request $request, $id)
    {
          try{
            $validate = Validator::make($request->all(), [
                "name" => ['required', 'string', 'max:255', 'min:3'],
            "link" => ['required','max:255'],

            ]);

            if ($validate->failed()) {
                return redirect()->back()->withErrors($validate->errors())->withInput();
            }

            $id=decrypt($id);
            $item=ServicesCategory::findOrFail($id);

           //Check name is uniqu or not
           $checkName=ServicesCategory::where('name','=',$item->name)->where('id','!=',$id)->first();
           if($checkName)
           {
               return redirect()->back()->with(['toast-type'=>'warning','toast-message'=>'Name Already Exist']);
           }


            $item->name=$request->name;
            $item->link=$request->link;


            if($item->isClean())
            {
                return redirect()->back()->with(['toast-type'=>'info','toast-message'=>'Nothing to update!']);
            }

            $item->save();

            return redirect()->back()->with(['toast-type'=>'success','toast-message'=>'Socail Media has been updated!']);
          }catch(\Exception $e)

          {
            dd($e->getMessage());
            return redirect()->back()->with(['toast-type'=>'danger','toast-message'=>'Something went wrong!']);
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
