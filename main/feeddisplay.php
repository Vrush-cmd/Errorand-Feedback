<?php
include 'conn.php';
$sql = "SELECT time, subject, feedback, url FROM details";
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
    <td>Time</td>
    <td>SUBJECT</td>
    <td>Feedback</td>
    <td>URL</td>
  </tr>
<?php
$i=0;
while($row = $result->fetch(PDO::FETCH_ASSOC)) {
?>
<tr>
    <td><?php echo $row["time"]; ?></td>
    <td><?php echo $row["subject"]; ?></td>
    <td><?php echo $row["feedback"]; ?></td>
    <td><?php echo $row["url"]; ?></td>
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