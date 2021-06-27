<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PemesananBahanBaku
 * @package App\Models
 * @version April 16, 2018, 1:57 pm WIB
 *
 * @property string nama_supplier
 * @property integer cp_supplier
 * @property integer bahan_baku_id
 * @property integer volume_pemesanan
 * @property date tanggal_pemesanan
 * @property string keterangan
 */
class PemesananBahanBaku extends Model
{
    use SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        self::deleting(function (PemesananBahanBaku $pemesananBahanBaku) {
            foreach ($pemesananBahanBaku->pengadaans as $child) {
                $child->delete();
            }
        });
    }

    public $table = 'pemesanan_bahan_bakus';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_supplier',
        'cp_supplier',
        'bahan_baku_id',
        'volume_pemesanan',
        'tanggal_pemesanan',
        'keterangan',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_supplier' => 'string',
        'cp_supplier' => 'string',
        'bahan_baku_id' => 'integer',
        'volume_pemesanan' => 'double',
        'tanggal_pemesanan' => 'datetime',
        'keterangan' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_supplier' => 'required',
        'cp_supplier' => 'required',
        'bahan_baku_id' => 'required',
        'volume_pemesanan' => 'required',
        'tanggal_pemesanan' => 'required',
    ];

    public function bahan_baku()
    {
        return $this->belongsTo('App\Models\BahanBaku');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function pengadaans()
    {
        return $this->hasMany('App\Models\Pengadaan');
    }

    public function getSupplierBahanBakuAttribute()
    {
        return $this->nama_supplier . ' - ' . $this->bahan_baku->nama_bahan_baku;
    }
}
