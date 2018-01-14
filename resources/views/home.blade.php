@extends('layouts.exams')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="banner">
                    <h1>Do You<br><span>Know ?</span></h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="home-btn col-md-12">
                <a href="/exams/create">Submit Exam</a>
                <a href="/exams">Attempt to an Exam</a>
            </div>
        </div>
    </div>
@endsection
