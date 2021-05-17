<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemesan;
use Carbon;
use App\Classes;
use App\Product;
use Barryvdh\DomPDF\Facade as PDF;

class PemesanController extends Controller
{
    public function indexadmin(){
        $product = Product::all();
        $pesan = Pemesan::all();
        $classes = Classes::all();
        return view('agency.pemesan',compact('classes','pesan','product'));
    } 
    public function delete($id){
        $pesan = Pemesan::destroy($id);
        $classes = Classes::all();
        return redirect('/adminpemesan');
    } 

    public function create(Request $request){
    
        Pemesan::create([
            'name'=> $request->name,
            'produk' => $request->product,
            'price' => $request->price,
            'date_order' => Carbon\Carbon::now(),
            'status' => "Proses"
        ]);

        return redirect('/adminpemesan');
    }

    public function cetak()
    {
    	$pesan = Pemesan::all();
    	$pdf = PDF::loadview('admin.pdf.pemesanpdf',['pesan'=>$pesan]);
    	return $pdf->download('laporan-Orderan.pdf');
    }
}
