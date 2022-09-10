<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JoinProjectAdmin extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $name_project;
    protected $why;
    protected $share;
    protected $experience;
    protected $user_email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $name_project, $why, $share, $experience, $user_email)
    {
        $this->name = $name;
        $this->name_project = $name_project;
        $this->why = $why;
        $this->share = $share;
        $this->experience = $experience;
        $this->user_email = $user_email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('uniontask@singuland.org', 'UNION TASK')
        ->subject('Nueva solicitud para unirse a tu proyecto')
        ->view('mails.join_project_admin')->with([
            'name' => $this->name,
            'name_project' => $this->name_project,
            'why' => $this->why,
            'share' => $this->share,
            'experience' => $this->experience,
            'user_email' => $this->user_email,
        ]);
    }
}
