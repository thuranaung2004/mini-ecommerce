@extends("layouts.app")
@section("content")
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>view cart</title>
    <style>
       .card{
      position: relative;
      padding: 10px;
      box-sizing: border-box;
      border: 2px solid transparent;
      transition: border 0.4s ease;
      box-shadow: 0 2px 3px rgb(154, 88, 127) ;
     }
     .card:hover{
      border: 2px solid rgb(132, 28, 89);
      box-shadow: 0 10px 10px rgb(132, 28, 89);
     }
    
    </style>
</head>
<body>
    <div class="container text-dark">    
      @if ($items->isEmpty())
   <strong><p style="font-size: 25px"> <i class=" me-2 fa-solid fa-face-frown"style="font-size:40px"></i>Opps! your cart is Empty</p>
    </strong>    
        @else
     @foreach ($items as $item )
     {{-- Card starts --}}
        <div class="card mb-4">
            <div class="row">
              {{-- Image starts --}}
                <div class="col-12 col-md-3">
<img src="{{asset("storage/products/".$item->product->image)}}" alt="{{$item->product->name}}" class="img-fluid rounded" style="width:200px;height:200px;object-fit:cover"> 
                </div>
                {{-- Image ends --}}

                {{-- Body starts --}}
                <div class=" col-12 col-md-7">
             <div class="card-body">
          <h5 class="card-title"><strong>{{$item->product->name}}</strong></h5>
          <p class="card-text">{{$item->product->description}}</p>         
          <div>Total :  : {{number_format($item->quantity *$item->product->price)}} MMK</div>
          {{-- Reduces or adds stock btn --}}
            <div class="mt-2">
             @if ($item->quantity > 1)
                <a href="{{url("cartitems/reducestock/$item->id")}}" style="font-size: 20px;">
                    <i class="brand-color fa-solid fa-circle-minus"></i></a>
              @elseif ($item->quantity === 1)
               <a href="#" style="font-size: 20px;">
                    <i class="brand-color fa-solid fa-circle-minus"></i></a>
             @endif
                <span style="font-size: 20px" >{{$item->quantity}}</span>
              @if ($item->quantity < $item->product->stock)
                 <a href="{{url("cartitems/addstock/$item->id")}}"style="font-size:20px">
                       <i class=" brand-color fa-solid fa-circle-plus"></i></a> 
              @elseif ($item->quantity === $item->product->stock)      
                      <a href="#"style="font-size:20px">
                       <i class=" brand-color fa-solid fa-circle-plus"></i></a>           
              @endif
             </div>
             {{-- End of reduces or adds stock btn --}}
           </div>
        </div> 
        {{-- Body ends --}}
             
            {{--Remove Button starts --}}
           <div class=" col-12 col-md-2">
                  <div class="text-center mt-5">
                    <a href="{{url("cartitems/remove/$item->id")}}" 
                    class="btn-close" style="font-size:30px;"></a>    
                  </div>
            </div>
             {{--Remove Button ends --}}

                </div>
            </div>     
              {{--Card ends --}}
        @endforeach

            {{-- Total and Purchase btn starts --}}
        <div class="text-center">
          <h5><strong>Total amount</strong></h5>
         <div>MMK{{number_format($total)}} <i class="fa-solid fa-tag"></i></div>           
          <a href="{{url("/orders/checkout")}}" class="btn btn-danger mt-2 w-50" style="background-color: rgb(157, 65, 119); height:50px; align-content:center">
            Proceed to Checkout</a>
         </div>
             {{-- Total and Purchase btn ends --}}

      @endif
     </div>
</body>
</html>    
@endsection
