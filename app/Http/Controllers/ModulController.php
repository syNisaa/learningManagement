<?php

namespace App\Http\Controllers;

use App\Classes;
use Illuminate\Http\Request;
use App\Modul;
use App\Assignment;
use Illuminate\Support\Facades\Auth;

class ModulController extends Controller
{
    public function index()
    {
        $modul = Modul::all();
        $class = Classes::all();
        $classes = Classes::all();
        return view('admin.modul.index', compact('modul', 'class','classes'));
    }

    public function indexins()
    {
        $uclass= Auth::user()->class;
        $modul = Modul::where('class_category',$uclass)->get();
        $class = Classes:: where('category',$uclass)->get();
        $classes = Classes::where('category', $uclass)->get();
        // return echo($modul);
        // echo ($modul);
        return view('ins.modul', compact('modul', 'class','classes'));
    }

    // List Modul
    public function list()
    {
        $uclass= Auth::user()->class;
        $modul = Modul::where('class_category', $uclass)->get();
        return view('pengguna.modulblade.list_modul', ['modul' => $modul]);
    }

    public function listdetail($id)
    {
        $modul = Modul::where('id', $id)->get();
        $status = Assignment::where('status', 'selesai')->where('name',Auth::user()->name)->get();
        return view('pengguna.modulblade.modulslihat', compact('modul','status'));
        // echo($status);
    }

    public function create(Request $request)
    {
        // learning
        $file = $request->file('learning');

        $nama_file = time() . "_" . $file->getClientOriginalName();

        $tujuan_upload = 'modul';
        $file->move($tujuan_upload, $nama_file);

        Modul::create([
            'basic_competencies' => $request->basic,
            'subject_matter' => $request->subject,
            'learning_moduls' => $nama_file,
            'video_tutorials' => $request->video,
            'class_category' => $request->class,
            'due_date' => $request->due
        ]);

        return redirect(('/moduled'));
    }
    public function createins(Request $request)
    {
        // learning
        $file = $request->file('learning');

        $nama_file = time() . "_" . $file->getClientOriginalName();

        $tujuan_upload = 'modul';
        $file->move($tujuan_upload, $nama_file);

        Modul::create([
            'basic_competencies' => $request->basic,
            'subject_matter' => $request->subject,
            'learning_moduls' => $nama_file,
            'video_tutorials' => $request->video,
            'class_category' => $request->class,
            'due_date' => $request->due
        ]);

        return redirect(('/modulede'));
    }

    public function delete($id)
    {
        Modul::destroy($id);
        return redirect(('/moduled'));
    }
    public function deleteins($id)
    {
        Modul::destroy($id);
        return redirect(('/modulede'));
    }

    public function update(Request $request, $id)
    {
        // learning
        $file = $request->file('learning');

        $nama_file = time() . "_" . $file->getClientOriginalName();

        $tujuan_upload = 'modul';
        $file->move($tujuan_upload, $nama_file);

        $update = Modul::find($id);
        $update->basic_competencies = $request->basic;
        $update->subject_matter = $request->subject;
        $update->learning_moduls = $nama_file;
        $update->video_tutorials = $request->video;
        $update->class_category = $request->class;
        $update->due_date = $request->due;
        $update->save();

        return redirect('/moduled');
    }
    public function updateins(Request $request, $id)
    {
        // learning
        $file = $request->file('learning');

        $nama_file = time() . "_" . $file->getClientOriginalName();

        $tujuan_upload = 'modul';
        $file->move($tujuan_upload, $nama_file);

        $update = Modul::find($id);
        $update->basic_competencies = $request->basic;
        $update->subject_matter = $request->subject;
        $update->learning_moduls = $nama_file;
        $update->video_tutorials = $request->video;
        $update->class_category = $request->class;
        $update->due_date = $request->due;
        $update->save();

        return redirect('/modulede');
    }
    // siswa 
    public function baca($id){
        $baca = Modul::where('id',$id)->get();
        return view('pengguna.modulblade.read_modul',compact('baca'));
    }
}
