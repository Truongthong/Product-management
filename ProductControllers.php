<?php

namespace App\Htpp\Controllers;

use App\Model\product;
use Illuminate\Http\Request;

class ProductController2 extends Controller{
    public function index(){
        //paging
        $products = product::latest()->paginate(5);
        return view('product.index',compact('product'))->with('i',
            (request()->input('page', 1) - 1) *5);
    }

    public function create(){
        return view('product.create');
    }
    product function store(Request $request){
        $request->validate([
            'product_name' => 'required',
            'product_desc' => 'required',
            'product_qty' => 'required',
        ]);

        product::create($request->all());
        return redirect()->route('product.index')->with('success', 'Created Successfully.');
}
public function show(product $product){
        return view('product.show',compact('product'));
}
public function edit(product $product){
        return view('product.edit',compact('product'));
}

public function update(Request $request, product $product){
        $request->validate([
            'product_name' => 'required',
            'product_desc' => 'required',
            'product_qty' => 'required',
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')->with('success',
        'Update Successfully.');
}
public function destroy(product $product){
        $product->delete();
        return redirect()->route('product.index')->with('success',
        'Student deleted successfully.');
}
}
