<?php

namespace App\Repositories;

use App\Models\Pemesanan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PemesananRepository
 * @package App\Repositories
 * @version March 2, 2018, 7:36 pm UTC
 *
 * @method Pemesanan findWithoutFail($id, $columns = ['*'])
 * @method Pemesanan find($id, $columns = ['*'])
 * @method Pemesanan first($columns = ['*'])
*/
class PemesananRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_pemesanan',
        'volume_pesanan',
        'tanggal_pesanan',
        'tanggal_kirim',
        'lokasi_proyek',
        'jenis_pesanan',
        'cp_pesanan',
        'keterangan',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pemesanan::class;
    }
}
