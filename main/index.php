<?php
include 'dbConfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $session = session_id(); 
    $user_id = isset($user_id) ? $user_id : 0; 
    
    $URL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
                "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . 
                $_SERVER['REQUEST_URI'];

    if (isset($_POST['sub'])) {
        $sub    = $_POST['subject'];
        $feedback   = $_POST['FEEDBACK'];
        $browser = isset($_POST['browser']) ? $_POST['browser'] : ''; 
        $version = isset($_POST['version']) ? $_POST['version'] : ''; 
        $os = isset($_POST['os']) ? $_POST['os'] : '';

        $sql = "INSERT into details VALUES (ID,time,user_id,subject,feedback,browser,version,os,url) (12,NOW(),'$user_id','$sub','$feedback','$browser','$version','$os','$URL')";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
                   
    }
    
    
    

} 
?>
 
