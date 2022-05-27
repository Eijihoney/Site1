
  <style>
    html {
  height: 100%;
}
body {
  margin:0;
  padding:0;
  font-family: sans-serif;
  background: linear-gradient(#141e30, #243b55);
}

.login-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: rgba(0,0,0,.5);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
}

.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.login-box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #03e9f4;
  font-size: 12px;
}

.login-box form a button {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: #03e9f4;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 4px
}

.login-box button:hover {
  background: #03e9f4;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #03e9f4,
              0 0 25px #03e9f4,
              0 0 50px #03e9f4,
              0 0 100px #03e9f4;
}

.login-box span{
  position: absolute;
  display: block;
}

.login-box span :nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #03e9f4);
  animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }
  50%,100% {
    left: 100%;
  }
}

.login-box span :nth-child(2) {
  top: -100%;
  right: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(180deg, transparent, #03e9f4);
  animation: btn-anim2 1s linear infinite;
  animation-delay: .25s
}

@keyframes btn-anim2 {
  0% {
    top: -100%;
  }
  50%,100% {
    top: 100%;
  }
}

.login-box span :nth-child(3) {
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(270deg, transparent, #03e9f4);
  animation: btn-anim3 1s linear infinite;
  animation-delay: .5s
}

@keyframes btn-anim3 {
  0% {
    right: -100%;
  }
  50%,100% {
    right: 100%;
  }
}

.login-box span :nth-child(4) {
  bottom: -100%;
  left: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(360deg, transparent, #03e9f4);
  animation: btn-anim4 1s linear infinite;
  animation-delay: .75s
}

@keyframes btn-anim4 {
  0% {
    bottom: -100%;
  }
  50%,100% {
    bottom: 100%;
  }
}
  </style>

<body>

<div class="login-box">
  <h2>Заказ</h2>
  <form action="paymentform.php" method="post" accept-charset="utf-8" class="form" role="form">
    <div class="user-box">
      <input type="Name" name="Name" required="">
      <label>Имя</label>
    </div>
    <div class="user-box">
      <input type="Surname" name="Surname" required="">
       <label>Фамилия</label>
      <div class="user-box">
      <input type="address" name="address" required="">
       <label>Адрес</label>
     </div>

      <div class="user-box">
      <input ype="text" name="mail" required="">
       <label>Почта</label></div>
      <div class="user-box">
      <input type="phonenum" name="phonenum" required="">
      <label>Номер телефона</label>
    </div> 
    <a href="#" >
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit" name="signup-sub">Оплатить</button><br>
    </a>
 </div>
</form>
</div>
</body>

<?php
  
 // if the signup button was clicked
if (isset($_POST['signup-sub'])) 
{
// record users' information, and inputting information will be added to DB 
include ("dbconn.php"); 
$username = $_POST['Name'];     
$surname = $_POST['Surname']; 
$address = $_POST['address'];       
$mail = $_POST['mail']; 
$phonenum = $_POST['phonenum'];  

// checking all empty fields – presence check
if (empty($username) || empty($mail) || empty($surname) || empty($address) || empty($phonenum)) 
{ 
header("Location: paymentform.php?signup=emptyfields");
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
$add = "INSERT INTO users (Name, Surname, address, mail, phonenum) VALUES ('$username', '$surname', '$address','$mail','$phonenum')";
 // checking the succession process
 if (mysqli_query($conn, $add))
 { 

  echo '<div class="py-12 h-screen bg-gray-300">
  <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-md">
  <div class="md:flex">
      <div class="w-full p-3 py-10">
        
        <div class="flex justify-center">

          <img src="https://i.imgur.com/QOi7Nie.png" width="80">
          
        </div>

        <div class="flex justify-center mt-3">

          <span class="text-xl font-medium">I want to give advice</span>
          
        </div>

         <p class="px-16 text-center text-gray-400">Connect with people who have financial planning question</p>
            
         <div class="px-14 mt-5">

          <button class="h-12 bg-blue-700 w-full text-white text-md rounded hover:shadow hover:bg-blue-800">Join As Advice</button>
           
         </div>';
  //header("Location:../Site1/page.html"); //Here 240
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