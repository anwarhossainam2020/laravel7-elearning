<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CourseSubscribe
 * @package App\Models
 * @version June 18, 2020, 12:35 pm UTC
 *
 * @property \App\Models\Course $course
 * @property integer $course_id
 * @property string $user_id
 */
class CourseSubscribe extends Model
{
    use SoftDeletes;

    public $table = 'course_subscribes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'course_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'course_id' => 'integer',
        'user_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function course()
    {
        return $this->belongsTo(\App\Models\Course::class, 'course_id', 'id');
    }
}
