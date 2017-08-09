<?php

namespace MyEscrow\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use MyEscrow\SellCoin;

class transactionEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void

     */
    public $sellcoin;

    public function __construct(SellCoin $sellcoin)
    {
        $this->sellcoin = $sellcoin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.transactionEmail');
    }
}
