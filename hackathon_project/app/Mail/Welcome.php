<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Welcome extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $email;
    protected $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('uniontask@outlook.es', 'UNION TASK')
        ->subject('Bienvenido')
        ->view('mails.welcome')->with([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);
    }
}
