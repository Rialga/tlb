@component('mail::message')
# Selamat! Akun anda telah terdaftar.

Berikut detail akun anda:

- Nama : {{$data['name']}}
- Email : {{ $data['email']}}
- Password : {{ $data['password']}}
- Jabatan : {{$data['jabatan']}}

@component('mail::button', ['url' => 'https://sim.tigalaskarbeton.com'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
