@extends('layouts/main')

@section('title', 'Dashboard Instructor')

@section('container')

<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
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
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- *************************************************************** -->
        <!-- Start First Cards -->
        <!-- *************************************************************** -->
        <div class="card-group">
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium">{{ $countStudent }}</h2>
                                {{-- <span
                                            class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">+18.33%
                                        </span> --}}
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Data Student {{ Auth::user()->class }}</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i class="fas fa-chalkboard-teacher"></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{ $countJadwal }}</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">All Jadwal
                            </h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i class="fas fa-chalkboard-teacher"></i></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End First Cards -->

        <!-- Start First Cards -->
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold">Data Jadwal </h6>
            </div>
            @if($jadwals->count() > 0)
            <div class="row ml-2 mr-2">
                @foreach($jadwals as $c)
                <div class="col-md-4 mt-4">
                    <div class="card shadow mb-6" style="border-radius: 20px">
                        <div class="card-body" href="/addSchedule">
                            <b>
                                <p class="card-text">{{ $c->type_conference }}</p>
                            </b>
                            <p class="card-text">Hari <span>{{ $c->days }}</span></p>
                            <p class="card-text">Date : {{ $c->time }}</p>
                            <p class="card-text">Category Class : {{ $c->class_category }}</p>
                            <a class="card-text">Link Converence : {{ $c->link_zoom }}</a>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach
            </div>
            @else
            <div class="row justify-content-center" style="margin-top: 15%">
                <div class="col text-center">
                    <b>Project Belum Tersedia</b>
                </div>
            </div>
            @endif
            <!-- End First Cards -->

        </div>

        <!-- Start Cards Class -->
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Class</h6>
            </div>
            @if($classes->count() > 0)
            <div class="row ml-2 mr-2">
                @foreach($classes as $c)
                <div class="col-md-4 mt-4">
                    <div class="card shadow mb-4">
                        <img class="card-img-top" src="{{ asset ('image_class/'. $c->image) }}" alt="Card image cap" width="100" height="180">
                        <div class="card-body">
                            <b><a class="text" href="/student{{ $c->category }}">{{ $c->category }}</a></b>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach
            </div>
            @else
            <div class="row justify-content-center" style="margin-top: 15%">
                <div class="col text-center">
                    <b>Project Belum Tersedia</b>
                </div>
            </div>
            @endif
        </div>
        <!-- End Cards Class -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->

    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    @endsection