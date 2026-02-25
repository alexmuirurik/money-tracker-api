<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class wallet extends Model
{
    protected $fillable = [
        'user_id',
        'wallet_name',
        'wallet_address',
        'wallet_balance',
        'wallet_description',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\user');
    }

    public function transactions()
    {
        return $this->hasMany('App\Models\transaction');
    }
}
