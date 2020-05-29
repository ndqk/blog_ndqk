<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        $data = App\Categories::all();
        View::share('categories', $data);
        $toppost =  App\TopPost::with(array('post' => function($query){
                                    $query->select('spost_id','spost_category_id','spost_title', 'spost_image', 'spost_author','created_at', 'spost_slug')
                                          ->with('category');
                                }))
                                ->limit(6)
                                ->get();

        View::share('toppost', $toppost);
        View::share('path',explode('/',$request->path()));
    }
}
