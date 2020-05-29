<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class Comments extends Controller
{
    public function index(Request $request, $id){
        if($request->get('submit')){
            $form = $request->only(['cName', 'cEmail', 'cMessage']);
            $comment = new App\Comments([
                'comment_post_id' => $id,
                'comment_author' => $form['cName'],
                'comment_email' => $form['cEmail'],
                'comment_content' => $form['cMessage']
            ]);
            App\StandardPosts::where('spost_id', $id)->increment('spost_comment_count');
            $comment->save();
        }
        return back()->withInput();
    }
}
