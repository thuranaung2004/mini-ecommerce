<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\OrderItems;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function order(){
    $data=CartItem::where("user_id",auth()->user()->id)->get();
    $total=$data->sum(function($item){
      return $item->quantity*$item->product->price;
    });
    return view("articles.checkout",["items"=>$data,"total"=>$total]);
  }


     public function checkout(){
       $data=CartItem::where("user_id",auth()->user()->id)->get();
       $total=$data->sum(function($item){
        return $item->quantity*$item->product->price;
       });
      $order= DB::transaction(function()use($data,$total){
          $validator=validator(request()->all(),[
            'email'=>"required",
            'first_name'=>"required",
            "last_name"=>"nullable",
            'city'=>"required",
            "phone"=>"required",
            "address"=>"required",
            "total"=>"required"
        ]);
        if($validator->failed()){
        return back()->withErrors($validator);
        }
        $order=new Order();
       $order->user_id=auth()->user()->id;
       $order->email=request()->email;
       $order->first_name=request()->first_name;
       $order->last_name=request()->last_name ?? null;
       $order->city=request()->city;
       $order->phone=request()->phone;
       $order->address=request()->address;
       $order->total=$total;
       $order->save();
       
       foreach($data as $cart){
        $orderitem=new OrderItems();
        $orderitem->order_id=$order->id;
        $orderitem->product_id=$cart->product_id;
        $orderitem->quantity=$cart->quantity;
        $orderitem->price=$cart->product->price;
        $orderitem->save();

      $product=$cart->product;
        $total_quantity=$cart->quantity;
        $total_stock=$cart->product->stock;
        $final_stock=$total_stock - $total_quantity;
        $product->stock=$final_stock;
        $product->save();
      }
       

       
       CartItem::where("user_id",auth()->user()->id)->delete(); 
       
      
          
       return $order;   

       }); 
           return redirect()->route("orders.receipt",$order->id);
            
    }
    public function receipt($id){
      $data=Order::where("user_id",auth()->user()->id)->where("id",$id)->first();
      // $data=Order::find($id);
      return view("articles.show",["receipt"=>$data]);
    }

}
