<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Opname
 * @package App\Models
 * @version March 2, 2018, 7:55 pm UTC
 *
 * @property integer bahan_baku_id
 * @property integer volume_opname
 * @property string keterangan
 * @property string|\Carbon\Carbon tanggal_pemakaian
 */
class Opname extends Model
{
    use SoftDeletes;

    public $table = 'opnames';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'bahan_baku_id',
        'volume_opname',
        'keterangan',
        'tanggal_pemakaian'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'bahan_baku_id' => 'integer',
        'volume_opname' => 'double',
        'keterangan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'bahan_baku_id' => 'required',
        'volume_opname' => 'required',
        'tanggal_pemakaian' => 'required'
    ];

    public function bahan_baku()
    {
        return $this->belongsTo('App\Models\BahanBaku');
    }

    public function bahan_baku_histories()
    {
        return $this->hasMany(BahanBakuHistory::class);
    }

    protected static function boot()
    {
        parent::boot();

        self::deleting(function (Opname $opname) {
            foreach ($opname->bahan_baku_histories as $bahan_baku_history) {
                $bahan_baku_history->delete();
            }
        });
    }
}
