<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    protected $table    = 'user_list';
    
    protected $fillable = [
        'first_name','last_name','email','phone','created_at','updated_at'
    ];
}