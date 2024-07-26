<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\PurchaseTransaction;

class PurchaseTransactionController extends Controller
{
    public function index()
    {
        $data = PurchaseTransaction::with('product')->orderBy('created_at', 'desc')->get();
        return view('purchase.index', compact('data'));
    }

    public function create()
    {   
        $product = Products::get();
        return view('purchase.create', [
            'product' =>  $product
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_product' => 'required|integer|exists:products,id',
            'quantity' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:0',
            'transaction_date' => 'required|date',
        ]);

        $purchase = PurchaseTransaction::create($data);

        $product = Products::findOrFail($data['id_product']);
        $product->stock += $data['quantity'];
        $product->purchase_price = $data['price'];
        
        $product->save();

        return redirect()->route('purchase.index', [
            'purchase' => $purchase,
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
