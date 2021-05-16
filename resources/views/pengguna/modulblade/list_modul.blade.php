@extends('layouts/main')

@section('title', 'User - List Modul')

@section('container')
<div class="page-wrapper">

    <div class="card">
        <div class="card-header">
            <font size="4" face="Comic Sans CS"> Modul Pembelajaran <br>
        </div>
        @foreach($modul as $m)
        <div class="card-body">
            <i class="fas fa-folder" style="margin-right: 6px;"></i>
            <a href="/reading{{ $m->id }}" style="color:black;">
                <font size="5" face="Courier New"><b> Modul {{$m->subject_matter}}</b>
            </a></font> <br>

            <i class="fas fa-edit" style=" margin-left:25px;"></i>
            <a data-toggle="modal" data-target="#viewAssignment{{$m->id}}" style="color:#666d78;">
                <font size="3" face="Courier New">Tugas {{$m->subject_matter}}
            </a></font></a><br>
        </div>
    @endforeach
    
            @foreach($modul as $m)
            <div class="modal" tabindex="-1" id="viewAssignment{{$m->id}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                               Tugas
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{$m-> assignment}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    @endsection