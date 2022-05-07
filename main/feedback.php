<!DOCTYPE html>    
<html>    
<head>    
<meta name="viewport" content="width=device-width, initial-scale=1">    
<style>    
* {    
  box-sizing: border-box;    
}    
    
input[type=text], select, textarea {    
  width: 100%;    
  padding: 12px;    
  border: 1px solid rgb(70, 68, 68);    
  border-radius: 4px;    
  resize: vertical;    
}    

    
label {    
  padding: 12px 12px 12px 0;    
  display: inline-block;    
}    
    
input[type=submit] {    
  background-color: rgb(37, 116, 161);    
  color: white;    
  padding: 12px 20px;    
  border: none;    
  border-radius: 4px;    
  cursor: pointer;    
  float: right;    
}    
    
input[type=submit]:hover {    
  background-color: #45a049;    
}    
    
.container {    
  border-radius: 5px;    
  background-color: #f2f2f2;    
  padding: 20px;    
}    
    
.col-25 {    
  float: left;    
  width: 25%;    
  margin-top: 6px;    
}    
    
.col-75 {    
  float: left;    
  width: 75%;    
  margin-top: 6px;    
}    
    
  
.row:after {    
  content: "";    
  display: table;    
  clear: both;    
}    
    

</style>    
</head>    
<body>    
<h2>FEED BACK FORM</h2>    
<div class="container">    
  <form action="./feedback.php" method="post" enctype="multipart/form-data">    
      
          
         
    
       
    <div class="row">    
      <div class="col-25">    
        <label for="country">COUNTRY</label>    
      </div>    
      <div class="col-75">    
        <select id="country" name="country">    
            <option value="none">Select Country</option>    
          <option value="australia">Australia</option>    
          <option value="canada">Canada</option>    
          <option value="usa">USA</option>    
          <option value="russia">Russia</option>    
          <option value="japan">Japan</option>    
          <option value="india">India</option>    
          <option value="china">China</option>    
        </select>    
      </div>    
    </div>   
    <div class="col-25">    
        <label for="subject">SUBJECT</label>    
      </div>  
    <div class="col-75">    
        <input type="text" id="subject" name="subject" placeholder="TYPE SUBJECT HERE...">    
      </div>    
    </div>   
    <div class="row">    
      <div class="col-25">    
        <label for="feed_back">FEEDBACK</label>    
      </div>    
      <div class="col-75">    
        <textarea id="feed_back" name="FEEDBACK" placeholder="Write something.." style="height:200px"></textarea>    
      </div>    
    </div>    
    <div class="row">    
      <input type="submit" name="sub" value="Upload">    
    </div>    
  </form>    
</div>    
    
</body>    
</html> 

<?php
include 'conn.php';
include 'browser.php';


function random_strings($length_of_string)
{
  
    
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
  
    
    return substr(str_shuffle($str_result), 
                       0, $length_of_string);
}

if (isset($_POST['sub'])) { 
     
    $user_id = random_strings(10); 
    $browser = $ua['name']; 
    $version = $ua['version']; 
    $os = $ua['platform']; 
    $URL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
                "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . 
                $_SERVER['REQUEST_URI'];
    $urgent = 1;

    if (isset($_POST['sub'])) {
        $sub    = $_POST['subject'];
        $feedback   = $_POST['FEEDBACK'];

        $sql = " INSERT into details VALUES (12,NOW(),'$user_id','$sub','$feedback','$browser','$version','$os','$URL');
        INSERT into notify (Subject,Urgent) VALUES ('$sub','$urgent');";
        
        try{
        $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}


       
                   
    }
    

    
    
    
} 
?>
 