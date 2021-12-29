<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class FirstSection extends Model
{
    use HasTranslations;
    protected $guarded=[];
    public $translatable = ['first_title','first_dec','secand_title','secand_dec','third_title','third_dec','fourth_title','fourth_dec'];
}
