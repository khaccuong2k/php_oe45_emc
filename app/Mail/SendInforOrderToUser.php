<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendInforOrderToUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Data order from user
     */
    public $data;

    /**
     * Email user order
     */
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $email)
    {
        $this->data = $data;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("$this->email")
           ->view('admin.mail.new-order')
           ->subject('Notification Infor Order');
    }
}
