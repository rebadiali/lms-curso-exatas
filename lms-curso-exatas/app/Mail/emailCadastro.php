<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class emailCadastro extends Mailable
{
    use Queueable, SerializesModels;
	
	 protected  $usuario, $senha, $confirm;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario,$senha,$confirm)
    {
        $this->usuario = $usuario;
		$this->senha = $senha;
		$this->confirm = $confirm;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emailcadastro')
					->with([
                        'profNome' => $this->usuario,
                        'profSenha' => $this->senha,
						'profConfirm' => $this->confirm,
                    ]);
	}
}
