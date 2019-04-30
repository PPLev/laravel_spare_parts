<?php

namespace App\Http\Controllers;

use App\Product;
use App\SaleProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',[
            'count_product' => Product::count(),
            'order_product' => SaleProduct::count(),
            'user_type' => $this->user_type()
        ]);
    }
    public function user_type()
    {
        if(Auth::user()->persona_type_id != 1){
            return true;
        }else{
            return false;
        }
    }

}
