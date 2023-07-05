<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvioEmailController extends Controller
{
    public function inviaEmail(Request $request)
    {
        $destinatario = $request->input('email');
        $contenuto = $request->input('contenuto');

        // Invia l'email utilizzando la classe Mail di Laravel
        Mail::raw($contenuto, function ($message) use ($destinatario) {
            $message->to('danesh.shahpouri@gmail.com')
                ->subject('Nuovo messaggio da ' . $destinatario)
                ->replyTo($destinatario);
        });



        // Puoi restituire una risposta o un redirect dopo l'invio dell'email
        return response()->json(['success' => true]);
    }
}
