<?php

namespace App\Repositories;

use App\Models\Pengadaan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PengadaanRepository
 * @package App\Repositories
 * @version March 2, 2018, 7:53 pm UTC
 *
 * @method Pengadaan findWithoutFail($id, $columns = ['*'])
 * @method Pengadaan find($id, $columns = ['*'])
 * @method Pengadaan first($columns = ['*'])
*/
class PengadaanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'berat',
        'pemesanan_bahan_baku_id',
        'tanggal_pengadaan',
        'keterangan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pengadaan::class;
    }
}
