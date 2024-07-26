<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function index()
    {
        $data = Products::orderBy('created_at', 'desc')->get();
        return view('product.index', compact('data'));
    }

    public function create()
    {   
        return view('product.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_name' => 'required|string|max:255',
            'purchase_price' => 'required|numeric|min:0',
            'sale_price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        Products::create($data);
        // return redirect()->route('products.index');
        return redirect()->route('product.index')->with('success', 'Data Saved!');
    }

    public function show()
    {
        // 
    }

    public function edit($id)
    {
        $data = Products::findOrFail($id);
        return view ('product.edit', [
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'product_name' => 'required|string|max:255',
            'purchase_price' => 'required|numeric|min:0',
            'sale_price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $item = Products::findOrFail($id);

        $item->update($data);

        // return redirect()->route('product.index');
        return redirect()->route('product.index')->with('success', 'Data Updated!');

    }

    public function destroy($id)
    {
        $item = Products::findOrFail($id);
        $item->delete();

        return redirect()->route('product.index');
    }

}
