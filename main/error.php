<?php
include 'dbConfig.php';
include 'feedback.php';


$curl = curl_init($URL);
curl_setopt($curl, CURLOPT_NOBODY, true);
$result = curl_exec($curl);
  
if ($result !== false) {
      
    
    $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE); 
    
    if (($statusCode == 404) || ($statusCode == 500)){
        $sql = "INSERT into error_report VALUES ('$user_id',current_timestamp(),'$statusCode',$URL)";;
    }
}

   
?>