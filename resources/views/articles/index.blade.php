@extends("layouts.app")
@section("content")
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
     #add-btn{
      position: absolute;
      opacity: 0;
      transform: translateY(10px);
      transition:opacity 0.4s ease,transform 0.4s ease;  
      bottom: 10px;
      right:24px ;
     }
     .card:hover #add-btn{
      opacity: 1;
      transform: translateY(0);
     }
    </style>
</head>
<body>
    
   <div class="container">

      @if (session("success"))
      <div class="alert alert-info alert-dismissible fade show">
        <button class="btn-close" data-bs-dismiss="alert"></button>
        {{session("success")}}
      </div>        
      @endif

      <div class="row g-3">
            @foreach ($articles as $article )

           <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            {{-- Card starts --}}
            <div class="card mb-2" style="height: 500px; width:300px;background-color: rgb(236, 229, 229);">
                 {{-- Image starts --}}
            @if ($article->image)            
              <img src="{{asset("storage/products/".$article->image)}}" alt="{{$article->name}}" class="img-fluid rounded mb-2"style="height:250px; width:100%; object-fit:cover;">   
             @endif
                 {{-- Image Ends --}}

                {{-- Card-body Starts --}}
             <div class="card-body">
               <h5 class="card-title"><strong>{{$article->name}}</strong> </h5>
               <p class="card-text" style="overflow:hidden; text-overflow:ellipsis; white-space:nowrap; height:20px;">{{$article->description}}</p>     
             <ul class="list-group mb-2">
                <li class="list-group-item"style="background-color: rgb(236, 229, 229) ;border:2px solid  rgb(157, 65, 119)">
                  <strong>Price :  : {{number_format($article->price)}} MMK </strong></li>
              </ul>                           
            <ul class="list-group">
              @if ($article->stock >= 10 || $article->stock>5)
               <li class="list-group-item  text-success" style="background-color: rgb(236, 229, 229) ;border:2px solid  rgb(157, 65, 119)">stock available</li> 
                @elseif ($article->stock <=5 && $article->stock > 0)
                <li class="list-group-item" style="color: rgb(170, 122, 34); background-color: rgb(236, 229, 229) ;border:2px solid  rgb(157, 65, 119)">a few stocks left</li> 
              @elseif ($article->stock===0)
                <li class="list-group-item  text-danger" style="background-color: rgb(236, 229, 229) ;border:2px solid  rgb(157, 65, 119)">out of stock</li> 
              @endif 
            </ul>   

        @if (auth()->check() && auth()->user()->id===1)
         <div class="text-center mt-2">
          <a href="{{url("/articles/delete/$article->id")}}"
              class="btn btn-outline-danger me-3 ">Delete</a>
           <a href="{{url("/articles/edit/$article->id")}}"
              class="btn btn-outline-success ">Edit</a>
         </div>   

         @elseif (auth()->check() && $article->stock>0 && auth()->user()->id != 1)
           <a href="{{url("/cartitems/add/$article->id")}}" id="add-btn"
            class="btn btn-danger mt-2"
             style="width:250px; background-color: rgb(157, 65, 119)">ADD</a>   

         @endif 

         @guest
           @if ($article->stock>0)
               <a href="{{route("login")}}" id="add-btn"
            class="btn btn-danger mt-2"
             style="width:250px; background-color: rgb(157, 65, 119)">ADD</a> 
           @endif
         @endguest        

              </div>
              {{-- Card-body Ends --}}
            </div>
            {{-- Card Ends --}}
        </div>
      @endforeach
     </div>
   </div>
</body>
</html>
@endsection