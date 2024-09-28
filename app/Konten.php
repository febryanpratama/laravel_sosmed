<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konten extends Model
{
    protected $guarded = ['id'];

    // Relations
    public function accountKontens()
    {
        return $this->hasMany(AccountKontens::class, 'konten_id');
    }
}
