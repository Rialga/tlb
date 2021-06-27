<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Kendaraan
 * @package App\Models
 * @version March 14, 2018, 9:08 pm WIB
 *
 * @property string jenis_kendaraan
 * @property string no_polisi
 */
class Kendaraan extends Model
{
    use SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        self::deleting(function (Kendaraan $kendaraan) {
            foreach ($kendaraan->kendaraanDetails as $child) {
                $child->delete();
            }
        });
    }

    public $table = 'kendaraans';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'jenis_kendaraan',
        'no_polisi',
        'masa_pajak',
        'masa_stnk',
        'masa_kir'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'jenis_kendaraan' => 'string',
        'no_polisi' => 'string',
        'masa_pajak' => 'date',
        'masa_stnk' => 'date',
        'masa_kir'=>'date'

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'jenis_kendaraan' => 'required',
        'no_polisi' => 'required',
        'masa_pajak' => 'required',
        'masa_stnk' => 'required',
        'masa_kir' => 'required'
    ];

    public function kendaraanDetails()
    {
        return $this->hasMany('App\Models\KendaraanDetail');
    }

    public function lastStatus()
    {
        return $this->kendaraanDetails()->orderBy('waktu', 'desc')->first();
    }
}
