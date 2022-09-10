<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JoinProyect extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $name_project;
    protected $why;
    protected $share;
    protected $experience;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $name_project, $why, $share, $experience)
    {
        $this->name = $name;
        $this->name_project = $name_project;
        $this->why = $why;
        $this->share = $share;
        $this->experience = $experience;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('uniontask@singuland.org', 'UNION TASK')
        ->subject('Solicitud de inscripción a un proyecto')
        ->view('mails.join_project')->with([
            'name' => $this->name,
            'name_project' => $this->name_project,
            'why' => $this->why,
            'share' => $this->share,
            'experience' => $this->experience,
        ]);
    }
}
