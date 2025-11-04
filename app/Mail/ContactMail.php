<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Pesan dari Form Kontak - Portfolio Website')
            ->html("
                <h2 style='margin-bottom: 10px;'>Pesan Baru dari Form Kontak</h2>
                <p><strong>Nama:</strong> {$this->data['name']}</p>
                <p><strong>Email:</strong> {$this->data['email']}</p>
                <p><strong>Pesan:</strong></p>
                <p>{$this->data['message']}</p>
            ");
    }
}
