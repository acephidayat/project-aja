<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', [
            'products'=> $products 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'code'=>'required|numeric',
            'name'=>'required',
            'kategori'=>'required',
            'price'=>'required|numeric',
            'photo' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $extention = request('photo')->getClientOriginalExtension();
        $imageName = time().'.'. $extention;
        $path = public_path('/images');
        request('photo')->move($path,$imageName);

        //Upload file
        Product::create([
            'code'=> request('code'),
            'name'=> request('name'),
            'category'=> request('kategori'),
            'price'=> request('price'),
            'photo' =>'images/'. $imageName
        ]);

        return redirect()->to('/admin/product');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        return view('admin.product.edit',[
            'product'=>$product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $this->validate(request(), [
            'code' => 'required|numeric',
            'name' => 'required',
            'category' =>'required',
            'price' => 'required|numeric',
        ]);

        $product = Product::where( 'id', $id )->first();

        if (request()->hasFile('photo')) {
            //Delete file yang lama
            unlink(public_path($product->photo));

            //Upload file yang baru
            $extention = request('photo')->getClientOriginalExtension();
            $imageName = time().'.'. $extention;
            $path = public_path('/images');
            request('photo')->move($path, $imageName);
        }

        $product -> update([
            'code'=> request('code'),
            'name'=> request('name'),
            'category'=> request('category'),
            'price' => request('price'),
            'photo'=> isset($path) ? 'images/' . $imageName : $product->photo
        ]);

        return redirect()->to('/admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //product::find($id);
        $product = Product::where('id',$id)->first();

        //delete photo
        unlink(public_path($product->photo));

        $product->delete();

        return redirect()->to('/admin/product');

    }
}
