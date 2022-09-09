<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreateProject extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $name_project;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $name_project)
    {
        $this->name = $name;
        $this->name_project = $name_project;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('uniontask@outlook.es', 'UNION TASK')
        ->subject('Tu proyecto ha sido creado')
        ->view('mails.create_project')->with([
            'name' => $this->name,
            'name_project' => $this->name_project,
        ]);
    }
}
