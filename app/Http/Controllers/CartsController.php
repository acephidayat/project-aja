<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function index()
    {
        $carts = Cart::where('paid', false)->get()->groupBy('product_id');

        $prices = $carts->map(function ($row) {
            return $row->reduce(function ($item, $cart) {
                return $cart->product->price + $item;
            });
        });

        $sub_total = $prices->reduce(function ($item, $cart) {
            return $cart + $item;
        });

        return view('cart.index', [
            'carts' => $carts,
            'sub_total' => $sub_total
        ]);
    }
    public function store()
    {
        Carts::create([
            'product_id'=>request('product_id')
        ]);

        return back();
    }
    public function destroy($id)
    {
        $carts = Cart::where('product_id', $id)->get();
        Cart::where('id', $carts[0]->id)->first()->delete();

        // noty()->danger('Whops', 'Keranjang Belanja telah di kurangi');
        return back();
    }
}
