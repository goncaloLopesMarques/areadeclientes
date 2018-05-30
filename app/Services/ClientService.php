<?php

namespace App\Services;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;
use App\Black_List;
use App\Exclusion_List;
use App\Change_List;

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

    public static function AlterarDados($clientId, $data,$clientEmail,$id){
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
       
         if($result =(new self)->SuiteCrmRequester('set_entry',$entryArgs)){
            $change_list = new Change_List;
            $change_list->idUser = $id;
            $change_list->email = $clientEmail;
            $change_list->save();
          }
         (new self)->SuiteCrmRequester('logout',$sessId);

      }

    public static function PedirExclusao($clientId,$clientEmail,$id){
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
          if($result =(new self)->SuiteCrmRequester('set_entry',$entryArgs)){
            $exclude_list = new Exclusion_List;
            $exclude_list->idUser = $id;
            $exclude_list->email = $clientEmail;
            $exclude_list->save();
          }
          (new self)->SuiteCrmRequester('logout',$sessId);
      }
      public static function PedirRemocao($clientId,$clientEmail,$id){
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
        
          
          if($result =(new self)->SuiteCrmRequester('set_entry',$entryArgs)){
            $black_list = new Black_List;
            $black_list->idUser = $id;
            $black_list->email = $clientEmail;
            $black_list->save();
          }
          (new self)->SuiteCrmRequester('logout',$sessId);
      }

      private function Login(){
        global $sessId;
             
          //  $userAuth = array(
          //    'user_name' => 'user',
          //    'password' => md5('user DigitalInput1'),
          // );

          $userAuth = array(
             'user_name' => 'miguelApi',
             'password' => md5('hmcVye'),
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

      public function validateEmail($email){
        //esta variavel contem todos os emails, o resultado d afiltagrem do objecto devolvido pelo crm  
        $allEmails = array();
        //esta variavel serve para guardar o valor do string compare
        $comparacao;
        //esta função vai buscar um objecto com toda a informação dos contactos
        $allData = (new self)->RetreaveAllEmails();
        //variavel para retornar ao controlador
        $result =0;
        //depois de ter todos os emails comparamos com o email fornecido pelo utilizador
        //Se der match devolve 1
        //se nao encontrar devolve 0
        for ($i = 0; $i <= $allData["total_count"] -1; $i++) {
          array_push($allEmails,$allData["entry_list"][$i]["name_value_list"]["email1"]["value"]);
        }

          for($j = 0; $j <= count($allEmails)-1 ; $j++){
            //string compare
            //0 - if the two strings are equal
            //<0 - if string1 is less than string2
            //>0 - if string1 is greater than string2
            $comparacao = strcmp($email,$allEmails[$j]);

            if($comparacao == 0){
              $id = $allData["entry_list"][$j]["id"]; 
              $result = 1;
              return array($result,$id);
            }
          }
          
          return $result;
      }


      public function RetreaveAllEmails(){

        $sessId = (new self)->Login();

        $entryArgs = array(
          //Session id - retrieved from login call
           'session' => $sessId,
          //Module to get_entry_list for
           'module_name' => 'Contacts',
          //Filter query - Added to the SQL where clause,
           'query' => "",
          //Order by - unused
           'order_by' => '',
          //Start with the first record
           'offset' => 0,
          //Return the id and name fields
           'select_fields' => array('email1'),
          //Link to the "contacts" relationship and retrieve the
          //First and last names.
          //Show 10 max results
               'max_results' => '',
          //Do not show deleted
               'deleted' => 0,
          );

        $result = (new self)->SuiteCrmRequester('get_entry_list',$entryArgs);

        return $result;
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
             //var_dump($result);

             if(count($result["entry_list"][0]["name_value_list"]) == 2){
               // se nao se conseguir ir buscar dados retornamos um 0 para ser tratado no clientController
              return 0;
             }else{
              $resultArray = array($result["entry_list"][0]["name_value_list"]["first_name"]["value"],$result["entry_list"][0]["name_value_list"]["last_name"]["value"],
              $result["entry_list"][0]["name_value_list"]["phone_mobile"]["value"],$result["entry_list"][0]["name_value_list"]["phone_work"]["value"],
              $result["entry_list"][0]["name_value_list"]["email1"]["value"],$result["entry_list"][0]["name_value_list"]["primary_address_street"]["value"],
              $result["entry_list"][0]["name_value_list"]["invalid_email"]["value"],$result["entry_list"][0]["name_value_list"]["email_opt_out"]["value"]);
               return $resultArray;
             }
     }


}
?>