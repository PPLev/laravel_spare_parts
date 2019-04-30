<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
    protected $fillable = ['user_id','sale_id','tovar_id','price_up','price_down','manufacturer_id','status_order'];

    public function sale() {
        return $this->belongsTo('App\Sale');
    }
    public function user() {
        return $this->belongsTo('App\Sale');
    }
    public function tovar() {
        return $this->belongsTo('App\Tovar');
    }
    public function manufacturer() {
        return $this->belongsTo('App\Manufacturer');
    }

}
