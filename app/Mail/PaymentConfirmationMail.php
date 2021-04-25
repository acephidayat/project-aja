<?php

namespace App\Mail;

use App\Models\Carts;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $Carts;
    public $orderNumber;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Carts, $orderNumber)
    {
        $this->carts = $Carts ;
        $this->orderNumber = $orderNumber ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.payment_confirmation',[
            'carts'=> $this->Carts,
            'orderNumber ' => $this->orderNumber

        ]);
    }
}
