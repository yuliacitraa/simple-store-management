<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseTransaction extends Model
{
    use HasFactory;

    protected $table="purchase_transactions";
    protected $fillable=[
        'id', 
        'id_product', 
        'quantity', 
        'price',
        'transaction_date'
    ];

    public function product()
    {
        return $this->belongsTo(Products::class, 'id_product', 'id');
    }
}
