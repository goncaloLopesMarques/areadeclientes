<?php

namespace App\Services;
use Illuminate\Http\Request;
use Auth;

$sessId="";

class clientService {

    private function SuiteCrmRequester($method, $arguments){
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

    public static function AlterarDados($clientId, $data){
        $sessId = (new self)->Login();

        $entryArgs = array(
         //Session id - retrieved from login call
            'session' => $sessId,
         //Module to get_entry_list for
            'module_name' => 'Contacts',
         //First and last names.
            'name_value_list' => array(
             array("name" => "id", "value" => "$clientId"),
             array("name" => "first_name", "value" => $data[0]),
             array("name" => "last_name", "value" => $data[1]),
             array("name" => "email1", "value" => $data[2]),
             array("name" => "phone_mobile", "value" => $data[3]),
             array("name" => "phone_work", "value" => $data[4]),
             array("name" => "primary_address_street", "value" => $data[5]),
          ),  
           //Show 10 max results
                  'max_results' => 10,
           //Do not show deleted
                  'deleted' => 0,
         );
       
         $result =(new self)->SuiteCrmRequester('set_entry',$entryArgs);
         (new self)->SuiteCrmRequester('logout',$sessId);

      }

    public static function PedirExclusao($clientId){
        $sessId = (new self)->Login();

         $entryArgs = array(
          //Session id - retrieved from login call
             'session' => $sessId,
          //Module to get_entry_list for
             'module_name' => 'Contacts',
          //First and last names.
             'name_value_list' => array(
              array("name" => "id", "value" => "$clientId"),
              array("name" => "email_opt_out", "value" => 1),
           ),  
            //Show 10 max results
                   'max_results' => 10,
            //Do not show deleted
                   'deleted' => 0,
          );
        
          $result =(new self)->SuiteCrmRequester('set_entry',$entryArgs);
          (new self)->SuiteCrmRequester('logout',$sessId);
      }
      public static function PedirRemocao($clientId){
        $sessId = (new self)->Login();

         $entryArgs = array(
          //Session id - retrieved from login call
             'session' => $sessId,
          //Module to get_entry_list for
             'module_name' => 'Contacts',
          //First and last names.
             'name_value_list' => array(
              array("name" => "id", "value" => "$clientId"),
              array("name" => "invalid_email", "value" => 1),
           ),  
            //Show 10 max results
                   'max_results' => 10,
            //Do not show deleted
                   'deleted' => 0,
          );
        
          $result =(new self)->SuiteCrmRequester('set_entry',$entryArgs);
          (new self)->SuiteCrmRequester('logout',$sessId);
      }

      private function Login(){
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

      public function GetSuiteCrmData($clientId){
        global $sessId;
      
        $sessId = (new self)->Login();

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
            $result = (new self)->SuiteCrmRequester('get_entry',$entryArgs);
            (new self)->SuiteCrmRequester('logout',$sessId);
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
                               $result["entry_list"][0]["name_value_list"]["email1"]["value"],$result["entry_list"][0]["name_value_list"]["primary_address_street"]["value"],
                               $result["entry_list"][0]["name_value_list"]["invalid_email"]["value"],$result["entry_list"][0]["name_value_list"]["email_opt_out"]["value"]);
          return $resultArray;
     }


}
?>