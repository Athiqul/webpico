<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index()
    {
        $items=Blogs::where('status','1')->latest()->simplePaginate(15);
        $tags=Blogs::where('status','1')->select('tags')->get();
        $recentBlogs=Blogs::where('status','1')->latest()->take(5)->get();
        $tagList='';
        foreach ($tags as $key=>$tag) {
            if(count($tags)==++$key)
            {
                $tagList.=$tag->tags;
                break;
            }
            $tagList.=$tag->tags.',';
        }

        $tagList=explode(',',$tagList);
        $tagList=array_unique($tagList);
        return view('web.blogs.index',compact('tagList','items','recentBlogs'));
    }

    public function details($id)
    {
        try{
           $i=decrypt($id);
           $item=Blogs::findOrFail($i);
           $tags=Blogs::where('status','1')->select('tags')->get();
        $recentBlogs=Blogs::where('status','1')->latest()->take(5)->get();
        $tagList='';
        foreach ($tags as $key=>$tag) {
            if(count($tags)==++$key)
            {
                $tagList.=$tag->tags;
                break;
            }
            $tagList.=$tag->tags.',';
        }

        $tagList=explode(',',$tagList);
        $tagList=array_unique($tagList);
           //dd($item);
           return view('web.blogs.blog_details',compact('item','tagList','recentBlogs'));
        }catch(\Exception $e){

        }
    }

    public function tagWise(Request $request)
    {
         $tag=$request->tag;

       // dd($tag);
        $items=Blogs::where('tags','like',"%$tag%")->latest()->simplePaginate(15);
        $tags=Blogs::where('status','1')->select('tags')->get();
        $recentBlogs=Blogs::where('status','1')->latest()->take(5)->get();
        $tagList='';
        foreach ($tags as $key=>$tag) {
            if(count($tags)==++$key)
            {
                $tagList.=$tag->tags;
                break;
            }
            $tagList.=$tag->tags.',';
        }

        $tagList=explode(',',$tagList);
        $tagList=array_unique($tagList);
        return view('web.blogs.index',compact('tagList','items','recentBlogs'));

    }
}
