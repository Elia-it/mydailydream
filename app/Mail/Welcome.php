<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;

class Welcome extends Mailable
{
    use Queueable, SerializesModels;


    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        //

        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('emails/welcome');
        return $this->from('staff@mydailydreams', 'My Daily Dreams Staff')
            ->subject('Registration confirmed')
            ->markdown('emails.welcome');
            // ->with([
            //     'name' => 'New Mailtrap User',
            //     'link' => 'https://mailtrap.io/inboxes'
            // ]);
    }
}
