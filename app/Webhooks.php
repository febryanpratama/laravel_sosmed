<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Webhooks extends Model
{
    protected $casts    = ['value' => 'array'];
    protected $table    = 'webhooks';
    protected $guarded  = [];
}
