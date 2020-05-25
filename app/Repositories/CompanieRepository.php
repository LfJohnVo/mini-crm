<?php

namespace App\Repositories;

use App\Models\Companie;
use App\Repositories\BaseRepository;

/**
 * Class CompanieRepository
 * @package App\Repositories
 * @version May 25, 2020, 10:03 am UTC
*/

class CompanieRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'logo',
        'website'
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
        return Companie::class;
    }
}
