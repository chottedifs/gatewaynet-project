@component('mail::message')
# Selamat Datang !

Hi {{$user->name}}
<br>
Selamat anda bergabung di Gatewaynet, Akun kamu telah selesai dibuat, Sekarang kamu bisa melakukan verifikasi email
dengan menekan tombol dibawah ini.

@component('mail::button', ['url' => route('login')])
Verifikasi Sekarang
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
