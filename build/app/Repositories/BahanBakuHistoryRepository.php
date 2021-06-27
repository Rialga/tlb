<?php

namespace App\Repositories;

use App\Models\BahanBakuHistory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BahanBakuHistoryRepository
 * @package App\Repositories
 * @version March 11, 2018, 12:57 am WIB
 *
 * @method BahanBakuHistory findWithoutFail($id, $columns = ['*'])
 * @method BahanBakuHistory find($id, $columns = ['*'])
 * @method BahanBakuHistory first($columns = ['*'])
*/
class BahanBakuHistoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
        'total_sisa'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BahanBakuHistory::class;
    }
}
