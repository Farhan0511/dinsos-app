<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OtpVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $nama;
    public $email;
    public $otp;

    public function __construct($nama, $email, $otp)
    {
        $this->nama = $nama;
        $this->email = $email;
        $this->otp = $otp;
    }

    public function build()
    {
        return $this->subject('Verifikasi Akun')
                    ->markdown('emails.verification')
                    ->with('data', [
                        'nama' => $this->nama,
                        'email' => $this->email,
                        'otp' => $this->otp,
                    ]);
    }
}
