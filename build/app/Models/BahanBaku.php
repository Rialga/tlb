<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BahanBaku
 * @package App\Models
 * @version March 2, 2018, 7:49 pm UTC
 *
 * @property string nama_bahan_baku
 * @property string satuan
 */
class BahanBaku extends Model
{
    use SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        self::deleting(function (BahanBaku $bahanBaku) {
            foreach ($bahanBaku->bahan_baku_histories as $child) {
                $child->delete();
            }
        });

        self::deleting(function (BahanBaku $bahanBaku) {
            foreach ($bahanBaku->pengadaans as $child) {
                $child->delete();
            }
        });

        self::deleting(function (BahanBaku $bahanBaku) {
            foreach ($bahanBaku->komposisi_mutus as $child) {
                $child->delete();
            }
        });

        self::deleting(function (BahanBaku $bahanBaku) {
            foreach ($bahanBaku->opnames as $child) {
                $child->delete();
            }
        });
    }

    public $table = 'bahan_bakus';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_bahan_baku',
        'satuan',
        'sisa',
        'kode',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_bahan_baku' => 'string',
        'satuan' => 'string',
        'sisa' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_bahan_baku' => 'required',
        'satuan' => 'required'
    ];

    public static function getBahanBaku($kode)
    {
        return BahanBaku::where('kode', $kode)->first();
    }

    public function bahan_baku_histories()
    {
        return $this->hasMany(BahanBakuHistory::class);
    }

    public function pengadaans()
    {
        return $this->hasMany('App\Models\Pengadaan');
    }

    public function getTambahan($id)
    {
        return BahanBaku::find($id);
    }

    public function batas_pengadaan()
    {
        return $this->hasOne(BatasPengadaan::class);
    }

    public function komposisi_mutus()
    {
        return $this->hasMany('App\Models\KomposisiMutu');
    }

    public function opnames()
    {
        return $this->hasMany(Opname::class);
    }

    public function produks()
    {
        return $this->belongsToMany(Produk::class, 'komposisi_mutu');
    }
}
