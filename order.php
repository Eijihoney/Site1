<?php
  
 // if the signup button was clicked
if (isset($_POST['order-sub'])) 
{
// record users' information, and inputting information will be added to DB 
include ("dbconn.php"); 
$username = $_POST['Name'];     
$surname = $_POST['Surname']; 
$address = $_POST['address'];     
$password = $_POST['password'];   
$mail = $_POST['mail']; 
$phonenum = $_POST['phonenum'];  

// checking all empty fields – presence check
if (empty($username) || empty($mail) || empty($password) || empty($surname) || empty($address) || empty($phonenum)) 
{ 
header("Location: ../order.php?signup=emptyfields");
  exit();
}
// checking the validate data
elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL))
{
$emailErr = "Invalid email format";
echo '<div class="container" style="text-align: center;">
<h1>e-mail is an invalid</h1></div>';
exit();
           }
// If all the data are entered, and there is no error, save all the data to the database
$add = "INSERT INTO users (Name, Surname, address, password, mail, phonenum) VALUES ('$username', '$surname', '$address', '$password','$mail','$phonenum')";
 // checking the succession process
 if (mysqli_query($conn, $add))
 { 
echo '<div class="container" style="text-align: center;">
<h1>You have been signed in!</h1>
</div>';  
exit();
 }
 // checking existing data
elseif ($_POST['phonenum']  == $phonenum || $_POST['mail']  == $mail)
{
echo '<div class="container" style="text-align: center;">
<h1>Phone number or email already exists</h1></div>';
exit();
}
}

// connection closes
mysqli_close($conn);

?>

 <form action="order.php" method="post" accept-charset="utf-8" class="form" role="form">   <legend>Sign Up</legend>
<h4>It's free and always will be.</h4>
<div class="row">
<div class="col-xs-6 col-md-6">
<input type="text" name="Name" class="form-control input-lg" maxlength="30" placeholder="First Name"  /></div>
<div class="col-xs-6 col-md-6">
<input type="text" name="Surname" class="form-control input-lg" maxlength="30" placeholder="Last Name"  /></div>
</div><br>
<input type="address" name="address" class="form-control input-lg" maxlength="50" placeholder="Your Address"/><br>
<input type="password" name="password" class="form-control input-lg" maxlength="30" placeholder="Password"/><br>
<input type="text" class="form-control input-lg" name="mail" maxlength="30" placeholder="Email"><br>
<input type="phonenum" class="form-control input-lg" name="phonenum" maxlength="11" placeholder="Phone number"><br>
<div class="form-group form-group-sm">
<button class="btn btn-lg btn-primary btn-block signup-btn" type="submit" name="signup-sub">Sign up!</button><br>
</div><br>
</form>
<?php
// checking  empty fields
 $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($fullUrl, "signup=emptyfields") == true)
{
echo "<p class='error'>You did nit fill in all fields!</p>";
exit();
}
  ?>
