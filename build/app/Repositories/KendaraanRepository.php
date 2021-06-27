<?php

namespace App\Repositories;

use App\Models\Kendaraan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KendaraanRepository
 * @package App\Repositories
 * @version March 14, 2018, 9:08 pm WIB
 *
 * @method Kendaraan findWithoutFail($id, $columns = ['*'])
 * @method Kendaraan find($id, $columns = ['*'])
 * @method Kendaraan first($columns = ['*'])
*/
class KendaraanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'jenis_kendaraan',
        'no_polisi'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Kendaraan::class;
    }
}
