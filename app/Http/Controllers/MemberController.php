<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\Assignment;
use App\Billings;
use App\Modul;
use App\Schedule;
use App\User;
use App\Datasiswa;
use Carbon;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index(Request $request, $class_category)
    {
        $request->session()->put('class', $class_category);
        $user = Auth::user()->name;
        $uclass = $class_category;
        $classes = Classes::all();
        $ins = User::where('role', 'instructor')->get();
        $jadwal = Schedule::where('class_category', $uclass)->get();
        $modul = Modul::where('class_category', $uclass)->count();
        $schedulee = Schedule::where('class_category', $uclass)->count();
        // return view('partials.sidebar',compact('uclass'));
        return view('pengguna.index', compact('classes', 'ins', 'jadwal', 'modul', 'schedulee'));
    }

    public function student(Request $request)
    {
        if ($request->session()->has('class')) {
            $user = Auth::user()->name;
            $uclass = $request->session()->get('class');
            $classes = Classes::all();
            $ins = User::where('role', 'instructor')->get();
            $jadwal = Schedule::where('class_category', $uclass)->get();
            $modul = Modul::where('class_category', $uclass)->count();
            $schedulee = Schedule::where('class_category', $uclass)->count();
            return view('pengguna.index', compact('classes', 'ins', 'jadwal', 'modul', 'schedulee'));
        } else {
            echo 'Tidak ada data dalam session.';
        }
      }

    public function viewclass()
    {
        $user = Auth::user()->name;
        $uclass = Auth::user()->class;
        $classes = Classes::all();
        $classespendidikan = Classes::where('jenisCategory','Program Pendidikan')->get();
        $classeslainnya = Classes::where('jenisCategory','Program lainnya')->get();
        $classesumum = Classes::where('jenisCategory','Program umum')->get();
        $ins = User::where('role', 'instructor')->get();
        $student = Datasiswa::where('name', $user)->get();
        $jadwal = Schedule::where('class_category', $uclass)->get();
        $modul = Modul::where('class_category', $uclass)->count();
        $assignment = Assignment::where('name', $user)->count();
        return view('pengguna.viewclass', compact('classes','classespendidikan','classesumum','classeslainnya', 'ins', 'student', 'jadwal', 'modul', 'assignment'));
    }

    public function detail($categoryclass)
    {
        $category = Category::all();
        $classespendidikan = Classes::where('jenisCategory','Program Pendidikan')->get();
        $classeslainnya = Classes::where('jenisCategory','Program lainnya')->get();
        $classesumum = Classes::where('jenisCategory','Program umum')->get();
        $class =Classes::where('category',$categoryclass)->get();
        $modul = Modul::where('class_category', $categoryclass)->get();
        return view('pengguna.detailclass',compact('class','modul','category', 'classespendidikan','classesumum','classeslainnya'));
    }

    public function detailst($categoryclass)
    {
        $category = Category::all();
        
        $class =Classes::where('category',$categoryclass)->get();
        $modul = Modul::where('class_category', $categoryclass)->get();
        return view('pengguna.detailstudent',compact('class','modul','category'));
    }

    public function datasiswa(Request $request)
    {

        Datasiswa::create([
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'class_category' => $request->class,
            'date' => Carbon\Carbon::now(),
            'status' => 'aktif',
        ]);

        Billings::create([
            'name' => Auth::user()->name,
            'class' => $request->class,
            'price' => $request->price,
            'bukti' =>'null',
            'date' => Carbon\Carbon::now()
        ]);

        return redirect('/homestudent');
    }
}
