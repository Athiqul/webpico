<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia as ModelsSocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;



class SocialMedia extends Controller
{
    public function add()
    {

        return view('admin.social.add');
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "name" => ['required', 'string', 'max:255', 'min:3','unique:social_media,name'],
            "link" => ['required','max:255'],


        ]);

        if ($validate->failed()) {
            return redirect()->back()->withErrors($validate->errors())->withInput();
        }




        try{
            ModelsSocialMedia::create($request->all());
            return redirect()->route('admin.social.list')->with(['toast-type'=>'success','toast-message'=>'Social Media Added Successfully!']);
        }catch(\Exception $e){
           return redirect()->back()->withErrors($e->getMessage());
        }
    }

    //edit Testimonal
    public function edit($id)
    {
        try {

           $id=decrypt($id);
           $item=ModelsSocialMedia::findOrFail($id);
           return view('admin.social.edit',compact('item'));
        }
        catch(\Exception $e)
        {
            dd($e->getMessage());
            return redirect()->back()->withErrors($e->getMessage());
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
            $item=ModelsSocialMedia::findOrFail($id);

           //Check name is uniqu or not
           $checkName=ModelsSocialMedia::where('name','=',$item->name)->where('id','!=',$id)->first();
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
        $items=ModelsSocialMedia::get();
        return view('admin.social.index',compact('items'));
    }

    //Active Inactve testimonials
    public function statusChange($id)
    {
      //  dd("hui");
        try{

            $id=decrypt($id);
            $item=ModelsSocialMedia::findOrFail($id);
            $item->status=$item->status=='1'?'0':'1';
            $item->save();
            return redirect()->back()->with(['toast-type'=>'success','toast-message'=>"Successfully Social Media status changed to ".$item->status=='1'?'Active':'inactive']);
        }
        catch(\Exception $e){
            dd($e->getMessage());
            return redirect()->back()->with(['toast-type'=>'danger','toast-message'=>$e->getMessage()]);
        }
    }


}
