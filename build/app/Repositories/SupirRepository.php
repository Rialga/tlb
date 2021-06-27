<?php

namespace App\Repositories;

use App\Models\Supir;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SupirRepository
 * @package App\Repositories
 * @version March 2, 2018, 7:23 pm UTC
 *
 * @method Supir findWithoutFail($id, $columns = ['*'])
 * @method Supir find($id, $columns = ['*'])
 * @method Supir first($columns = ['*'])
*/
class SupirRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'no_supir',
        'nama_supir'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Supir::class;
    }
}
