@extends('layouts.exams')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="exams">
                <h3>New Exams</h3>
                <div class="row">
                @foreach($exams as $exam)
                    <div class="col-md-4 exam">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{$exam->name}}</h5>

                                @php($c=false)
                                @foreach($attempts as $attempt)
                                    @if($attempt->exam_id == $exam->id)
                                        @php($c=true)
                                    @endif
                                @endforeach
                                @if($c)
                                <a href="/exams/{{$exam->id}}" class="btn btn-info btn-block">View Results</a>
                                @else
                                <a href="/exams/{{$exam->id}}" class="btn btn-success btn-block">Attempt to Exam</a>
                                @endif

                        </div>
                    </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
