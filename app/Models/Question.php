<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Question
 * @package App\Models
 * @version June 18, 2020, 11:51 am UTC
 *
 * @property \App\Models\Lesson $lesson
 * @property integer $course_id
 * @property integer $lesson_id
 * @property string $question
 * @property string $option1
 * @property string $option2
 * @property string $option3
 * @property string $option4
 * @property string $answer
 */
class Question extends Model
{
    use SoftDeletes;

    public $table = 'questions';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'lesson_id',
        'question',
        'option1',
        'option2',
        'option3',
        'option4',
        'answer',
        'course_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'course_id' => 'integer',
        'lesson_id' => 'integer',
        'question' => 'string',
        'option1' => 'string',
        'option2' => 'string',
        'option3' => 'string',
        'option4' => 'string',
        'answer' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'course_id' => 'required',
        'lesson_id' => 'required',
        'question' => 'required',
        'option1' => 'required',
        'option2' => 'required',
        'option3' => 'required',
        'option4' => 'required',
        'answer' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function course()
    {
        return $this->belongsTo(\App\Models\Course::class, 'course_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function lesson()
    {
        return $this->belongsTo(\App\Models\Lesson::class, 'lesson_id', 'id');
    }    
}
