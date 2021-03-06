@extends('layouts/main')

@section('title', 'Data Instansi')

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
                {{-- </div> --}}
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="container">
        <!-- DataTales Example -->
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables
                    <span>
                        <a data-toggle="modal" data-target="#addData" class="text-primary float-right">
                            <i class="fas fa-plus"><span class="ml-2">Add Data</span></i>
                        </a>
                    </span>
                </h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-center">NO</th>
                                <th scope="col" class="text-center">Nama Instansi</th>
                                <th scope="col" class="text-center">Penanggung Jawab</th>
                                <th scope="col" class="text-center">Alamat</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($int as $s)
                            <tr>
                                <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                <td class="text-center">{{ $s->instansi }}</td>
                                <td class="text-center">{{ $s->person }}</td>
                                <td class="text-center">{{ $s->addres }}</td>

                                <td class="text-center">
                                    <a data-toggle="modal" data-target="#deleteData{{ $s->id }}" class="btn btn-small text-danger"><i class=" fa fa-trash"></i><span class="ml-2">Delete</span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        @foreach($int as $s)
        <div class="modal" tabindex="-1" id="deleteData{{$s->id}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Schedule </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda Yakin Ingin Menghapus Data Ini</p>
                    </div>
                    <div class="modal-footer">
                        <form action="instansi/delete/{{$s->id}}" method="post">
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

        <!-- Modal Add Data User -->
        <div class="modal" tabindex="-1" id="addData">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Instansi </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/int/create" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label>Nama Instansi </label>
                                <input type="text" name="instansi" id="instansi" class="form-control" placeholder="Nama Instansi" aria-label="basic" aria-describedby="basic-addon1">
                                @if($errors->has('instansi'))
                                <div class="text-danger">
                                    {{ $errors->first('name')}}
                                </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Penanggung Jawab</label>
                                <input type="text" name="person" id="person" class="form-control" placeholder="Penanggung Jawab" aria-label="person" aria-describedby="basic-addon1">
                                @if($errors->has('person'))
                                <div class="text-danger">
                                    {{ $errors->first('person')}}
                                </div>
                                @endif
                            </div>


                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="addres" id="addres" class="form-control" placeholder="Alamat" aria-label="add" aria-describedby="basic-addon1">
                                @if($errors->has('addres'))
                                <div class="text-danger">
                                    {{ $errors->first('addres')}}
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
        <!-- End Add Modal -->

    </div>
</div>
</div>
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
@endsection