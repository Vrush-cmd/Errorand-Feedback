<?php include "conn.php";
$sql = "SELECT * FROM notify";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
 <head>
 <title>FEEDBACK DATA</title>
 </head>
<body>
<?php
if ($result->rowCount()  > 0){
?>
  <table>
  
  <tr>
    
    <td>SUBJECT</td>
    <td>URGENCY</td>
    <td>READ</td>
    <td>UNREAD</td>
    <td>ARCHIVE</td>
   

  </tr>
<?php
$i=0;
while($row = $result->fetch(PDO::FETCH_ASSOC)) {
?>
<tr>
    
    <td><?php echo $row["Subject"]; ?></td>
    <td><?php echo $row["Urgent"]; ?></td>
    <td><?php echo $row["READ"]; ?></td>
    <td><?php echo $row["UNREAD"]; ?></td>
    <td><?php echo $row["ARCHIVE"]; ?></td>
    

</tr>
<?php
$i++;
}
?>
</table>
 <?php
}
else{
    echo "No result found";
}
?>
<style>
table {
    font-family: arial, sans-serif;
    color: white;
    font-weight: 900;
    border-collapse: collapse;
    width: 100%;
    
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;

}

tr {
    background-color: #660099;
}
</style>
 </body>
</html>