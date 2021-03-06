<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assignment;
use App\Classes;
use App\Modul;
use Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AssignmentController extends Controller
{
    // user 
    public function formsand($id)
    {
        $modul = Modul::where('id', $id)->get();
        return view('pengguna.upload_ass', ['modul'=>$modul]);
    }

    public function listuser(Request $request)
    {
        
        if($request->session()->has('class')){
            $user = Auth::user()->name;
            $classs = $request->session()->get('class');
            $ass = DB::select("SELECT * FROM `penugasans` WHERE class_category = '$classs' AND `name` ='$user' ");
            $classes = Classes::all();
            return view('pengguna.listass', compact('user','ass'));
		}else{
			echo 'Tidak ada data dalam session.';
        }
    }

    public function index()
    {
        $uclass =  Auth::user()->class;
        $ass = Assignment::all();
        $classes = Classes::all();
        return view('admin.assignment.index', compact('ass','classes'));
    }

    public function indexins()
    {
        $uclass =  Auth::user()->class;
        $ass = Assignment::where('class_category',$uclass)->get();
        $classes = Classes::all();
        return view('ins.scoreAssignment', compact('ass','classes'));
    }

    public function create( Request $request)
    {
        // Penugasan
        $file = $request->file('file');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
		$tujuan_upload = 'tugas_siswa';
        $file->move($tujuan_upload,$nama_file);

        Assignment::create([
            'name'=> $request->name,
            'class_category' => $request->class,
            'subject_matter' => $request->subject,
            'online_text' => $request->online,
            'file'=> $nama_file,
            'date' => Carbon\Carbon::now()
,
        ]);
        return redirect('/listass');
    }

    public function delete($id)
    {
        Assignment::destroy($id);
        return redirect('/assignment');
    }
    public function deleteins($id)
    {
        Assignment::destroy($id);
        return redirect('/assignments');
    }

    // del siswa
    public function deletesiswa($id)
    {
        Assignment::destroy($id);
        return redirect('/listass');
    }

    public function update(Request $request, $id){

        $update = Assignment::find($id);
        $update->name= $request->name;
        $update->class_category = $request->class;
        $update->subject_matter = $request->subject;
        $update->online_text = $request->online;
        $update->score = $request->score;
        $update->save();

        return redirect('/assignment');
    }

    public function updateins(Request $request, $id){

        $update = Assignment::find($id);
        $update->name= $request->name;
        $update->class_category = $request->class;
        $update->subject_matter = $request->subject;
        $update->online_text = $request->online;
        // $update->file = $nama_file;
        $update->date = $request->due;
        $update->score = $request->score;
        $update->save();

        return redirect('/assignments');
    }


    public function updatesiswa(Request $request, $id){

        // Penugasan
        $file = $request->file('file');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
		$tujuan_upload = 'tugas_siswa';
        $file->move($tujuan_upload,$nama_file);


        $update = Assignment::find($id);
        $update->name= $request->name;
        $update->class_category = $request->class;
        $update->subject_matter = $request->subject;
        $update->online_text = $request->online;
        $update->file = $nama_file;
        $update->date = $request->due;
        // $update->score = $request->score;
        $update->save();

        return redirect('/listass');
    }

    
}


