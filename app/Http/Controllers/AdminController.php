<?php

namespace App\Http\Controllers;
use App\Models\OrderItems;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show(){
        $data=OrderItems::all();
        return view("articles.dashbord",["items"=>$data]);
        
    }
}
