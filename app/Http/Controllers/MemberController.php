<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\Assignment;
use App\Modul;
use App\Schedule;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index()
    {
        $user = Auth::user()->name;
        $uclass = Auth::user()->class;
        $classes = Classes::all();
        $jadwal = Schedule::where('class_category', $uclass)->get();
        $modul = Modul::where('class_category', $uclass)->count();
        $assignment = Assignment::where('name', $user)->count();
        return view('pengguna.index',compact('classes','jadwal','modul','assignment'));
    }
}
