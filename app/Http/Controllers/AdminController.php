<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Lesson;
use App\User;
use App\Modul;
use App\Schedule;
use App\Billings;
use App\Category;
use App\Datasiswa;
use App\Instansi;
use App\Testi;
use Carbon;
use Barryvdh\DomPDF\Facade as PDF;
// use DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\VarDumper\Cloner\Data;

class AdminController extends Controller
{
    // billings 
    public function databillings(){
        $bill = Billings::all();
        $classes = Classes::all();
        return view('admin.bill' , compact('bill','classes'));
    }

    public function deletebillings($id)
    {
        $bill = Billings::all();
        $classes = Classes::all();
        Billings::destroy($id);
        return redirect('/databillings');
        // return view('admin.bill', compact('bill','classes'));
    }

    // Landing Page
    public function viewclass()
    {
        $classespendidikan = Classes::where('jenisCategory','Program Pendidikan')->get();
        $classeslainnya = Classes::where('jenisCategory','Program lainnya')->get();
        $classesumum = Classes::where('jenisCategory','Program umum')->get();
        $classes = Classes::all();
        $category = Category::all();
        $testi= Testi::all();
        // echo ($category);
        return view('index', compact('category','classespendidikan','classesumum','classeslainnya','testi'));
    }
    public function class()
    {
        $instansi = Instansi::all();
        return view('auth.register', compact('instansi'));
        // echo($class);
    }

    public function percategory($classcategory)
    {
        $classespendidikan = Classes::where('jenisCategory','Program Pendidikan')->get();
        $classeslainnya = Classes::where('jenisCategory','Program lainnya')->get();
        $classesumum = Classes::where('jenisCategory','Program umum')->get();
        $classes = Classes::where('jenisCategory',$classcategory)->get();
        $categoryclass = Category::where('nameCategory',$classcategory)->get();
        $testi= Testi::all();
        $category = Category::all();
        // echo ($category);
        return view('classcategory', compact('category','categoryclass','classespendidikan','classesumum','classeslainnya','testi','classes'));
    }
    
    // register siswa
    public function createuser(Request $request)
    {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'gender' => $request->gender,
                'instansi' => $request->instansi,
                'phone' => "0000-0000-0000",
                // 'price' => $request->price,
            ]);
            // Billings::create([
            //     'name'=>$request->name,
            //     'class'=>$request->class,
            //     'price'=>$request->price,
            //     'date'=> Carbon\Carbon::now()
            // ]);
            return redirect('/login'); 
    }

    public function formlogin()
    {
        $class = Classes::all();
        return view('auth.login', compact('class'));
    }

    public function changeview()
    {
        $classes = Classes::all();
        return view('admin.updatepw',compact('classes'));
    }

    public function updatepw()
    {
        request()->validate([
            'old_password' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $currentPassword = auth()->user()->password;
        $old_password = request('old_password');

        if (Hash::check($old_password, $currentPassword)) {
            auth()->user()->update([
                'password' => bcrypt(request('password')),
            ]);

            return back()->with('success', 'You are changed your password');
        } else {
            return back()->withError(['error', 'Make sure you fill your password']);
        }
    }

    public function dashboardadmin()
    {
        $countStudent = Datasiswa::all()->count();
        $countInstructor = User::where('role', 'instructor')->count();
        $countJadwal = Schedule::all()->count();
        $countClass = Classes::all()->count();
        $jadwals = Schedule::all();
        $classes = Classes::all();
        return view('admin.index', compact('countStudent', 'countInstructor', 'countJadwal', 'countClass', 'jadwals', 'classes' ));
    }

    public function user()
    {
        $users = User::where('role', 'instructor')->get();
        $classes = Classes::all();
        return view('admin.data', compact('users','classes'));
    }

    public function create(Request $request)
    {
        Session::flash('sukses','Successfully Adding Data');
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('12345678'),
            'gender' => $request->gender,
            'phone' => $request->phone,
            'role' => $request->role,
            'class' => $request->class
        ]);
        return redirect('/user');
    }

    public function updatest(Request $request, $id)
    {
        Session::flash('sukses','Successfully Changed Data');
        $users = Datasiswa::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->class_category = $request->class;
        $users->date = $request->date;
        $users->status = "non";
        $users->save();
        
        return redirect('/siswaDigital%20Marketing');
    }

    public function updateest(Request $request, $id)
    {
        Session::flash('sukses','Successfully Changed Data');
        $users = Datasiswa::find($id);
      
        $users->status = "aktif";
        $users->save();
        
        return redirect('/siswaDigital%20Marketing');
    }

    public function update(Request $request, $id)
    {
        Session::flash('sukses','Successfully Changed Data');
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->gender = $request->gender;
        $users->phone = $request->phone;
        $users->role = $request->role;
        // 
        
        // $users->status = "non";
        $users->save();
        
        return redirect('/user');
    }

    public function updatesiswa(Request $request, $id)
    {
        Session::flash('sukses','Successfully Changed Data');
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->gender = $request->gender;
        $users->phone = $request->phone;
        $users->role = $request->role;
        $users->save();

        return redirect('/siswaMagang%20Guru');
    }

    public function destroy($id)
    {
        Session::flash('sukses','Successfully Delete Data');
        User::destroy($id);
        return redirect('/user');
    }

    public function destroyst($id)
    {
        Session::flash('sukses','Successfully Delete Data');
        Datasiswa::destroy($id);
        return redirect('/siswaDigital%20Marketing');
    }

    // Data Lesson
    public function lesson()
    {
        $lesson = Lesson::all();
        return view('admin.lesson', ['lesson' => $lesson]);
    }

    public function create_lesson(Request $request)
    {
        Session::flash('sukses','Successfully Adding Data');
        Lesson::create([
            'subject_name' => $request->subject_name,
            'class_category' => $request->class_category
        ]);
        return redirect('/lesson');
    }

    public function update_lesson(Request $request, $id)
    {
        $lesson = Lesson::find($id);
        $lesson->subject_name = $request->subject_name;
        $lesson->class_category = $request->class_category;
        $lesson->save();
        return redirect('/lesson');
    }

    public function destroy_lesson($id)
    {
        $lesson = Lesson::find($id);
        $lesson->delete();
        return redirect('/lesson');
    }

    public function view_profile()
    {
        $nama = Auth::user()->name;
        $users = User::where('name', $nama)->get();
        $classes = Classes::where('category', Auth::user()->class)->get();
        return view('admin.viewprofile', compact('users','classes'));
        
    }

    public function update_profile(Request $request, $id)
    {
        $photo = $request->file('photo');
        $name_file = $photo->getClientOriginalName();
        $photo->move(base_path('/public/photo'), $name_file);

        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->gender = $request->gender;
        $users->photo = $name_file;
        // $users->class = $request->class;
        $users->save();
        
        Session::flash('sukses','You have succeess in setting Your Profile');
        return back();
        // return back()->with('success', 'You have succeess in setting Your Profile');
    }

    // Classes
    public function classes()
    {
        $classes = Classes::all();
        $jnscategory = Category::all();
        return view('admin.classes.index', compact('classes','jnscategory'));
    }

    public function delete_class($id)
    {
        Classes::destroy($id);
        return redirect('/class');
    }

    public function create_class(Request $request){
        $image = $request->file('image');
        $name_file = $image->getClientOriginalName();
        $image->move(base_path('/public/image_class'), $name_file);
        Classes::create([
            'jenisCategory' => $request->program,
            'category' => $request->category,
            'deskripsi' => $request->deskripsi,
            'name_ins' => $request->name_ins,
            'kuota' => $request->kuota,
            'price' => $request->price,
            'image' => $name_file ,
            'video'=> $request->video
        ]);
        Session::flash('sukses','Successfully Adding Data');
        return redirect('/class');
    }

    public function update_class(Request $request, $id)
    {
        Session::flash('sukses','Successfully Changed Data');
        $image = $request->file('image');
        $name_file = $image->getClientOriginalName();
        $image->move(base_path('/public/image_class'), $name_file);

        $class = Classes::find($id);
        $class->jenisCategory = $request->program;
        $class->category = $request->category;
        $class->deskripsi = $request->deskripsi;
        $class->name_ins = $request->name_ins;
        $class->image = $name_file;
        $class->kuota = $request->kuota;
        $class->price = $request->price;
        $class->video = $request->video;
        $class->save();
        
        return redirect('/class');
    }

    public function show($category)
    {
        $classcat = Classes::where('category',$category)->get();
        $classes = Classes::all();
        $users = DB::select("SELECT * FROM `datasiswa` WHERE class_category = '$category' ");
        return view('admin.dataSiswas', compact('users', 'classes', 'classcat'));
    }   

    public function modul()
    {
        $modul = Modul::all();
        return view('admin.modul.index', ['modul'=>$modul]);
    }

    public function createModul(Request $request)
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
        Session::flash('sukses','Successfully Adding Data');
        return redirect('/moduls');
    }

    public function deleteModul($id)
    {
        Modul::destroy($id);
        return redirect('/moduls');
    }

    public function updateModul(Request $request, $id)
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

        return redirect('/moduls');
    }

    // Program 
    public function indexprogram(){
        $category =Category::all();
        $classes = Classes::all();
        return view('admin.classes.categoryprogram', compact('category','classes'));
    }

    public function deleteprogram($id){
        Category::destroy($id);
        return Redirect('/program');
    }

    public function createprogram(Request $request){
        // 
        $file = $request->file('image');

        $nama_file = time() . "_" . $file->getClientOriginalName();

        $tujuan_upload = 'programimg';
        $file->move($tujuan_upload, $nama_file);

        Category::create([
            'nameCategory'=> $request->program,
            'image' => $nama_file,
        ]);

        return redirect('/program');
    }
    public function updateprogram(Request $request, $id)
    {
        $file = $request->file('image');

        $nama_file = time() . "_" . $file->getClientOriginalName();

        $tujuan_upload = 'programimg';
        $file->move($tujuan_upload, $nama_file);

        $pro = Category::find($id);
        $pro->nameCategory = $request->nameCategory;
        $pro->image = $nama_file;
        $pro->save();

        return redirect('/program');
    }

     // Testi
     public function indextesti(){
        $testi =Testi::all();
        $classes = Classes::all();
        return view('admin.classes.testiclass', compact('testi','classes'));
    }

    public function deletetesti($id){
        Testi::destroy($id);
        return Redirect('/testi');
    }

    public function createtesti(Request $request){
        // 
        $file = $request->file('image');

        $nama_file = time() . "_" . $file->getClientOriginalName();

        $tujuan_upload = 'testiimg';
        $file->move($tujuan_upload, $nama_file);

        Testi::create([
            'name'=> $request->name,
            'classCategory'=> $request->class,
            'image' => $nama_file,
            'desc'=> $request->desc,
        ]);

        return redirect('/testi');
    }
    public function updatetesti(Request $request, $id)
    {
        $file = $request->file('image');

        $nama_file = time() . "_" . $file->getClientOriginalName();

        $tujuan_upload = 'testiimg';
        $file->move($tujuan_upload, $nama_file);

        $pro = Testi::find($id);
        $pro->name= $request->name;
        $pro->classCategory = $request->classCategory;
        $pro->image = $nama_file;
        $pro->desc = $request->desc;
        $pro->save();

        return redirect('/testi');
    }


    // Cetak PDF
    public function cetakbill()
    {
    	$bill = Billings::all();
    	$pdf = PDF::loadview('admin.pdf.databillpdf',['bill'=>$bill]);
    	return $pdf->download('laporan-Data_Pembayaran.pdf');
    }
    
    public function cetak_pdfIns()
    {
    	$users = User::where('role', 'instructor')->get();
    	$pdf = PDF::loadview('admin.pdf.dataIns_pdf',['users'=>$users]);
        // return $pdf->stream();
    	return $pdf->download('laporan-Data_Instructor.pdf');
    }

    public function cetak_pdfMember($category)
    {
        $classcat = Classes::where('category',$category)->get();
        $classes = Classes::all();
        $users = DB::select("SELECT * FROM `datasiswa` WHERE class_category = '$category' ");
        
        $classes = Classes::where('category',$category);
        $class = User::find($category);
        // $users = DB::select("SELECT FROM `users` WHERE role = 'student' AND class = '$category' ");
    	$pdf = PDF::loadview('admin.pdf.dataMember_pdf',['users'=>$users]);
    	// return $pdf->download('laporan-Data_Member.pdf');

        return $pdf->stream();
    }
}
