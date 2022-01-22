<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkerLang extends Model
{
    protected $guarded=[];
    /**
     * Get the user that owns the WorkerLang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(Worker::class, 'worker_id');
    }
}
