<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Classes;
use App\User;
use App\Schedule;
use App\Assignment;
use App\Instansi;
use App\Modul;
use App\Datasiswa;

class InsController extends Controller
{
    public function dashboardins()
    {
        $class = Auth::user()->class;
        $countStudent = Datasiswa::where('class_category', $class)->count();
        $countJadwal = Schedule::where('class_category',$class)->count();
        $countClass = User::where('class', $class)->count();
        $jadwals = Schedule::where('class_category',$class)->get();
        $classes = Classes::all();
        return view('ins.index', compact('countStudent', 'countJadwal', 'countClass', 'jadwals', 'classes'));
    }

    public function show($category)
    {
        // $users = User::all();
        $users = DB::select("SELECT * FROM `users` WHERE role = 'student' AND class = '$category' ");
        return view('ins.dataSiswa', compact('users'));
    }   

    public function class()
    {
        $class = Auth::user()->class;
        $users = DB::select("SELECT * FROM `users` WHERE role = 'student' AND class = '$class' ");
        return view('ins.dataSiswa', ['users'=>$users]);
    }

    public function selectClass()
    {
        // $classes= Classes::where('category');
        $class = Auth::user()->class;
        // $users = User::where('role','student' , 'category', $class)->get();
        $users = DB::select("SELECT * FROM `users` WHERE role = 'student' AND class = '$class' ");
        return view('ins.dataSiswa', ['users'=>$users]);
    }

    public function updateScore(Request $request, $id){

        $update = Assignment::find($id);
        $update->score = $request->score;
        $update->save();

        return redirect('/assignment');
    }

    public function schedule(){
        $jadwals = Schedule::where('class_category',auth::user()->class)->get();
        $classes = Classes::all();
        return view('ins.schedule', compact('jadwals', 'classes'));
    }

    public function createSchedule(Request $request){
        Schedule::create([
            'days' => $request->day,
            'type_conference' =>$request->tycon,
            'time' => $request->time,
            'class_category' => $request->class,
            'link_zoom' => $request->link,
        ]);

        Session::flash('sukses','Successfully Create Data');
        return redirect('/scheduls');
    }
    
    public function deleteSchedule($id)
    {
        Schedule::destroy($id);
        Session::flash('sukses','Successfully Changed Data');
        return redirect('/scheduls');
    }

    public function updateSchedule(Request $request, $id){
        $update= Schedule::find($id);
        $update->type_conference= $request->type;
        $update->days = $request->day;
        $update->time = $request->time;
        $update->class_category = $request->class;
        $update->link_zoom = $request->link;
        $update->save();

        Session::flash('sukses','Successfully Changed Data');
        return redirect('/scheduls');
    }

}
