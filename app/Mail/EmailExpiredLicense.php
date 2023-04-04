<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailExpiredLicense extends Mailable
{
    use Queueable, SerializesModels;

    public $license;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($license)
    {
        $this->license = $license;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('🔔 Notice: SRPA license status')
            ->view('emails.expired-license');
    }
}
