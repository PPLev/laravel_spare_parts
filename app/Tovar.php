<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tovar extends Model
{
    protected $fillable = ['name'];

    public function product()
    {
        return $this->hasMany('App\Product');
    }

}
