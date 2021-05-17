@extends('layouts/main')

@section('title', 'Produk Agency')

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
            </div>
        </div>
    </div>
    <!-- End Bread crumb and right sidebar toggle -->

    <!-- Container fluid  -->
    <div class="container">
        <div class="card shadow mt-4 mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Order
                    <span>
                        <a data-toggle="modal" data-target="#addData" class="text-primary float-right">
                            <i class="fas fa-plus"><span class="ml-2">Add Data</span></i></a>
                        <a href="/pe/cetak_pdf" target="_blank" class="text-danger float-right" style="margin-right: 10px">
                            <i class="fas fa-file-pdf"><span class="ml-2">Export PDF</span></i></a>

                    </span>
                </h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-center">NO</th>
                                <th scope="col" class="text-center">Name </th>
                                <th scope="col" class="text-center">Product</th>
                                <th scope="col" class="text-center">price</th>
                                <th scope="col" class="text-center">Date Order</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pesan as $p)
                            <tr>
                                <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                <td class="text-center">{{$p->name}}</td>
                                <td class="text-center">{{$p->produk}}</td>
                                <td class="text-center">{{$p->price}}</td>
                                <td class="text-center">{{$p->date_order}}</td>
                                <td class="text-center">{{$p->status}}</td>
                                <td class="text-center"><a data-toggle="modal" data-target="#deletebill{{ $p->id }}" class="btn btn-small text-danger"><i class=" fa fa-trash"></i><span class="ml-2">Delete</span></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal" tabindex="-1" id="addData">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Data Order </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/pe/create" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Name </label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name Product" aria-label="name" aria-describedby="basic-addon1">
                                @if($errors->has('name'))
                                <div class="text-danger">
                                    {{ $errors->first('name')}}
                                </div>
                                @endif
                            </div>

                            <div class="form-group">
                            <label>Product </label>
                            <select class="custom-select my-1 mr-sm-2" id="product" name="product" class="form-control" aria-label="class" aria-describedby="basic-addon1">
                                <option value="0" selected disabled>Choose Product..</option>
                                @foreach ($product as $p)
                                <option value="{{ $p->name }}">
                                    {{ $p->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                            <div class="form-group">
                                <label>Price </label>
                                <input type="text" name="price" id="price" class="form-control" placeholder="Price" aria-label="price" aria-describedby="basic-addon1">
                                @if($errors->has('price'))
                                <div class="text-danger">
                                    {{ $errors->first('price')}}
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

        @foreach($pesan as $p)
        <div class="modal" tabindex="-1" id="deletebill{{$p->id}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete  </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda Yakin Ingin Menghapus Data Ini</p>
                    </div>
                    <div class="modal-footer">
                        <form action="pe/delete/{{$p->id}}" method="post">
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



    </div>
    <!-- End Container fluid  -->
</div>
<!-- End Page wrapper  -->
@endsection