@extends('layouts.exams')

@foreach($exams as $exam)
@if($exam->id==$id)
@php($examname=$exam->name)
@endif
@endforeach
@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="jumbotron">
                <h3>Add Question to {{$examname}}</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/exams/storequestion" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="exam" value="{{$id}}">
                    <div class="form-group">
                        <label for="question">Question</label>
                        <textarea class="form-control" name="question" id="question" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="op1">Option one</label>
                        <input type="text" class="form-control" name="op1" id="op1" placeholder="Sample answer one" required>
                    </div>
                    <div class="form-group">
                        <label for="op1">Option two</label>
                        <input type="text" class="form-control" name="op2" id="op2" placeholder="Sample answer two" required>
                    </div>
                    <div class="form-group">
                        <label for="op1">Option three</label>
                        <input type="text" class="form-control" name="op3" id="op3" placeholder="Sample answer three" required>
                    </div>
                    <div class="form-group">
                        <label for="op1">Option four</label>
                        <input type="text" class="form-control" name="op4" id="op4" placeholder="Sample answer four" required>
                    </div>
                    <div class="form-group">
                        <label for="answer">Correct answer</label>
                        <select class="form-control" name="answer" id="answer" required>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/exams" class="btn btn-warning">Cancel & Exit</a>
                </form>
            </div>
        </div>
    </div>
@endsection
