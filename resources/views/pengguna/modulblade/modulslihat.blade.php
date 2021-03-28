@extends('layouts/main')

@section('title', 'User - List Modul')

@section('container')


<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                    </nav>
                </div>
            </div>

        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    @foreach($modul as $m)
    <div class="container-fluid" style="margin-top: -35px;">
        <div class="card">
            <div class="card-header">
                Video Pembelajaran | {{$m->basic_competencies}} | Due Date : {{$m->due_date}}
            </div>
            <div class="card-body">
                <div class="row" style="grid-template-columns: auto auto;">
                    <iframe width="550" height="305" src="{{$m->video_tutorials}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                    <div class="contentmod" style="margin-left: 20px;">
                        <font face="Courier New" size="6"><b>{{$m->subject_matter}}</b></font>
                        <div id="countdown" class="mt-3">
                        </div>

                    </div>
                </div>
            </div>

            <script>
                CountDownTimer('{{$m->due_date}}', 'countdown');

                function CountDownTimer(dt, id) {
                    var end = new Date('{{$m->due_date}}');

                    var _second = 1000;
                    var _minute = _second * 60;
                    var _hour = _minute * 60;
                    var _day = _hour * 24;
                    var timer;

                    function showRemaining() {
                        var now = new Date();
                        var distance = end - now;

                        if (distance < 0) {

                            clearInterval(timer);
                            document.getElementById(id).innerHTML = '<b>TUGAS SUDAH BERAKHIR</b> ';
                            document.getElementById(id).innerHTML += '<br><br><button class="btn btn-danger">Terlambat</button>';
                            return;



                        }

                        var days = Math.floor(distance / _day);
                        var hours = Math.floor((distance % _day) / _hour);
                        var minutes = Math.floor((distance % _hour) / _minute);
                        var seconds = Math.floor((distance % _minute) / _second);

                        document.getElementById(id).innerHTML = days + ' days ';
                        document.getElementById(id).innerHTML += hours + ' hrs ';
                        document.getElementById(id).innerHTML += minutes + ' mins ';
                        document.getElementById(id).innerHTML += seconds + ' secs <br>';
                        document.getElementById(id).innerHTML += '<br><h5>MODUL DAN PENUGASAN BELUM BERAKHIR</h5>';
                        document.getElementById(id).innerHTML += '<br><a href="/materi/baca/{{$m->id}}" class="btn btn-primary">Read</a>';

                        document.getElementById(id).innerHTML += '<a href="/up{{$m->id}}" class="btn btn-success" style="margin-left:3px;">Send Assignment</a>';



                    }
                    timer = setInterval(showRemaining, 1000);
                }
            </script>

            </script>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection