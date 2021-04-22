<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function index()
    {
        $carts = Carts::where('paid', false)->get()->groupBy('product_id');

        $prices = $carts->map(function ($row) {
            return $row->reduce(function ($item, $carts) {
                return $carts->product->price + $item;
            });
        });

        $sub_total = $prices->reduce(function ($item, $carts) {
            return $carts + $item;
        });

        return view('carts.index', [
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
        $carts = Carts::where('product_id', $id)->get();
        Carts::where('id', $carts[0]->id)->first()->delete();

        // noty()->danger('Whops', 'Keranjang Belanja telah di kurangi');
        return back();
    }
}
