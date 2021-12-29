<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Worker extends Model
{
    use HasTranslations;
    protected $guarded=[];
    public $translatable = ['dec','skill'];
    /**
     * Get the user that owns the Worker
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company ()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
