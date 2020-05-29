<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    protected $table = 'Banners';
    protected $primaryKey = 'banner_id';
    protected $fillable = ['banner_post_id'];

    public function post(){
        return $this->hasOne('App\StandardPosts','spost_id','banner_post_id');
    }
}
