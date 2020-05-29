<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class HomeController extends Controller
{
    public function index(){
        $banner = App\Banners::with(array('post' => function($query){
                                    $query->select('spost_id','spost_category_id', 'spost_title', 'created_at', 'spost_slug', 'spost_inimage','spost_author')
                                        ->with('category');
                                }))
                                ->get();
        $data = App\StandardPosts:: select('spost_category_id', 'spost_title', 'created_at', 'spost_slug', 'spost_image','spost_author')
                                    ->with(array('category'=> function($query){
                                        $query->select('cate_id', 'cate_name', 'cate_slug'); 
                                    }))->limit(9)
                                    ->get();
        return view('home',['homePosts' => $data, 'banners' => $banner]);
    }
}
