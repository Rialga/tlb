<?php

namespace App\Repositories;

use App\Models\PemesananBahanBaku;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PemesananBahanBakuRepository
 * @package App\Repositories
 * @version April 16, 2018, 1:57 pm WIB
 *
 * @method PemesananBahanBaku findWithoutFail($id, $columns = ['*'])
 * @method PemesananBahanBaku find($id, $columns = ['*'])
 * @method PemesananBahanBaku first($columns = ['*'])
*/
class PemesananBahanBakuRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_supplier',
        'cp_supplier',
        'bahan_baku_id',
        'volume_pemesanan',
        'tanggal_pemesanan',
        'keterangan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PemesananBahanBaku::class;
    }
}
