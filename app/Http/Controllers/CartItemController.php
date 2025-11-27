<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function create($id){
        $item=CartItem::where("user_id",auth()->user()->id)->where("product_id",$id)->first() ;
        if($item){
         if($item->quantity<$item->product->stock){
               $item->increment("quantity");
         }
         
        }
        else{
        $item=new CartItem();
        $item->user_id=auth()->user()->id;
        $item->product_id=$id;
        $item->quantity=1;
        $item->save();
        }
        return redirect("/articles")->with("success","added item successfully ");
        
    }
    public function view(){
        $data=CartItem::where("user_id",auth()->user()->id)->get();
        $total=$data->sum(function($item){
            return $item->quantity*$item->product->price;
        });
       
        return view("articles.view",["items"=>$data,"total"=>$total]);

    }
    public function remove($id){
        $item=CartItem::find($id);
        $item->delete();
        return back();
    }
    public function add($id){
        $item=CartItem::find($id);
        $item->increment("quantity");
        return back();
    }
    public function reduce($id){
        $item=CartItem::find($id);
        $item->decrement("quantity");
        return back();
    }
   


}
