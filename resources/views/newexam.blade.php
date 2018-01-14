@extends('layouts.exams')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="jumbotron">
                <p>Create a Name First</p>
                <form class="exam-form form-inline col-md-12" method="post" action="/exams/save">
                    {{ csrf_field() }}
                    <label class="sr-only" for="inlineFormInputName2">Exam</label>
                    <input type="text" name="name" class="form-control mb-2 mr-sm-2 col-md-8" id="inlineFormInputName2" placeholder="Sample Exam 1" required>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary mb-2">Create Exam</button>
                </form>
            </div>
        </div>
    </div>
@endsection
