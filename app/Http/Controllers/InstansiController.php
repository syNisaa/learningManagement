<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instansi;
use App\Classes;
class InstansiController extends Controller
{
    public function index()
    {
        $int = Instansi::all();
        $classes = Classes::all();
        return view('admin.instansi.index', compact('int','classes'));
    }

    public function delete($id)
    {
        Instansi::destroy($id);
        return redirect('/instansi');
    }

    public function create(Request $request){
        Instansi::create([
            'instansi' => $request->instansi,
            'person' => $request->person,
            'addres'=> $request->addres
        ]);
        return redirect('/login');
    }
    public function createadmin(Request $request){
        Instansi::create([
            'instansi' => $request->instansi,
            'person' => $request->person,
            'addres'=> $request->addres
        ]);
        return redirect('/instansi');
    }
}
