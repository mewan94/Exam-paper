@extends('layouts.exams')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="exams">
                <h3>Your Results</h3>
                <div class="row">
                @php($c=0)
                @php($ca=0)
                @foreach($result as $res)
                    @if($res->exam_id==$exam)
                    @php($c++)
                    <div class="col-md-6 exam">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$c}}. {{$res->question}}</h5>
                            <ol>
                                <li class="@if($res->canswer==1){{'alert-success'}}@endif">{{$res->option1}}</li>
                                <li class="@if($res->canswer==2){{'alert-success'}}@endif">{{$res->option2}}</li>
                                <li class="@if($res->canswer==3){{'alert-success'}}@endif">{{$res->option3}}</li>
                                <li class="@if($res->canswer==4){{'alert-success'}}@endif">{{$res->option4}}</li>
                            </ol>
                            @if($res->canswer==$res->answer)
                            @php($ca++)
                            <p class="alert-success">Your answer is correct</p>
                            @else
                            <p class="alert-danger">Your answer({{$res->answer}}) is incorrect</p>
                            @endif
                        </div>
                    </div>
                    </div>
                    @endif
                @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <p class="alert-info text-center">Your Score is {{$ca}}/{{$c}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
