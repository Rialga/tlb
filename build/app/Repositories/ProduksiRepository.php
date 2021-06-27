<?php

namespace App\Repositories;

use App\Models\Produksi;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProduksiRepository
 * @package App\Repositories
 * @version March 2, 2018, 7:44 pm UTC
 *
 * @method Produksi findWithoutFail($id, $columns = ['*'])
 * @method Produksi find($id, $columns = ['*'])
 * @method Produksi first($columns = ['*'])
*/
class ProduksiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'volume',
        'semen',
        'pasir',
        'split',
        'addictive',
        'air',
        'waktu_produksi',
        'no_kendaraan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Produksi::class;
    }
}
