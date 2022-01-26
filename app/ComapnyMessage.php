<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComapnyMessage extends Model
{
    protected $guarded=[];
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    /**
     * Get all of the comments for the ComapnyMessage
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function megs()
    {
        return $this->hasMany(ComapnyReplay::class, 'message_id');
    }
}
