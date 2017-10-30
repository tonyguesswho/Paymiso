<?php

namespace MyEscrow\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use MyEscrow\MarketPlace;

class marketPlaceEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $marketplace_mail;
    public function __construct(MarketPlace $marketplace_mail)
    {
        $this->marketplace_mail = $marketplace_mail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.marketplace');
    }
}
