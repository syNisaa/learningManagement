@extends('layouts/main')

@section('title', 'Dashboard Admin')

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
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->

    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start First Cards -->

        <!-- End First Cards -->

        <!-- Start Cards Jadwal -->
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold">Data Jadwal </h5>
            </div>
            @if($jadwals->count() > 0)
            <div class="row ml-2 mr-2">
                @foreach($jadwals as $c)
                <div class="col-md-4 mt-4">
                    <div class="card shadow mb-6" style="border-radius: 20px">
                        <div class="card-body" href="/addSchedule">
                            <b>
                                <center><b><a href="/viewmodul"><h5 class="card-text" style="color:black;">{{ $c->class_category }}</h5></a></b></center><br>
                            </b>
                            <p class="card-text">Hari <span>{{ $c->days }}</span></p>
                            <p class="card-text">Date : {{ $c->time }}</p>
                            <p class="card-text">Topik :<b> {{ $c->type_conference }}</b></p>
                            <p class="card-text">Instructor : {{ $c->ins }}</p>
                            <a class="card-text">Link Converence : <a href="{{ $c->link_zoom }}"> {{ $c->link_zoom }}</a></a>
                        </div>
                    </div>
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
        <!-- End Cards Jadwals -->

        <!-- Start Cards Class -->


    </div>
    <!-- End Container fluid  -->
</div>
<!-- End Page wrapper  -->
@endsection