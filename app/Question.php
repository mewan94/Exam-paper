<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public static function getExam($examid){
        return static::where('exam_id',$examid)->get(array('id','exam_id','question','option1','option2','option3','option4'));
    }
    public static function storequestion($examid,$ques,$op1,$op2,$op3,$op4,$ans){
        $question = new Question();
        $question->exam_id=$examid;
        $question->question=$ques;
        $question->option1=$op1;
        $question->option2=$op2;
        $question->option3=$op3;
        $question->option4=$op4;
        $question->canswer=$ans;
        $question->save();
    }
}
