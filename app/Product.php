<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['user_id', 'tovar_id', 'manufacturer_id', 'price', 'count'];


    // получение производителей ,'name'
    public function manufacturer()
    {
        return $this->belongsTo('App\Manufacturer');
    }

    public function tovar()
    {
        return $this->belongsTo('App\Tovar');
    }
}
