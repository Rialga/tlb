## [Demo Aplikasi Klik Disini](https://pemesanan.herokuapp.com)

[![build status](https://gitlab.com/fauzipadlaw/pemesanan/badges/master/build.svg)](https://gitlab.com/fauzipadlaw/pemesanan/commits/master)

# Sistem Manajemen Pemesanan

#### Clone Project

* `git clone git@gitlab.com:fauzipadlaw/pemesanan.git`

* `cd pemesanan`

* Copy file .env.example to .env

  * **bash :** `cp .env.example .env`

  * **cmd  :** `copy .env.example .env`

* `composer install && php artisan migrate --seed`

* `php artisan key:generate`

**Default Email    :** _admin@admin.com_

**Default Password :** _secret_

#### **_Aturan penulisan kode:_**

* Penulisan variable jangan disingkat dengan singkatan yang tidak wajar (betul : `$pemesanan`, `$no_polisi` | salah : `$pmsnn`, `$no_pls`)

* Jika belum di merge, push ke branch yang sama dengan branch push terakhir

* Samakan gaya penulisan dengan gaya penulisan kode yang sudah ada. Misal penulisan array : `[1,2,3]` bukan `array(1,2,3)`
