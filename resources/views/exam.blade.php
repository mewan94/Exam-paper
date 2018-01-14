@extends('layouts.exams')

@section('content')
<script src="https://unpkg.com/vue@2.5.13/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="exams" id="app">
                <h3>{{$exam[0]->name}}</h3>
                <div class="row">
                    <div class="col-md-12" style="height: 100%;">
                        @php($c=0)
                        <form action="/exams/{{$exam[0]['id']}}/attempt" method="post" id="mypost">
                            {{ csrf_field() }}
                            <input hidden readonly name="exam" value="{{$exam[0]->id}}">
                        @foreach($questions as $question)
                            @php($c++)
                            <div class="card" style="margin: 10px 0px 10px 0px">
                                <div class="card-body">
                                    <h5 class="card-title">{{$c}}. {{$question['question']}}</h5>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="{{$question['id']}}" id="exampleRadios1{{$question['id']}}" value="1" required>
                                        <label class="form-check-label" for="exampleRadios1{{$question['id']}}">
                                            {{$question['option1']}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="{{$question['id']}}" id="exampleRadios2{{$question['id']}}" value="2">
                                        <label class="form-check-label" for="exampleRadios2{{$question['id']}}">
                                            {{$question['option2']}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="{{$question['id']}}" id="exampleRadios3{{$question['id']}}" value="3">
                                        <label class="form-check-label" for="exampleRadios3{{$question['id']}}">
                                            {{$question['option3']}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="{{$question['id']}}" id="exampleRadios4{{$question['id']}}" value="4">
                                        <label class="form-check-label" for="exampleRadios4{{$question['id']}}">
                                            {{$question['option4']}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            <button type="submit" class="btn btn-info sidebtn" href="#">Submit Answers</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        function send(){
            axios.get('/api/getquestions').then(function (response) {
                response=response.data;
                console.log(response);
            }).catch(function (error) {
                console.log(error);
            });
        }
    </script>
@endsection
