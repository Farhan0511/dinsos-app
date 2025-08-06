@component('mail::message')
# Pemberitahuan Penerimaan Bantuan Sosial

Halo, **{{ $data['nama'] }}**,

Dengan ini kami sampaikan bahwa Anda telah **{{ strtoupper($data['status']) }}** sebagai penerima **Bantuan Sosial** dengan rincian sebagai berikut:

@component('mail::panel')
**Status:** {{ strtoupper($data['status']) }}
<br>
**Jenis Bantuan:** {{ $data['jenis_bantuan'] }}
<br>
@if ($data['status'] == 'diterima')
**Tanggal Pengambilan:** {{ \Carbon\Carbon::parse($data['tanggal_pengambilan'])->format('d/m/Y') }}
@endif
@endcomponent


@if ($data['status'] == 'diterima')    
Kami ucapkan selamat! Semoga bantuan ini bermanfaat bagi Anda.
@endif

Jika ada pertanyaan lebih lanjut, silakan hubungi petugas kami melalui kontak resmi.

Terima kasih,  
**Dinas Sosial**  
{{ config('app.name') }}
@endcomponent
