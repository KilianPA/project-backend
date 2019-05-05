<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $table = 'users_music';


    protected $fillable = ['user_id', 'music_data', 'field'];
}
