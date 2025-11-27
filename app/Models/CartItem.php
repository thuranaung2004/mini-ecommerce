<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    /** @use HasFactory<\Database\Factories\CartItemFactory> */
        use HasFactory;

public function product(){
 return $this->belongsTo("App\Models\Product");
}
public function user(){
    return $this->belongsTo("App\Models\User");
}


}
