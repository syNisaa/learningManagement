<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product; 

class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        return view('agency.index',compact('product'));
    }    
    public function detail($id){
        $product = Product::where('id',$id)->get();
        return view('agency.detailproduk',compact('product'));
    }    
}
