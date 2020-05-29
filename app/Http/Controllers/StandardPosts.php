<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class StandardPosts extends Controller
{
    public function index($cate , App\StandardPosts $post){
        $data = App\StandardPosts::with('category')
                                ->where('spost_id', $post->spost_id)->get();
        $comments = App\Comments::where('comment_post_id',$post->spost_id)->get();
        return view('standard_post', ['spost'=>$data[0], 'comments'=>$comments]);
    }
}
