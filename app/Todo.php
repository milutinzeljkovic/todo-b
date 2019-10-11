<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{

    protected $fillable = [
        'title', 'description', 'completed', 'priority', 'users_id'
    ];
    protected $guarderd = [
        'id'
    ];
}
