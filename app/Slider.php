<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Slider extends Model
{
    use HasTranslations;
    protected $guarded=[];
    public $translatable = ['main_title','title','text_button'];
}
