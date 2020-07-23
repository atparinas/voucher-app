<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    const VALID = 'valid';
    const USED = 'used';

    protected $fillable = [
        'code', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
