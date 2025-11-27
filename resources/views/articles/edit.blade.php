@extends("layouts.app")
@section("content")

 <div class="container my-5" style="max-width: 600px">
    @if ($errors->any())
      <div class="alert alert-warning">
         @foreach ($errors->all() as $error )
           <ol>{{$error}}</ol>
          @endforeach
       </div>        
    @endif

    <form action="{{url("/articles/update/$article->id")}}" 
        method="post" enctype="multipart/form-data" >
          @csrf
        <input type="text" name="name" value="{{old("name",$article->name)}}"
        class="form-control mb-2"required>
        <textarea name="description" class="form-control mb-2" autofocus>{{old("description",$article->description)}}</textarea>
        <input type="number" name="price" value="{{old("price",$article->price)}}" class="form-control mb-2" required>
        <input type="text" name="stock" value="{{old("stock",$article->stock)}}" class="form-control mb-2" required>
         <input type="file" name="image" class="form-control">
        <input type="submit" value="Update" class=" mt-2 btn btn-warning">
    </form>

 </div>
@endsection