<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Answer
 * @package App\Models
 * @version June 21, 2020, 8:25 am UTC
 *
 * @property \App\Models\User $user
 * @property \App\Models\Lesson $lesson
 * @property \App\Models\Question $question
 * @property integer $user_id
 * @property integer $lesson_id
 * @property integer $question_id
 * @property string $answer
 */
class Answer extends Model
{
    use SoftDeletes;

    public $table = 'answers';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'lesson_id',
        'question_id',
        'answer'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'lesson_id' => 'integer',
        'question_id' => 'integer',
        'answer' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'answer' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function user()
    {
        return $this->hasOne(\App\Models\User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function lesson()
    {
        return $this->belongsTo(\App\Models\Lesson::class, 'lesson_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function question()
    {
        return $this->belongsTo(\App\Models\Question::class, 'question_id', 'id');
    }
}
