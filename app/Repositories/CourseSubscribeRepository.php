<?php

namespace App\Repositories;

use App\Models\CourseSubscribe;
use App\Repositories\BaseRepository;

/**
 * Class CourseSubscribeRepository
 * @package App\Repositories
 * @version June 18, 2020, 12:35 pm UTC
*/

class CourseSubscribeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id'
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
        return CourseSubscribe::class;
    }
}
