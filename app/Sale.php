<?php

namespace App;

use App\Http\Controllers\Auth;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['user_id','sale_product_id'];

    public function saleproduct()
    {
        return $this->belongsTo('App\SaleProduct');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
