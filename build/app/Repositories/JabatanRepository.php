<?php

namespace App\Repositories;

use App\Models\Jabatan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class JabatanRepository
 * @package App\Repositories
 * @version March 2, 2018, 7:15 pm UTC
 *
 * @method Jabatan findWithoutFail($id, $columns = ['*'])
 * @method Jabatan find($id, $columns = ['*'])
 * @method Jabatan first($columns = ['*'])
*/
class JabatanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_jabatan',
        'keterangan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Jabatan::class;
    }
}
