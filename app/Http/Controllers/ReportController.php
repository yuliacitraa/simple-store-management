<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\SaleTransaction;

class ReportController extends Controller
{
    public function stockReport()
    {
        $products = Products::select('id', 'product_name', 'stock', 'purchase_price', 'sale_price')->get();
        foreach ($products as $product) {
            $product->total_sales = SaleTransaction::where('id_product', $product->id)->sum('price');
            $product->total_profit = $product->total_sales - ($product->purchase_price * SaleTransaction::where('id_product', $product->id)->sum('quantity'));
        }

        return view('report', compact('products'));
    }
}
