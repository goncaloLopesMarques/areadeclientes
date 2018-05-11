<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    private function suiteCrmRequester($method, $arguments){
        $url = "https://www.crmcheeruptravelgroup.com/service/v4_1/rest.php";
    
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $post = array(
                "method" => $method,
                "input_type" => "JSON",
                "response_type" => "JSON",
                "rest_data" => json_encode($arguments),
        );
       
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
       
        $result = curl_exec($curl);
        curl_close($curl);
        return json_decode($result,1);
    }
    public static function pedirExclusao(){
        $clientId = Auth::user()->idCrm;
        $sessId = (new self)->login();

         $entryArgs = array(
          //Session id - retrieved from login call
             'session' => $sessId,
          //Module to get_entry_list for
             'module_name' => 'Contacts',
          //First and last names.
             'name_value_list' => array(
              array("name" => "id", "value" => "$clientId"),
              array("name" => "email_opt_out", "value" => 0),
           ),  
            //Show 10 max results
                   'max_results' => 10,
            //Do not show deleted
                   'deleted' => 0,
          );
        
          $result =(new self)->suiteCrmRequester('set_entry',$entryArgs);
   
        var_dump($result);
         //["entry_list"][0]["name_value_list"]["name"] 
      }
    private function login(){
      global $sessId;
           
         $userAuth = array(
           'user_name' => 'user',
           'password' => md5('user DigitalInput1'),
        );
       
        $appName = 'Client Area SuiteCrm';
        $nameValueList = array();
    
           $args = array(
            'user_auth' => $userAuth,
            'application_name' => $appName,
            'name_value_list' => $nameValueList);
    
            $result = (new self)->suiteCrmRequester('login',$args);
            $sessId = $result['id'];
            //var_dump($sessId);

    
    
     return $sessId;
    }

     private function getSuiteCrmData(){
        global $sessId;
        $clientId = Auth::user()->idCrm;
      
        $sessId = (new self)->login();

        $entryArgs = array(
            //Session id - retrieved from login call
               'session' => $sessId,
            //Module to get_entry_list for
               'module_name' => 'Contacts',
            //Filter query - Added to the SQL where clause,
               'id' => $clientId,
            //Order by - unused
               'order_by' => '',
            //Start with the first record
               'offset' => 0,
              //Show 10 max results
                     'max_results' => 10,
              //Do not show deleted
                     'deleted' => 0,
            );
            $result = (new self)->suiteCrmRequester('get_entry',$entryArgs);
            (new self)->suiteCrmRequester('logout',$sessId);
             var_dump($result);
            /*
           var_dump($result["entry_list"][0]["name_value_list"]["first_name"]["value"]);
           var_dump($result["entry_list"][0]["name_value_list"]["last_name"]["value"]);
           var_dump($result["entry_list"][0]["name_value_list"]["phone_mobile"]["value"]);
           var_dump($result["entry_list"][0]["name_value_list"]["phone_work"]["value"]);
           var_dump($result["entry_list"][0]["name_value_list"]["email1"]["value"]);
           */
          $resultArray = array($result["entry_list"][0]["name_value_list"]["first_name"]["value"],$result["entry_list"][0]["name_value_list"]["last_name"]["value"],
                               $result["entry_list"][0]["name_value_list"]["phone_mobile"]["value"],$result["entry_list"][0]["name_value_list"]["phone_work"]["value"],
                               $result["entry_list"][0]["name_value_list"]["email1"]["value"],$result["entry_list"][0]["name_value_list"]["primary_address_street"]["value"]);
          return $resultArray;
     }
    public function index()
    {
        global $sessId;
        $result = (new self)->getSuiteCrmData();
        
       
        return view('clientHome')->with('result',$result);
    }

}