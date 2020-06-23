<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Lesson
 * @package App\Models
 * @version June 18, 2020, 11:44 am UTC
 *
 * @property \App\Models\Course $course
 * @property integer $course_id
 * @property string $name
 * @property string $details
 */
class Lesson extends Model
{
    use SoftDeletes;

    public $table = 'lessons';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'course_id',
        'name',
        'details'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'course_id' => 'integer',
        'name' => 'string',
        'details' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function course()
    {
        return $this->belongsTo(\App\Models\Course::class, 'course_id', 'id');
    }
}
