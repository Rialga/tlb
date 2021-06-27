<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class KomposisiMutu
 * @package App\Models
 * @version March 13, 2018, 12:07 am WIB
 *
 * @property integer produk_id
 * @property integer bahan_baku_id
 * @property integer volume
 */
class KomposisiMutu extends Model
{
    use SoftDeletes;

    public $table = 'komposisi_mutu';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'produk_id',
        'bahan_baku_id',
        'volume'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'produk_id' => 'integer',
        'bahan_baku_id' => 'integer',
        'volume' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'produk_id' => 'required',
        'bahan_baku_id' => 'reuired',
        'volume' => 'required'
    ];

    public function produk()
    {
        return $this->belongsTo('App\Models\Produk');
    }

    public function bahan_baku()
    {
        return $this->belongsTo('App\Models\BahanBaku');
    }
}
