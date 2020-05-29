<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emails extends Model
{
    protected $table = 'Emails';
    protected $primaryKey = 'email_id';

    protected $fillable = ['email_email'];
}
