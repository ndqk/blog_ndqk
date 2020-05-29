<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App;


class Categories extends Controller
{
    public function filter(App\Categories $category, Request $request){
        if($request->ajax() || 'NULL'){
            $postFetchCate = App\StandardPosts:: select('spost_category_id', 'spost_title', 'created_at', 'spost_slug', 'spost_image', 'spost_author')
                                            ->with(array('category'=> function($query){
                                                $query->select('cate_id', 'cate_name', 'cate_slug'); 
                                            }))->where('spost_category_id', $category->cate_id)
                                            ->paginate(6);
            return view('category',['posts'=> $postFetchCate, 'cate' => $category]);
        }
    }
    
    public function standardPosts(Request $request){
        if($request->ajax() || 'NULL'){
            $postFetchCate = App\StandardPosts:: select('spost_category_id', 'spost_title', 'created_at', 'spost_slug', 'spost_image', 'spost_author')
                                            ->with(array('category'=> function($query){
                                                $query->select('cate_id', 'cate_name', 'cate_slug'); 
                                            }))
                                            ->paginate(6);
            return view('category',['posts'=> $postFetchCate, 'cate' => false]);
        }
    }

    public function search(Request $request){
        $key = Str::slug($request->key);
        $posts = App\StandardPosts::select('spost_category_id', 'spost_title', 'created_at', 'spost_slug', 'spost_image', 'spost_author')
                                    ->with('category')
                                    ->where('spost_slug', 'like', '%'.$key.'%')
                                    ->orWhere('spost_author', 'like', '%'.$key.'%')
                                    ->paginate(6);
        return view('category', ['posts' => $posts, 'search' => $request->key]);
    }
}
