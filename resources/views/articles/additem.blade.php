@extends("layouts.app")
@section("content")

<div class="container my-5" style="max-width: 600px">
    @if ($errors->any())
        <div class="alert alert-warning">
            @foreach ($errors->all() as $error)
                <ol>{{$error}}</ol>
            @endforeach
        </div>
     @endif

     <form action="{{url("articles/add")}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Name" class="form-control mb-2" required>
        <textarea name="description" placeholder="About" class="form-control mb-2" ></textarea>
        <input type="number" name="price" placeholder="Price" class="form-control mb-2" required>
        <input type="text" name="stock" placeholder="Stock" class="form-control mb-2" required>
        <input type="file" name="image" class="form-control">
        <input type="submit" class=" mt-2 btn btn-success">
     </form>
     
</div>

@endsection