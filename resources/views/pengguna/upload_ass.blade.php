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
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="container">
        <!-- DataTales Example -->
        @foreach($modul as $m)
        <div class="card">
            <div class="card-header">
                Upload Tugas - {{$m->subject_matter}}
            </div>
            <div class="card-body">
                <table class="table table-striped">
                <form action="/ass/create" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <tr>
                        <td><p>Name</p></td>
                        <td>
                            <p>{{ Auth::user()->name }}</p>
                            <input type="hidden" name="name" id="name" value="{{ Auth::user()->name }}">
                        </td>
                    </tr>
                    <tr>
                        <td><p>Class Category </p></td>
                        <td>
                            <p>{{$m->class_category}}</p>
                            <input type="hidden" name="class" id="class" value="{{$m->class_category}}">
                        </td>
                    </tr>
                    <tr>
                        <td><p>Asigment Title</p></td>
                        <td>
                            <p>{{$m->subject_matter}}</p>
                            <input type="hidden" name="subject" id="suvject" value="{{$m->subject_matter}}">
                        </td>
                    </tr>
                    <tr>
                        <td><p>Online Text - <small>*Link Blog / Youtube</small></p></td>
                        <td>
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="Link" aria-label="Link" id="online" name="online" aria-describedby="basic-addon1">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><p>File Asignment</p></td>
                        <td>
                            <input type="file" name="file" id="file" class="btn btn-secondary">
                           
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Submit Date</p>
                        </td>
                        <td>
                            <p><?php
                                    $tanggal = mktime(date("m"), date("d"), date("Y"));
                                    echo date("d-M-Y", $tanggal);
                                ?>
                                <input type="hidden" name="date" id="date" value="$tanggal">   
                                
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <!-- <button type="submit" class="btn btn-success">Submit</button> -->
                        </td>
                        <td>
                            <button title="Silahkan Submit Disini" class="btn btn-success" id="btn-submit" type="submit">
                                Submit</button>
                        </td>
                    </tr>
                </table>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    @endsection