<?php

namespace App\Repositories;

use App\Models\Produk;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProdukRepository
 * @package App\Repositories
 * @version March 2, 2018, 7:13 pm UTC
 *
 * @method Produk findWithoutFail($id, $columns = ['*'])
 * @method Produk find($id, $columns = ['*'])
 * @method Produk first($columns = ['*'])
*/
class ProdukRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'mutu_produk',
        'satuan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Produk::class;
    }
}
