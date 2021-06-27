<?php

namespace App\Repositories;

use App\Models\KendaraanDetail;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KendaraanDetailRepository
 * @package App\Repositories
 * @version March 14, 2018, 9:43 pm WIB
 *
 * @method KendaraanDetail findWithoutFail($id, $columns = ['*'])
 * @method KendaraanDetail find($id, $columns = ['*'])
 * @method KendaraanDetail first($columns = ['*'])
*/
class KendaraanDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kendaraan_id',
        'status',
        'waktu'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return KendaraanDetail::class;
    }
}
