@component('mail::message')
# Pemberitahuan Penerimaan Bantuan Sosial

Halo, **{{ $data['nama'] }}**,

Dengan ini kami sampaikan bahwa Anda telah **DITERIMA** sebagai penerima **Bantuan Sosial** dengan rincian sebagai berikut:

@component('mail::panel')
### ✅ Status: Diterima  
**Jenis Bantuan:** {{ $data['jenis_bantuan'] }}  
**Tanggal Pengambilan:** {{ \Carbon\Carbon::parse($data['tanggal_pengambilan'])->format('d/m/Y') }}
@endcomponent


Kami ucapkan selamat! Semoga bantuan ini bermanfaat bagi Anda.

Jika ada pertanyaan lebih lanjut, silakan hubungi petugas kami melalui kontak resmi.

Terima kasih,  
**Dinas Sosial**  
{{ config('app.name') }}
@endcomponent
