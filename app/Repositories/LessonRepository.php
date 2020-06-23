<?php

namespace App\Repositories;

use App\Models\Lesson;
use App\Repositories\BaseRepository;

/**
 * Class LessonRepository
 * @package App\Repositories
 * @version June 18, 2020, 11:44 am UTC
*/

class LessonRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'details'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Lesson::class;
    }
}
