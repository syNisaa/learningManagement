@extends('layouts/main')

@section('title', 'Assignment')

@section('container')

<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">

    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">

            <div class="col-5 align-self-center">
                <font face="Courier New">
                    <?php
                    $tanggal = mktime(date("m"), date("d"), date("Y"));
                    date_default_timezone_set('Asia/Jakarta');
                    $jam = date("H:i:s");
                    $a = date("H");
                    if (($a >= 6) && ($a <= 11)) {
                        echo "<b> Good Morning,</b>";
                    } else if (($a > 11) && ($a <= 15)) {
                        echo "<b> Good Afternoon, </b>";
                    } else if (($a > 15) && ($a <= 18)) {
                        echo "<b> Good Evening, </b>";
                    } else {
                        echo "<b> Good Night, </b>";
                    }
                    ?>

                    {{ Auth::user()->name }}!
                </font>

            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="container">
        <!-- DataTales Example -->
        <!-- <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables
                    <span>
                        <a data-toggle="modal" data-target="#addData" class="text-primary float-right">
                            <i class="fas fa-plus"><span class="ml-2">Add Data</span></i>
                        </a>
                    </span>
                </h6>
            </div> -->

        <!-- <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-center">NO</th>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Class Category</th>
                                <th scope="col" class="text-center">Subject Matter</th>
                                <th scope="col" class="text-center">Online Text</th>
                                <th scope="col" class="text-center">File Assignment</th>
                                <th scope="col" class="text-center">Date Submit</th>
                                <th scope="col" class="text-center">Score</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ass as $a)
                            <tr>
                                <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                <td class="text-center">{{ $a->name }}</td>
                                <td class="text-center">{{ $a->class_category }}</td>
                                <td class="text-center">{{ $a->subject_matter }}</td>
                                <td class="text-center">{{ $a->online_text }}</td>
                                <td>
                                    <embed src="{{asset('tugas_siswa/'.$a->file)}}" type="">
                                </td>
                                <td class="text-center">{{ $a->date }}</td>
                                <td class="text-center">{{ $a->score }} </td>

                                <td class="text-center">
                                    <a data-toggle="modal" data-target="#modalNilai{{ $a->id }}" class="btn btn-small text-success">
                                        <i class="fa fa-star"></i><span class="ml-2">Update</span>
                                    </a>
                                    <a data-toggle="modal" data-target="#deleteData{{ $a->id }}" class="btn btn-small text-danger"><i class=" fa fa-trash"></i><span class="ml-2">Delete</span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div> -->

        <!-- Start Cards Jadwal -->
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold">Assignment</h6>
            </div>
            @if($ass->count() > 0)
            <div class="row ml-2 mr-2">
                @foreach($ass as $a)
                <div class="col-md-4 mt-4">
                    <div class="card shadow mb-6" style="border-radius: 20px">
                        <div class="card-body" href="/addSchedule">
                            <b>
                                <p class="card-text">Name : {{ $a->name }}</p>
                            </b><br>
                            <p class="card-text">Class :{{ $a->class_category }}</span></p>
                            <p class="card-text">Subject :{{ $a->subject_matter }}</p>
                            <p class="card-text">Link : {{ $a->online_text }}</p>
                            <p class="card-text">Date Submit : {{ $a->date }}</p>
                            <a class="card-text">Score : {{ $a->score }}</a><br>
                            @if( $a->score == 'Belum Ada Penilaian')
                            <a data-toggle="modal" data-target="#viewdata{{ $a->id }}" class="btn btn-small text-success">
                                <i class="fa fa-star"></i><span class="ml-2">View</span>
                            </a>
                            <a data-toggle="modal" data-target="#deleteData{{ $a->id }}" class="btn btn-small text-danger"><i class=" fa fa-trash"></i><span class="ml-2">Del</span></a>
                            <a data-toggle="modal" data-target="#modalupdate{{ $a->id }}" class="btn btn-small text-success">
                                <i class="fa fa-edit"></i><span class="ml-2">Edit</span>
                            </a>
                            @else
                            <center><a data-toggle="modal" data-target="#viewdata{{ $a->id }}" class="btn btn-small text-success">
                                <i class="fa fa-star"></i><span class="ml-2">View</span>
                            </a></center>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="row justify-content-center" style="margin-top: 15%">
                <div class="col text-center">
                    <b>Assignment Belum Tersedia</b>
                </div>
            </div>
            @endif
        </div>
        <!-- End Cards Jadwals -->

        @foreach($ass as $s)
        <div class="modal" tabindex="-1" id="deleteData{{$s->id}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Assignment </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda Yakin Ingin Menghapus Data Ini</p>
                    </div>
                    <div class="modal-footer">
                        <form action="ass/delete/{{$s->id}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


        <!-- Modal Update -->
        @foreach($ass as $a)
        <div class="modal" tabindex="-1" id="modalupdate{{ $a->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Assignment - {{$a->subject_matter}} </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/ass/updatesiswa/{{$a->id}}" enctype="multipart/form-data">

                            @csrf
                            @method('put')

                            <div class="form-group">
                                <!-- <label>Name</label> -->
                                <input type="hidden" name="name" id="name" value="{{$a->name}}" class="form-control" placeholder="Name" aria-label="name" aria-describedby="basic-addon1">
                                @if($errors->has('name'))
                                <div class="text-danger">
                                    {{ $errors->first('name')}}
                                </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="hidden" value="{{$a->class_category}}" name="class" id="class">
                                @if($errors->has('class'))
                                <div class="text-danger">
                                    {{ $errors->first('class')}}
                                </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <!-- <label>Subject Matter</label> -->
                                <input type="hidden" value="{{$a->subject_matter}}" name="subject" id="subject" class="form-control" placeholder="Subject Matter" aria-label="class" aria-describedby="basic-addon1">

                            </div>

                            <div class="form-group">
                                <label>Online Text</label>
                                <input type="text" name="online" id="online" value="{{$a->online_text}}" class="form-control" aria-label="online" aria-describedby="basic-addon1">

                            </div>

                            <div class="form-group">
                                <label>File Assignment <small>*mohon input ulang file</small></label>
                                <input type="file" name="file" id="file" value=" {{$a->file}}" class="form-control" aria-label="file" aria-describedby="basic-addon1">

                            </div>


                            <div class="form-group">
                                <!-- <label>Date</label> -->
                                <input type="hidden" value="{{$a->date}}" name="due" id="due" class="form-control" aria-label="due" aria-describedby="basic-addon1">
                                @if($errors->has('due'))
                                <div class="text-danger">
                                    {{ $errors->first('due')}}
                                </div>
                                @endif
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        @endforeach
        <!-- End Modal UPDATE -->

        @foreach($ass as $s)
        <div class="modal" tabindex="-1" id="viewdata{{$s->id}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">View Assignment </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <embed src=" {{asset('tugas_siswa/'.$a->file)}}" width="100%" height="100%" type="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @endsection