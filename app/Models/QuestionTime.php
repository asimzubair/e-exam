<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionTime extends Model
{
    use HasFactory;

    protected  $table = 'question_time';

    protected $fillable = [
        'user_id',
        'starttime',
        'endtime',
        'end_time',
        'totaltime',
        'question_id'
    ];
}
