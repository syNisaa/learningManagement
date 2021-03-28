@extends('layouts/main')

@section('title', 'User - List Modul')

@section('container')
<div class="page-wrapper">

    <div class="card">
        <div class="card-header">
            Modul Pembelajaran
        </div>
        @foreach($modul as $m)
        <div class="card-body">
            <ul style="list-style-type:none;">
                <li>
                    <i class="fas fa-folder"></i>
                    <a href="/reading{{ $m->id }}">{{$m->subject_matter}}</a>
                </li>
            </ul>
        </div>
        @endforeach
    </div>
</div>
@endsection