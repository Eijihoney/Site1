<?php
  
 // if the signup button was clicked
if (isset($_POST['recaptchaResponse'])) 
{
// record users' information, and inputting information will be added to DB 
include ("dbconn.php"); 
$username = $_POST['Name'];           
$mail = $_POST['mail']; 
$msg = $_POST['msg'];  


// If all the data are entered, and there is no error, save all the data to the database
$add = "INSERT INTO contacts (mail, Name, msg) VALUES ('$mail', '$username', '$msg')";
 // checking the succession process
 if (mysqli_query($conn, $add))
 { 
echo '<div class="container" style="text-align: center;">
<h1>You have been signed in!</h1>
</div>';  
exit();
 }
 // checking existing data
else
{
echo '<div class="container" style="text-align: center;">
<h1>error</h1></div>';
exit();
}
}

// connection closes
//mysqli_close($conn);

?>
