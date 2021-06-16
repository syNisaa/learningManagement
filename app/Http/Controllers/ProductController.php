<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product; 
use App\Classes;
use Svg\Tag\Rect;
use App\Category;

class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        $category = Category::all();
        $classespendidikan = Classes::where('jenisCategory','Program Pendidikan')->get();
        $classeslainnya = Classes::where('jenisCategory','Program lainnya')->get();
        $classesumum = Classes::where('jenisCategory','Program umum')->get();
        return view('agency.index',compact('product','category', 'classespendidikan', 'classeslainnya', 'classesumum'));
    }    
    public function detail($id){
        $product = Product::where('id',$id)->get();
        $category = Category::all();
        $classespendidikan = Classes::where('jenisCategory','Program Pendidikan')->get();
        $classeslainnya = Classes::where('jenisCategory','Program lainnya')->get();
        $classesumum = Classes::where('jenisCategory','Program umum')->get();
        return view('agency.detailproduk',compact('product','category','classespendidikan','classesumum','classeslainnya'));
    }   
    
    public function indexadmin(){
        $product = Product::all();
        $classes = Classes::all();
        return view('agency.produk',compact('classes','product'));
    } 
    
    public function delete($id){
        $product = Product::destroy($id);
        return redirect('/adminproduk');
    } 

    public function create(Request $request){
        // Gambar Produk
        $file = $request->file('image');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
		$tujuan_upload = 'produkfile';
        $file->move($tujuan_upload,$nama_file);

        // Penanggung jawab
        $filepj = $request->file('imagepj');
 
		$nama_pj = time()."_".$filepj->getClientOriginalName();
 
		$tujuan_upload = 'produkfile';
        $filepj->move($tujuan_upload,$nama_pj);

        Product::create([
            'name'=> $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'image'=> $nama_file,
            'status' => "Ready",
            'name_pj' => $request->name_pj,
            'image_pj'=> $nama_pj
        ]);

        return redirect('/adminproduk');
    }

    
}
