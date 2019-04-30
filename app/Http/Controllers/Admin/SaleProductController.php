<?php

namespace App\Http\Controllers\Admin;

use App\Sale;
use App\Product;
use App\Tovar;
use App\Manufacturer;
use App\SaleProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class SaleProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->persona_type_id == 1) {
            $user_type = false;
            $saleproducts = SaleProduct::select(
                'sale_products.id',
                'price_up',
                'price_down',
                'manufacturers.name as manufacturer_name',
                'tovars.name as tovar_name',
                'users.name as user_name')
                ->join('users', 'sale_products.user_id', 'users.id')
                ->join('manufacturers', 'sale_products.manufacturer_id', 'manufacturers.id')
                ->join('tovars', 'sale_products.tovar_id', 'tovars.id')
                ->where('users.id', $user->id)
                ->get();

        } else {
            $user_type = true;
            $items = SaleProduct::select(
                'sale_products.id',
                'price_up',
                'price_down',
                'manufacturers.id as manufacturer_id',
                'tovar_id',
                'users.id as user_id',
                'sale_products.tovar_id',
                'manufacturers.name as manufacturer_name',
                'tovars.name as tovar_name',
                'users.name as user_name',
                'status_order'
            )
                ->join('users', 'sale_products.user_id', 'users.id')
                ->join('manufacturers', 'sale_products.manufacturer_id', 'manufacturers.id')
                ->join('tovars', 'sale_products.tovar_id', 'tovars.id')
                ->orderBy('sale_products.id', 'asc')
                ->get();
            $order = array();
            $saleproducts = array();
            foreach ($items as $item) {

                $product = Product::select()
                    ->where('products.user_id', $user->id)
                    ->where('products.tovar_id', $item->tovar_id)
                    ->where('products.count', '>', '0')
                    ->where('products.manufacturer_id', $item->manufacturer_id)
                    ->where('products.price', '>=', $item->price_up)
                    ->where('products.price', '<=', $item->price_down)
                    ->get();

                if ($product->count()) {
                    if (!in_array($item->id, $order)) {
                        array_push($order, $item->id);
                        array_push($saleproducts, $item);
                    }
                }
            }

        }


        return view('admin.saleproducts.index', [
            'saleproducts' => $saleproducts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['manufacturers'] = Manufacturer::all();
        $data['products'] = Product::all();
        $data['tovar'] = Tovar::all();
        return view('admin.saleproducts.create', [
            'saleProduct' => [],
            'data' => $data,
            'delimiter' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public
    function store(Request $request)
    {
        $items = $request->all();
        $items['user_id'] = Auth::id();
        SaleProduct::create($items);
        return redirect()->route('admin.saleproduct.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SaleProduct $saleProduct
     * @return \Illuminate\Http\Response
     */
    public
    function show(SaleProduct $saleProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SaleProduct $saleproduct
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleProduct $saleproduct)
    {
        $data['manufacturers'] = Manufacturer::all();
        $data['tovar'] = Tovar::all();
        $data['user_type'] = $this->user_type();
        return view('admin.saleproducts.edit', [
            'saleproduct' => $saleproduct,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\SaleProduct $saleProduct
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, SaleProduct $saleproduct)
    {
        dump($saleproduct);
        $product = Product::select()
            ->where('user_id', Auth::id())
            ->where('tovar_id', $saleproduct->tovar_id)
            ->where('products.count', '>', '0')
            ->where('products.manufacturer_id', $saleproduct->manufacturer_id)
            ->where('products.price', '>=', $saleproduct->price_up)
            ->where('products.price', '<=', $saleproduct->price_down)
            ->get();
        dump($product);

        if ($saleproduct->stutus_order != $request->status_order) {
            if (($saleproduct->stutus_order == 1) && ($request->status_order == 2)) {
                // записать какой магазин принял заказ
                $sale = new Sale(['user_id' => Auth::id(),
                    'sale_product_id' => $saleproduct->id]);
                $sale->save();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SaleProduct $saleProduct
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(SaleProduct $saleProduct)
    {
        //
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
