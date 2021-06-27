<?php

namespace App\Repositories;

use App\Models\BahanBaku;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BahanBakuRepository
 * @package App\Repositories
 * @version March 2, 2018, 7:49 pm UTC
 *
 * @method BahanBaku findWithoutFail($id, $columns = ['*'])
 * @method BahanBaku find($id, $columns = ['*'])
 * @method BahanBaku first($columns = ['*'])
*/
class BahanBakuRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_bahan_baku',
        'satuan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BahanBaku::class;
    }
}
