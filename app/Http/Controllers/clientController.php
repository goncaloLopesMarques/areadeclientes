<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ClientService;
use Auth;

$sessId="";

class clientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(ClientService $service)
    {
        
        $clientId = Auth::user()->idCrm;
        $result = $service->getSuiteCrmData($clientId);

       
        return view('clientHome')->with('result',$result);
    }

    public function exclusao(ClientService $service){

        $clientId = Auth::user()->idCrm;
        $result = $service->pedirExclusao($clientId); 
        return redirect('clientHome');
    }


}