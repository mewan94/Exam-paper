<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Exam extends Model
{
    public static function get($id){
        return static::where('id',$id)->get();
    }
    public static function getall(){
        return static::all();
    }
    public static function saveanswers($userid,$exam,$answers){

        foreach ($answers as $key => $answer){
            $id = DB::table('answers')->insertGetId([
                'user_id' => $userid,
                'exam_id' => $exam,
                'question_id' => $key,
                'answer' => $answer
            ]);
        }
    }
    public static function create($name,$createdby){
        $exam=new Exam();
        $exam->name = $name;
        $exam->created_by = $createdby;
        $exam->save();
        return $exam->id;
    }
    public static function getresult($user,$exam){
        $result=DB::table('answers')
            ->where('user_id','=',$user)
            ->join('questions','answers.question_id','=','questions.id')
            ->oldest()
            ->get();
        return $result;
    }

}
