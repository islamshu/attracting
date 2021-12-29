<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Work extends Model
{
    use HasTranslations;
    protected $guarded=[];
    public $translatable = ['dec','title'];
}
