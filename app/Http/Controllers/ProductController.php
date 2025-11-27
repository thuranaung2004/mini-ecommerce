<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $data=Product::all();
        return view("articles.index",['articles'=>$data]);
    }
    public function add(){
        return view("articles.additem");
    }
    public function create(){
        $validator=validator(request()->all(),[
            'name'=>"required",
            'price'=>"required",
            "description"=>"nullable",
            'stock'=>"required",
            "image"=>"nullable"
        ]);
        if($validator->failed()){
        return back()->withErrors($validator);
        }
        if(request()->hasFile("image")){
            $file=request()->file("image");
            $filename=time()."_".$file->getClientOriginalName();
            $file->storeAs("products",$filename,"public");
            $validated["image"]=$filename;
        }
        // if(isset($_FILES("image"))){
        //     $name=$_FILES("image")["name"];
        //     $tmp_name=$_FILES("image")["tmp_name"];
            
        //     $filename="photos/$name";
        //     move_uploaded_file($tmp_name,$filename);
        // } 
        $article=new Product();
        $article->name=request()->name;
        $article->description=request()->description ?? null;
        $article->price=request()->price;
        $article->stock=request()->stock;
        $article->image=$filename ?? null;
        $article->save();
        return redirect("/articles");
    }
    public function delete($id){
        $article=Product::find($id);
        $article->delete();
        // return redirect("/articles");
        return back();

    }
    public function edit($id){
        $article=Product::find($id);
        return view("articles.edit",['article'=>$article]);
    }
    public function update($id){
        $validator=validator(request()->all(),[
            "name"=>"required",
            "description"=>"nullable",
            "price"=>"required",
            "stock"=>"required",
            "image"=>"nullable"
        ]);
        if($validator->failed()){
            return back()->withErrors($validator);
        }
         if(request()->hasFile("image")){
            $file=request()->file("image");
            $filename=time()."_".$file->getClientOriginalName();
            $file->storeAs("products",$filename,"public");
            $validated["image"]=$filename;
        }
        $article=Product::find($id);
        $article->name=request()->name;
        $article->description=request()->description ?? null;
        $article->price=request()->price;
        $article->stock=request()->stock;
        $article->image=$filename ?? null;
        $article->save();
        return redirect("/articles");

    }

}
