<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $fillable = [
        'user_id',
        'wallet_id',
        'transaction_type',
        'transaction_amount',
        'transaction_description',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\user');
    }

    public function wallet()
    {
        return $this->belongsTo('App\Models\wallet');
    }
}
