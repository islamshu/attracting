<?php

namespace App;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Company extends Authenticatable
{
    use Notifiable;
    protected $guarded =[];
    public function state ()
    {
        return $this->belongsTo(City::class, 'state_id');
    }
    public function govermint ()
    {
        return $this->belongsTo(City::class, 'governorate_id');
    }
}
