<?php

namespace App\Repositories;

use App\Models\KomposisiMutu;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KomposisiMutuRepository
 * @package App\Repositories
 * @version March 13, 2018, 12:07 am WIB
 *
 * @method KomposisiMutu findWithoutFail($id, $columns = ['*'])
 * @method KomposisiMutu find($id, $columns = ['*'])
 * @method KomposisiMutu first($columns = ['*'])
*/
class KomposisiMutuRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'volume'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return KomposisiMutu::class;
    }
}
