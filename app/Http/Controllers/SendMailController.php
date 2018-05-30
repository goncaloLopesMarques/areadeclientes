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

       // dd($request->input('email'));
       try{
        $result = Mail::to($request->input('email'))->send(new FormularioContacto($request));
       
        return view('pages.contactos')->with('Success',"Email enviado com sucesso");

        //Mail::to($request->user())->send(new FormularioContacto($request));
       }catch(Exception $e){
        dd($e);
        return view('pages.contactos')->with('Message',"Erro ao enviar o email, por favor contacte-nos por telefone");
        
       }
    }
}