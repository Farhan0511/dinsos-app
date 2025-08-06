@component('mail::message')
# Verifikasi Akun

Halo, **{{ $data['nama'] }}**,

Masukkan kode dibawah untuk memverifikasi akun!

@component('mail::panel')
Nama: **{{ $data['nama'] }}**
<br>
Email: **{{ $data['email'] }}**
<br>
Kode OTP: **{{ $data['otp'] }}**
<br>
Kode berlaku selama 30 menit.
@endcomponent

Jika ada pertanyaan lebih lanjut, silakan hubungi petugas kami melalui kontak resmi.

Terima kasih,  
**Dinas Sosial**  
{{ config('app.name') }}
@endcomponent
