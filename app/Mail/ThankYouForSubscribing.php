<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class ThankYouForSubscribing extends Mailable
{
    use Queueable, SerializesModels;



    public $mailData;



    /**

     * Create a new message instance.

     *

     * @return void

     */

    public function __construct()
    {

    }



    /**

     * Build the message.

     *

     * @return $this

     */

    public function build()
    {
        return $this->subject('Cảm ơn bạn đã đăng ký nhận bản tin!')
                    ->view('emails.thankyou');
    }
}
