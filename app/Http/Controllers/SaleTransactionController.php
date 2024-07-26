<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\SaleTransaction;

class SaleTransactionController extends Controller
{
    public function index()
    {
        $data = SaleTransaction::with('product')->orderBy('created_at', 'desc')->get();
        return view('sale.index', compact('data'));
    }

    public function create()
    {   
        $product = Products::get();
        return view('sale.create', [
            'product' =>  $product
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_product' => 'required|integer|exists:products,id',
            'quantity' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:1',
            'transaction_date' => 'required|date',
        ]);

        $product = Products::findOrFail($data['id_product']);
        // $data['price'] = $product->sale_price * $data['quantity'];

        $sale = SaleTransaction::create($data);

        $product->stock -= $data['quantity'];
        
        $product->save();

        return redirect()->route('sale.index', [
            'sale' => $sale,
            'product' => $product
        ]);
    }

    public function show()
    {
        // 
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
