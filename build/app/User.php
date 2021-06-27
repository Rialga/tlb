<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'jabatan_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function jabatan()
    {
        return $this->belongsTo('App\Models\Jabatan');
    }

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'jabatan_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'sometimes|required|email|unique:users',
        'password' => 'required',
        'jabatan_id' => 'required',
    ];

    public function pemesanans()
    {
        return $this->hasMany(Models\Pemesanan::class);
    }

    public function produksis()
    {
        return $this->hasMany(Models\Produksi::class);
    }

    public function pengirimans()
    {
        return $this->hasMany(Models\Pengiriman::class);
    }

    public function pengadaans()
    {
        return $this->hasMany(Models\Pengadaan::class);
    }

    public function pemesanan_bahan_bakus()
    {
        return $this->hasMany(Models\PemesananBahanBaku::class);
    }

    protected static function boot()
    {
        parent::boot();

        self::deleting(function (User $user) {
            foreach ($user->pemesanans as $child) {
                $child->delete();
            }
        });

        self::deleting(function (User $user) {
            foreach ($user->produksis as $child) {
                $child->delete();
            }
        });

        // self::deleting(function (User $user) {
        //     foreach ($user->pengirimans as $child) {
        //         $child->delete();
        //     }
        // });

        self::deleting(function (User $user) {
            foreach ($user->pengadaans as $child) {
                $child->delete();
            }
        });

        self::deleting(function (User $user) {
            foreach ($user->pemesanan_bahan_bakus as $child) {
                $child->delete();
            }
        });
    }

    public function is($role)
    {
        if ($this->jabatan->kode_jabatan == $role) {
            return true;
        }

        return false;
    }
}
