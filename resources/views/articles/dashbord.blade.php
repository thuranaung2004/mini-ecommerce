@extends("layouts.app")
@section("content")
    <div class="my-3 container">
        <table class="table table-striped table-bordered table-hover text-center">
            <tr class="table-dark text-uppercase">
                <th>id</th>
                <th>Product_id</th>
                <th>Rate</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Order_id</th>
                <th>User_id</th>
                <th>date</th>
            </tr>
            @foreach ($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td >{{$item->product_id}}</td>
                <td>{{number_format($item->price)}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{number_format($item->order->total)}}</td>
                <td>{{$item->order_id}}</td>
                <td>{{$item->order->user_id}}</td>
                <td>{{$item->created_at->diffForHumans()}}</td>
            </tr>
                
            @endforeach
            
      </table>
    </div>
@endsection