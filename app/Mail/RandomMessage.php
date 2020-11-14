<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RandomMessage extends Mailable
{
    use Queueable, SerializesModels;

    //public $subject = "Mensaje de prueba";
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //automaticamente el atributo data al ser publico va a poder ser accesado desde la vista
        // podemos pasar el subject desde el atributo $subject o directamente como $this->subject('asunto del correo')->view('vista')
        // la vista debe contener el css en linea no se puden aplicar no se pueden poner referencias a externos
        // En producción podemos utilizar SendGrid como proveedor de correos, cuanta gratis con 100 correaos al mes, buscar e innstalar librerias y driver para laravel git hub

        return $this->from('empresarial@laravel.com', 'App Laravel')
                    ->subject('Prueba técnica Laravel Mail')
                    ->view('emails.random-message');
        //return $this->view('emails.random-message');
    }
}
