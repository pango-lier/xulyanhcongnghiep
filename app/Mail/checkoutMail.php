<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class checkoutMail extends Mailable
{
    use Queueable, SerializesModels;
    public $customer,$bill,$cartInfor;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customer,$bill,$cartInfor)
    {
            $this->customer=$customer;
            $this->bill=$bill;
            $this->cartInfor=$cartInfor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Checkout from Xulyanhcongnghiep.com')->view('mail.checkout');
    }
}
