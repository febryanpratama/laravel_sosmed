<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountKontens extends Model
{
    protected $casts    = ['path' => 'array'];
    protected $table    = 'account_kontens';
    protected $guarded  = [];

    // Relations
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }
}
