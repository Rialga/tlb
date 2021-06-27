<?php

namespace App\Repositories;

use App\Models\Opname;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OpnameRepository
 * @package App\Repositories
 * @version March 2, 2018, 7:55 pm UTC
 *
 * @method Opname findWithoutFail($id, $columns = ['*'])
 * @method Opname find($id, $columns = ['*'])
 * @method Opname first($columns = ['*'])
*/
class OpnameRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'volume_opname',
        'keterangan',
        'tanggal_pemakaian'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Opname::class;
    }
}
