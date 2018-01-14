<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Request;
use App\Exam;
use App\Question;
use App\User;
class ExamsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $exams=Exam::getall();
        $user=Auth::user();
        $user=$user['id'];
        $attempts=DB::table('answers')->where('user_id','=',$user)->select('exam_id')->groupBy('exam_id')->get();
        return view('dashboard',compact('exams','attempts'));
    }

    public function create()
    {
        $exams=Exam::getall();
        return view('newexam',compact('exams'));
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
           'name' => 'required|unique:exams|max:255'
        ]);
        $user=Auth::user();
        $user=$user['id'];
        $id=Exam::create(request('name'),$user);
        return redirect('exams/addquestions/'.$id);
    }

    public function storeq(Request $request){
        $this->validate(request(),[
            'exam' => 'required|integer',
           'question' => 'required|string|unique:questions,question',
            'op1' => 'required|string',
            'op2' => 'required|string',
            'op3' => 'required|string',
            'op4' => 'required|string',
            'answer' => 'required|integer|between:0,5'
        ]);
        Question::storequestion(request('exam'),request('question'),request('op1'),request('op2'),request('op3'),request('op4'),request('answer'));
        return redirect('exams/addquestions/'.request('exam'));
    }

    public function show($id)
    {
        $user=Auth::user();
        $user=$user['id'];
        $check=DB::table('answers')->where('user_id','=',$user)->where('exam_id','=',$id)->get();
        if($check->count()){
            return redirect('/exams/viewewsults/'.$id);
        }else{
            $exams=Exam::getall();
            $exam=Exam::get($id);
            $questions=Question::getExam($id);
            return view('exam',compact('exams','exam','questions'));
        }
    }
    public function attempt(Request $request){
        $answers=Request::all();
        $exam=$answers['exam'];
        unset($answers['_token']);
        unset($answers['exam']);
        $user=Auth::user();
        $user=$user['id'];
        Exam::saveanswers($user,$exam,$answers);
        return redirect('/exams/viewewsults/'.$exam);
    }
    public function showresults($exam){
        $user=Auth::user();
        $user=$user['id'];
        $result=Exam::getresult($user,$exam);
        $exams=Exam::getall();
        return view('results',compact('exams','result','exam'));
    }

    public function addquestion($id)
    {
        $exams=Exam::getall();
        return view('newquestion',compact('exams','id'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
