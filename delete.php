<?php
 // connection with db
include 'dbconn.php';
 error_reporting(0);
// “delete” is clicked
$id=$_GET['rn'];
$query = "DELETE FROM catalog WHERE id ='$id'";
$data = mysqli_query($conn, $query);
if ($data) 
{
// output message about success
echo "<center><font color ='green'>Record was deleted</center>";
}
else
{
// output message about fail
echo "<font color ='red'>Operation was failed";
}
?>
