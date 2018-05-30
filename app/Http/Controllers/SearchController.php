<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Welcome;
use App\User;
use GuzzleHttp\Client;
use App\Services\ClientService;


$sessId="";
$clientData="";

class SearchController extends Controller
{
    public function index(){
        return view('pages.searchPage');
    }

    public function pesquisar(Request $request, ClientService $service){
        $sessId = $service->SearchEmail();
        dd($sessId);
    }
}