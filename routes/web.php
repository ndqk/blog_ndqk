<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Comments;
use App\StandardPost;
use App\Banners;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@index');

Route::get('/category/{category}', 'Categories@filter');

Route::get('/category/{category}/{post}', 'StandardPosts@index');

Route::post('/comment/{id}', 'Comments@index');

Route::get('/videos', function () {
    return 'video';
});

Route::get('/search', 'Categories@search');

Route::get('/photos', function () {
    return 'photos';
});

Route::get('/standard-post','Categories@standardPosts');

Route::get('/about', function () {
    return view('page-about');   
});

Route::get('/contact', function () {
    return view('page-contact');
});

Route::post('/contact/send', function (Request $request) {
    if($request->get('cEmail') && $request->get('cMessage')){
        $data = $request->only(['cEmail', 'cMessage']);
        $contact = new App\Contacts([
            'contact_email' => $data['cEmail'],
            'contact_message' => $data['cMessage']
        ]);
        $contact->save();    
    }
    return back()->withInput();
});

//admin

Route::get('/admin', function () {
    return view('admin');
});

Route::get('admin/table/{view}', function ($view){
    return view("admin/tables/$view");
});

Route::get('/admin/form/{view}', function ($view) {
    $data =App\Banners::with(array('post' => function($query){
        $query->select('spost_id','spost_category_id', 'spost_title', 'created_at', 'spost_slug', 'spost_inimage','spost_author')
            ->with('category');
    }))
    ->get();
    return view("admin/forms/$view", ['Banners' => $data]);
});

Route::get('/admin/chart/{view}', function ($view) {
    return view("admin/charts/$view");
});

Route::get('admin/calendar', function () {
    return view('admin/calendar');
});

Route::get('/admin/login', function () {
    return view('admin/login');
});

Route::get('/init', function () {
        // $post = new StandardPosts([
        //     'spost_category_id' => rand(1,3),
        //     'spost_title' => 'This Is A Standard Format Post.',
        //     'spost_author' => 'NDQK',
        //     'spost_content' => Str::random(100),
        //     'spost_tag' => 'Camera',
        //     'spost_comment_count' => rand(0,10),
        //     'spost_image' => 'images/thumbs/post/lamp-400.jpg',
        // ]);
        // $post->save();
        // $comment = new App\Comments([
        //     'comment_post_id' => rand(2,13), 
        //     'comment_author' => 'NDQK'.rand(1,10),
        //     'comment_email' => Str::random(12).'@gmail.com', 
        //     'comment_content' => Str::random(20)
        // ]);
        // $comment->save();
        // $topPost = new App\TopPost([
        //     'top_post_id' => 10
        // ]);
        // $topPost->save();
        // return App\TopPost::with(array('post' => function($query){
        //                         $query->select('spost_id','spost_category_id','spost_title', 'spost_image', 'spost_author','created_at')
        //                               ->with('category');
        //                     })
        //                     )->limit(1)
        //                     ->get();

        // $banner = new App\Banners(['banner_post_id' => 5]);
        // $banner->save();
        // return App\Banners::with(array('post' => function($query){
        //     $query->select('spost_id','spost_category_id', 'spost_title', 'created_at', 'spost_slug', 'spost_image','spost_author')
        //             ->with('category');
        // }))
        // ->get();
});
