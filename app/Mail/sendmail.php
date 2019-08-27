<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendmail extends Mailable
{
    use Queueable, SerializesModels;

    protected  $infos;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($infos)
    {
        $this->infos  =  $infos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('jatin@mail.com')->subject( 'Welcome! mail' )
        ->view('mail')->with($this->infos);
    }
}
