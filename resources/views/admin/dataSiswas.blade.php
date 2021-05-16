@extends('layouts/main')

@section('title', 'Member Data')

@section('container')

<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
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
                {{-- </div> --}}
            </div>
        </div>
        <!-- End Bread crumb and right sidebar toggle -->

        <!-- Container fluid  -->
        <div class="container">
            <div class="card shadow mt-4 mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Member
                        <span>
                            @foreach($classcat as $c)
                            <a href="/data_member/cetak_pdf{{$c->category}}" target="_blank" class="text-danger float-right" style="margin-right: 10px">
                                <i class="fas fa-file-pdf"><span class="ml-2">Export PDF</span></i>
                            </a>
                            @endforeach
                        </span>
                    </h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="text-center">NO</th>
                                    {{-- <th scope="col" class="text-center">Photo</th> --}}
                                    <th scope="col" class="text-center">Nama</th>
                                    <th scope="col" class="text-center">Email</th>
                                    <th scope="col" class="text-center">Class Category</th>
                                    <th scope="col" class="text-center">Join</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $u)
                                <tr>
                                    <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                    {{-- <td>
                                                <img class="card-img-top" src="{{ asset ('photo/'. $u->photo) }}" alt="Card image cap" width="30">
                                    </td> --}}
                                    <td class="text-center">{{ $u->name }}</td>
                                    <td class="text-center">{{ $u->email }}</td>
                                    <td class="text-center">{{ $u->class_category }}</td>
                                    <td class="text-center">{{ $u->date }}</td>

                                    @if  ($u->status  == "aktif")
                                    <td class="text-center"><button data-toggle="modal" data-target="#modalStatus{{ $u->id }}" class="btn btn-primary"> {{ $u->status }} </button></td>
                                    @else
                                    <td class="text-center"><button data-toggle="modal" data-target="#aktifkan{{ $u->id }}" class="btn btn-danger"> {{ $u->status }} </button></td>
                                    @endif
                                    <td class="text-center">
                                        <!-- <a data-toggle="modal" data-target="#modalUpdate{{ $u->id }}" class="btn btn-small text-success">
                                            <i class="fa fa-edit"></i><span class="ml-2">Edit</span>
                                        </a> -->
                                        <a data-toggle="modal" data-target="#deleteData{{$u->id}}" class="btn btn-small text-danger"><i class=" fa fa-trash"></i><span class="ml-2">Delete</span></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Modal Delete -->
            @foreach($users as $u)
            <div class="modal" tabindex="-1" id="deleteData{{$u->id}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Data </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda Yakin Ingin Menghapus Data Ini</p>
                        </div>
                        <div class="modal-footer">
                            <form action="/user/destroyst/{{$u->id}}" method="post">
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
            <!-- End Modal Delete  -->

            <!-- Modal Delete -->
            @foreach($users as $u)
            <div class="modal" tabindex="-1" id="modalStatus{{$u->id}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">UpdateStatus </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda Yakin Ingin Menonaktifkan akun Ini?</p>
                        </div>
                        <div class="modal-footer">
                            <form action="/user/updatest/{{$u->id}}" method="post">
                                @csrf
                                @method('put')
                                <input type="hidden" name="name" value="{{$u->name}}">
                                <input type="hidden" name="email" value="{{$u->email}}">
                                <input type="hidden" name="class" value="{{$u->class_category}}">
                                <input type="hidden" name="date" value="{{$u->date}}">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Non Aktifkan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            @foreach($users as $u)
            <div class="modal" tabindex="-1" id="aktifkan{{$u->id}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">UpdateStatus </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Aktifkan akun Ini?</p>
                        </div>
                        <div class="modal-footer">
                            <form action="/user/updateest/{{$u->id}}" method="post">
                                @csrf
                                @method('put')
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Aktifkan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- End Modal Delete  -->

        </div>
        <!-- End Container fluid  -->
    </div>
    <!-- End Page wrapper  -->
    @endsection