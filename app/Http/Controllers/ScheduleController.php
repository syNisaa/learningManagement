<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Classes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ScheduleController extends Controller
{
    public function index(){
        $schedule = Schedule::all();
        $classes = Classes::all();
        return view('admin.schedule.index', compact('schedule', 'classes'));
    }
    
    public function indexsiswa(Request $request){
        if($request->session()->has('class')){
            $jadwals = Schedule::where('class_category', $request->session()->get('class'))->get();
            $classes = Classes::all();
            return view('pengguna.schedule', compact('jadwals', 'classes'));    
		}else{
			echo 'Tidak ada data dalam session.';
        }
    }

    public function create(Request $request){
        Schedule::create([
            'days' => $request->day,
            'type_conference' =>$request->tycon,
            'time' => $request->time,
            'class_category' => $request->class,
            'link_zoom' => $request->link,
            'ins' => Auth::user()->name
        ]);

        return redirect('/schedule');
    }
    
    public function delete($id)
    {
        Schedule::destroy($id);
        return redirect('/schedule');
    }

    public function update(Request $request, $id){
        $update= Schedule::find($id);
        $update->type_conference= $request->type;
        $update->days = $request->day;
        $update->time = $request->time;
        $update->class_category = $request->class;
        $update->link_zoom = $request->link;
        $update->ins = Auth::user()->name;
        $update->save();

        return redirect('/schedule');
    }
}
