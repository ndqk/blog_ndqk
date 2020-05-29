<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table = 'Contacts';
    protected $primaryKey = 'contact_id';

    protected $fillable = ['contact_email', 'contact_message'];
}
