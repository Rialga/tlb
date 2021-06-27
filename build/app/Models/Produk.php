<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Produk
 * @package App\Models
 * @version March 2, 2018, 7:13 pm UTC
 *
 * @property string mutu_produk
 * @property string satuan
 */
class Produk extends Model
{
    use SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        self::deleting(function (Produk $produk) {
            foreach ($produk->komposisi_mutus as $child) {
                $child->delete();
            }
        });

        self::deleting(function (Produk $produk) {
            foreach ($produk->produksis as $child) {
                $child->delete();
            }
        });
    }

    public $table = 'produks';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'mutu_produk',
        'satuan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'mutu_produk' => 'string',
        'satuan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'mutu_produk' => 'required',
        'satuan' => 'required'
    ];

    public function komposisi_mutus()
    {
        return $this->hasMany('App\Models\KomposisiMutu');
    }

    public function bahan($kode)
    {
        $bahan_id = BahanBaku::where('kode', $kode)->first()->id;
        return $this->komposisi_mutus->where('bahan_baku_id', $bahan_id)->first();
    }

    public function bahan_bakus()
    {
        return $this->belongsToMany(BahanBaku::class, 'komposisi_mutu');
    }

    public function produksis()
    {
        return $this->hasMany(Produksi::class);
    }
}
