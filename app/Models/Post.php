<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Post extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'posts';
    protected $dates = ['date'];
    public $timestamps = false;

    protected $fillable = [
        'author',
        'title',
        'body',
        'date',
    ];
}
