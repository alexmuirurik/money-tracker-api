<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $fillable = [
        'wallet_id',
        'transaction_type',
        'transaction_amount',
        'transaction_description',
    ];

    public function wallet()
    {
        return $this->belongsTo('App\Models\wallet');
    }
}
