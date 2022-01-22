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
    public function state ()
    {
        return $this->belongsTo(City::class, 'state_id');
    }
    public function govermint ()
    {
        return $this->belongsTo(City::class, 'governorate_id');
    }
    /**
     * Get all of the comments for the Worker
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
   

}
