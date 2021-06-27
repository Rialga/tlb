<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BahanBakuHistory
 * @package App\Models
 * @version March 11, 2018, 12:57 am WIB
 *
 * @property integer bahan_baku_id
 * @property integer type
 * @property integer pengadaan_id
 * @property integer produksi_id
 * @property integer opname_id
 * @property integer total_sisa
 */
class BahanBakuHistory extends Model
{
    use SoftDeletes;

    public $table = 'bahan_baku_histories';


    protected $dates = ['deleted_at', 'waktu'];


    public $fillable = [
        'bahan_baku_id',
        'type',
        'waktu',
        'pengadaan_id',
        'produksi_id',
        'opname_id',
        'volume',
        'total_sisa'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'bahan_baku_id' => 'integer',
        'type' => 'integer',
        'pengadaan_id' => 'integer',
        'produksi_id' => 'integer',
        'opname_id' => 'integer',
        'volume' => 'double',
        'total_sisa' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'bahan_baku_id' => 'required',
        'type' => 'required',
        'waktu' => 'required',
        'pengadaan_id' => 'nullable',
        'produksi_id' => 'nullable',
        'opname_id' => 'nullable',
        'total_sisa' => 'required'
    ];

    public function bahan_baku()
    {
        return $this->belongsTo(BahanBaku::class);
    }

    public function produksi()
    {
        return $this->belongsTo(Produksi::class);
    }

    public function opname()
    {
        return $this->belongsTo(Opname::class);
    }

    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class);
    }
}
