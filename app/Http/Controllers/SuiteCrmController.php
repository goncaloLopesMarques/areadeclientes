<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

$sessId="";

class SuiteCrm extends Controller
{
 
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

 private function login(){
  global $sessId;
  global $clientId;
       
     $userAuth = array(
       'user_name' => 'apiUser',
       'password' => md5('V4wODw'),
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
       // echo $sessId;


        return $sessId;
 }
 public static function getSuiteCrmData($client_Id){
    global $sessId;
  
    $sessId = (new self)->login();
    var_dump($sessId);
    $entryArgs = array(
        //Session id - retrieved from login call
           'session' => $sessId,
        //Module to get_entry_list for
           'module_name' => 'Contacts',
        //Filter query - Added to the SQL where clause,
           'query' => "contacts.id = $clientId",
        //Order by - unused
           'order_by' => '',
        //Start with the first record
           'offset' => 0,
        //Return the id and name fields
        'select_fields' => array('id','name','phone_work'),
        //Link to the "contacts" relationship and retrieve the
        //First and last names.
           'link_name_to_fields_array' => array(
               array(
                       'name' => 'contacts',
                               'value' => array(
                               'first_name',
                               'last_name',
                       ),
               ),
       ),
          //Show 10 max results
                 'max_results' => 10,
          //Do not show deleted
                 'deleted' => 0,
        );
        $result = (new self)->suiteCrmRequester('get_entry_list',$entryArgs);
        (new self)->suiteCrmRequester('logout',$sessId);
       var_dump($result);
      
 }
}
