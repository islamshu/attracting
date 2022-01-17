<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SendMessage extends Model
{
    protected $guarded=[];
    /**
     * Get the user that owns the SendMessage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
