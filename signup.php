<?php
  
 // if the signup button was clicked
if (isset($_POST['signup-sub'])) 
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
header("Location: ../signup.php?signup=emptyfields");
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
//mysqli_close($conn);

?>
<!DOCTYPE>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="signup.css" media="screen">
</head>
<body>

<section class="h-100 h-custom" style="background-color: #8fc4b7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card rounded-3">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp" class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="Sample photo">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Info</h3>

            <form class="px-md-2">
  <!-- <form action="signup.php" method="post" class="px-md-2" role="form"> -->
<div class="form-outline mb-4">
                <input type="Name" name="Name" id="form3Example1q" class="form-control" />
                <label class="form-label" for="form3Example1q">Имя</label>
              </div>
<div class="form-outline mb-4">
                <input type="Surname" name="Surname" id="form3Example1q" class="form-control" />
                <label class="form-label" for="form3Example1q">Фамилия</label>
              </div>
<div class="form-outline mb-4">
                <input type="address" name="address" id="form3Example1q" class="form-control" />
                <label class="form-label" for="form3Example1q">Адрес</label>
              </div>
<div class="form-outline mb-4">
                <input type="password" name="password" id="form3Example1q" class="form-control" />
                <label class="form-label" for="form3Example1q">Пароль</label>
              </div>
<div class="form-outline mb-4">
                <input type="text" name="mail" id="form3Example1q" class="form-control" />
                <label class="form-label" for="form3Example1q">Почта</label>
              </div>
<div class="form-outline mb-4">
                <input type="phonenum" name="phonenum" id="form3Example1q" class="form-control" />
                <label class="form-label" for="form3Example1q">Номер телефона</label>
              </div>

<div class="form-group form-group-sm">
<button class="btn btn-lg btn-primary btn-block signup-btn" type="submit" name="signup-sub">Sign up!</button><br>
</div><br>
</form>
</div>
</div>
</div>
</div>
</div>
</section>
</body>
</html>

<?php
// checking  empty fields
 $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($fullUrl, "signup=emptyfields") == true)
{
echo "<p class='error'>You did nit fill in all fields!</p>";
exit();
}
  ?>
