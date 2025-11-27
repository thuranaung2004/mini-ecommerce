<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class OrderItems extends Model
{
    /** @use HasFactory<\Database\Factories\OrderItemsFactory> */
    use HasFactory;
    public function order(){
        return $this->belongsTo("App\Models\Order");
    }
    public function product(){
        return $this->belongsTo("App\Models\Product");
    }
}
