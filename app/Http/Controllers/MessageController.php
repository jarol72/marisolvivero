<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;

class MessageController extends Controller
{
    public function store()
    {
        
        // Valida los datos enviados con el formulario
        $msg = request()->validate([
             'name' => 'required',
             'email' => 'required|email',
             'subject' => 'required',
             'message' => 'required|min:3'
        ]);

        //Enviamos el correo electrónico
        Mail::to('pruebascorreo.jarol72@gmail.com')->queue(new MessageReceived($msg));

        return back()->with('status', 'Recibimos tu mensaje, te responderemos en menos de 24 horas.');
        
    }
}
