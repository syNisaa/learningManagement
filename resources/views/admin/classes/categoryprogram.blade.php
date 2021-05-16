@extends('layouts/main')

@section('title', 'Data Program')

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
    <br>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="container">
        <div class="card shadow mt-4 mb-4">
            @if ($message = Session::get('sukses'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
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
                                <th scope="col" class="text-center">Program</th>
                                <th scope="col" class="text-center">Image Program</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category as $c)
                            <tr>
                                <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                <td class="text-center">{{ $c->nameCategory }}</td>
                                <td class="text-center"><img src="{{asset('programimg/'.$c->image)}}" alt="" style="width: 80px; height:50px"></td>

                                <td class="text-center">
                                    <a data-toggle="modal" data-target="#modalUpdate{{ $c->id }}" class="btn btn-small text-success">
                                        <i class="fa fa-edit"></i><span class="ml-2">Edit</span>
                                    </a>
                                    <a data-toggle="modal" data-target="#deleteData{{$c->id}}" class="btn btn-small text-danger"><i class=" fa fa-trash"></i><span class="ml-2">Delete</span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
       
       
</div>

@foreach($category as $s)
<div class="modal" tabindex="-1" id="deleteData{{$s->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Class </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Menghapus Data Ini</p>
            </div>
            <div class="modal-footer">
                <form action="program/delete/{{$s->id}}" method="post">
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
                <h5 class="modal-title">Add Data Program </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/program/create" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Category Program </label>
                        <input type="text" name="program" id="program" class="form-control" placeholder="Category Class" aria-label="program" aria-describedby="basic-addon1">
                        @if($errors->has('program'))
                        <div class="text-danger">
                            {{ $errors->first('program')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Image Program </label>
                        <input type="file" name="image" id="image">
                        @if($errors->has('image'))
                        <div class="text-danger">
                            {{ $errors->first('image')}}
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

<!-- Modal Update -->
@foreach($category as $c)
<div class="modal fade" id="modalUpdate{{ $c->id }}" tabindex="-1" aria-labelledby="modalUpdate" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/program/update/{{$c->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="hidden" class="form-control" id="id" name="id" value="{{$c->id}}">
                    <div class="form-group">
                        <label for="">Name Program</label>
                        <input type="text" class="form-control" id="nameCategory" name="nameCategory" value="{{$c->nameCategory}}">
                    </div>
                    <div class="form-group">
                        <label for="">Image Program</label>
                        <input type="file" class="form-control" id="image" name="image" >
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
                <!--END FORM UPDATE -->
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- End Modal UPDATE -->

<!-- Modal Delete -->
@foreach($category as $c)
<div class="modal" tabindex="-1" id="deleteData{{$c->id}}">
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
                <form action="/class/destroy/{{$c->id}}" method="post">
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

</div>
</div>
</div>
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
@endsection