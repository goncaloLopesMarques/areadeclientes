<?php

namespace App\Http\Controllers;

// use App\Order;
use App\Mail\FormularioContacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;


class SendMailController extends Controller
{
    /**
     *
     * @param  Request  $request
     * @return Response
     *
     */


    public function enviarFormularioContactos(Request $request)
    {
        // $order = Order::findOrFail($orderId);


        Mail::to($request->input('email'))->send(new FormularioContacto($request));


        return view('pages.contactos');
    }
}