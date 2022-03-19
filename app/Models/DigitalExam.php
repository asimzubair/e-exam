<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalExam extends Model
{
    use HasFactory;

    protected  $table = 'create_digital_exam';

    protected $fillable = [
        'professional_group_number',
        'examing_body',
        'date_of_examination',
        'exam_release',
        'exam_graders',
        'exam_id'
    ];
}
