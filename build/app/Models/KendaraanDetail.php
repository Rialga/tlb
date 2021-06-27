<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class KendaraanDetail
 * @package App\Models
 * @version March 14, 2018, 9:43 pm WIB
 *
 * @property integer kendaraan_id
 * @property integer status
 * @property string|\Carbon\Carbon waktu
 */
class KendaraanDetail extends Model
{
    use SoftDeletes;

    public $table = 'kendaraan_details';


    protected $dates = ['deleted_at','waktu'];


    public $fillable = [
        'kendaraan_id',
        'status',
        'waktu',
        'keterangan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'integer',
        'keterangan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'status' => 'required',
        'waktu' => 'required',
        'keterangan' => 'nullable'
    ];

    public function kendaraan()
    {
        return $this->belongsTo('App\Models\Kendaraan');
    }

    public function last()
    {
        return $this->latest()->first();
    }
}
