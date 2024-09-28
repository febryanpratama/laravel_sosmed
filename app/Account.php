<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $guarded = ['id'];

    // Relations
    public function fieldsInstagram()
    {
        return $this->hasOne(FieldsInstagram::class);
    }
}
