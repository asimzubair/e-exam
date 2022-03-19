<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    use HasFactory;

    public static function isCorrect($qId, $selectedOption)
    {
        $correctAnswer = self::where('question_id', $qId)->where('is_correct', 1)->first();
        return ($correctAnswer->id == $selectedOption);
    }

    public static function isPresent($qId, $writtenOption)
    {
        return self::where('question_id', $qId)->where('option', $writtenOption)->count();
    }

    public static function getAllOptions($qId)
    {
        return self::where('question_id', $qId)->orderBy('id','ASC')->pluck('option')->toArray();
    }

    public static function getTextareaOption($qId)
    {
        $option = self::where('question_id', $qId)->first();
        return $option->option ?? '';
    }
    
    public static function getCorrectAnswer($qId)
    {
        $correctAnswer = self::where('question_id', $qId)->where('is_correct', 1)->first();
        return $correctAnswer->option ?? '';
    }

    public static function getAllCorrectAnswers($qId)
    {
        return self::where('question_id', $qId)->where('is_correct', 1)->get();
    }
    
}
