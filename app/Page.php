<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';

    // разрешение заполнения полей в таблице
    protected $fillable = ['name', 'alias', 'text', 'images'];

}
