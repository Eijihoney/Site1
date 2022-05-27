

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
;

if (empty($username) || empty($mail) || empty($surname) || empty($address) || empty($phonenum)) 
{ 
header("Location: paymentform.php?signup=emptyfields");
  exit();
}
// checking the validate data
elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL))
{
$emailErr = "Invalid email format";
echo '
<style>
  body{
   letter-spacing: 0.7px;
  background: #243b55;
    margin: auto;
  width: 90%;
   
}

   

 
.container{
    margin-top: 120px;
    margin-bottom: 120px;
    margin: auto;
    width: 50%;
  padding: 10px;
 
 }      
.btn-lg, a:focus, a:active {
    outline: none !important;
    box-shadow: none !important;        
}

.card-1{
    box-shadow: 2px 4px 15px 2px #89261C;
margin: auto;
  width: 60%;
}

.p{
    font-size: 15px ;
      margin: auto;
  width: 50%;
}
        
.small{
    font-size: 9px !important;
    margin: auto;
  width: 50%;

}

.cursor-pointer{
    cursor: pointer;
 
}

.btn-round-lg {
   margin: auto;
  width:90%;
  padding: 30px;
    border-radius: 20.5px;
    background-color: #eee;
    color:#89261C;
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 0.9px;
    padding: 8px 20px  8px  20px !important;
    
}

.btn-round-lg:hover{
    background-color: #89261C ;
    color: white;
    border: 1px solid #fff;
    margin: auto;
  width:90%;
  padding: 30px;
}

.btn-round-lg:focus{
    border: 1px solid #fff  !important;
    margin: auto;
  width: 90%;
}

.card{
    background-color: #141e30  !important;
    color: white;
    margin: auto;
  margin: auto;
  width: 60%;
}
</style>
<html>
<body>
<div class="container d-flex justify-content-center">
    <div class="card shaodw-lg  card-1">
        <div class="card-header pt-3 pb-0 ml-auto border-0 ">
            <svg class=" cursor-pointer" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M33.73372,23.59961l-10.13411,10.13411l52.26628,52.26628l-52.26628,52.26628l10.13411,10.13411l52.26628,-52.26628l52.26628,52.26628l10.13411,-10.13411l-52.26628,-52.26628l52.26628,-52.26628l-10.13411,-10.13411l-52.26628,52.26628z"></path></g></g></svg>
        </div>
        <div class="card-body  d-flex pt-0">
            <div class="row no-gutters  mx-auto justify-content-start flex-sm-row flex-column">
                
                <div class="col-md-6 ">
                    <div class="card border-0 ">
                        <div class="card-body">
                            <div id="res">
         <script type="text/javascript"> var text = "Возникла ошибка при вводе неправильной почты и/или номера телефона. Заполните заново!";
var delay = 44; // cкорость
var elem = document.getElementById("res");
 
var print_text = function(text, elem, delay) {
    if(text.length > 0) {
        elem.innerHTML += text[0];
        setTimeout(
            function() {
                print_text(text.slice(1), elem, delay); 
            }, delay
        );
    }
}
print_text(text, elem, delay);
</script></div>
                            <p class="card-text "><p></p></p>
                            <form action="paymentform.php">
                            <button class="btn btn-primary btn-round-lg btn-lg"> ОК </button>
                            </form>
                            
                        </div>
                    </div>
                </div>
           </div>
        </div> 
    </div>
</div>
</body>
</html>';
exit();
           }
// If all the data are entered, and there is no error, save all the data to the database




$add = "INSERT INTO users (Name, Surname, address, mail, phonenum) VALUES ('$username', '$surname', '$address','$mail','$phonenum')";

 if (mysqli_query($conn, $add))
 { 
  echo '
<style>
body{
   letter-spacing: 0.7px;
  background: #243b55;
    margin: auto;
  width: 90%;
   
}
 
.container{
    margin-top: 120px;
    margin-bottom: 120px;
    margin: auto;
    width: 50%;
  padding: 10px;
 
 }      
.btn-lg, a:focus, a:active {
    outline: none !important;
    box-shadow: none !important;        
}

.card-1{
    box-shadow: 2px 4px 15px 0px #03e9f4;
margin: auto;
  width: 60%;
}

.p{
    font-size: 15px ;
      margin: auto;
  width: 50%;
}
        
.small{
    font-size: 9px !important;
    margin: auto;
  width: 50%;

}

.cursor-pointer{
    cursor: pointer;
 
}

.btn-round-lg {
   margin: auto;
  width:90%;
  padding: 30px;
    border-radius: 20.5px;
    background-color: #eee;
    color: #03e9f4;
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 0.9px;
    padding: 8px 20px  8px  20px !important;
    border: 1px solid #fff;
}

.btn-round-lg:hover{
    background-color: #03e9f4;
    color: white;
    border: 1px solid #fff;
    margin: auto;
  width:90%;
  padding: 30px;
}

.btn-round-lg:focus{
    border: 1px solid #fff !important;
    margin: auto;
  width: 90%;
}

.card{
    background-color: #141e30  !important;
    color: white;
    margin: auto;
  margin: auto;
  width: 60%;
}
</style>
<body>
<div class="container d-flex justify-content-center">
    <div class="card shadow-lg  card-1">
        <div class="card-header pt-3 pb-0 ml-auto border-0 ">
            <svg class=" cursor-pointer" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M33.73372,23.59961l-10.13411,10.13411l52.26628,52.26628l-52.26628,52.26628l10.13411,10.13411l52.26628,-52.26628l52.26628,52.26628l10.13411,-10.13411l-52.26628,-52.26628l52.26628,-52.26628l-10.13411,-10.13411l-52.26628,52.26628z"></path></g></g></svg>
        </div>
        <div class="card-body  d-flex pt-0">
            <div class="row no-gutters  mx-auto justify-content-start flex-sm-row flex-column">
                
                <div class="col-md-6 ">
                    <div class="card border-0 ">
                        <div class="card-body">
                            
                            <p class="card-text ">
                            <div id="res">
         <script type="text/javascript"> var text = "Заказ успешно оформлен! Продавец скоро свяжется с Вами. Спасибо за покупку!";
var delay = 44; // cкорость
var elem = document.getElementById("res");
 
var print_text = function(text, elem, delay) {
    if(text.length > 0) {
        elem.innerHTML += text[0];
        setTimeout(
            function() {
                print_text(text.slice(1), elem, delay); 
            }, delay
        );
    }
}
print_text(text, elem, delay);
</script></div><p></p>
                            <form action="Главное.html">
                            <button class="btn btn-primary btn-round-lg btn-lg"> ОК</button>
                            </form>
                        </div>
                    </div>
                </div>
           </div>
        </div> 
    </div>
</div>
</body>';
exit();
 }
 // checking existing data
if ($_POST['phonenum']  == $phonenum || $_POST['mail']  == $mail)
{
echo '
<style>
body{
   letter-spacing: 0.7px;
  background: #243b55;
    margin: auto;
  width: 90%;
   
}
 
.container{
    margin-top: 120px;
    margin-bottom: 120px;
    margin: auto;
    width: 50%;
  padding: 10px;
 
 }      
.btn-lg, a:focus, a:active {
    outline: none !important;
    box-shadow: none !important;        
}

.card-1{
    box-shadow: 2px 4px 15px 2px #89261C;
margin: auto;
  width: 60%;
}

.p{
    font-size: 15px ;
      margin: auto;
  width: 50%;
}
        
.small{
    font-size: 9px !important;
    margin: auto;
  width: 50%;

}

.cursor-pointer{
    cursor: pointer;
 
}

.btn-round-lg {
   margin: auto;
  width:90%;
  padding: 30px;
    border-radius: 20.5px;
    background-color: #eee;
    color:#89261C;
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 0.9px;
    padding: 8px 20px  8px  20px !important;
    
}

.btn-round-lg:hover{
    background-color: #89261C ;
    color: white;
    border: 1px solid #fff;
    margin: auto;
  width:90%;
  padding: 30px;
}

.btn-round-lg:focus{
    border: 1px solid #fff  !important;
    margin: auto;
  width: 60%;
}

.card{
    background-color: #141e30  !important;
    color: white;
    margin: auto;
  margin: auto;
  width: 60%;
}
</style>
<html>
<body>
<div class="container d-flex justify-content-center">
    <div class="card shaodw-lg  card-1">
        <div class="card-header pt-3 pb-0 ml-auto border-0 ">
            <svg class=" cursor-pointer" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M33.73372,23.59961l-10.13411,10.13411l52.26628,52.26628l-52.26628,52.26628l10.13411,10.13411l52.26628,-52.26628l52.26628,52.26628l10.13411,-10.13411l-52.26628,-52.26628l52.26628,-52.26628l-10.13411,-10.13411l-52.26628,52.26628z"></path></g></g></svg>
        </div>
        <div class="card-body  d-flex pt-0">
            <div class="row no-gutters  mx-auto justify-content-start flex-sm-row flex-column">
                
                <div class="col-md-6 ">
                    <div class="card border-0 ">
                        <div class="card-body">
                            <div id="res">
         <script type="text/javascript"> var text = "Возникла ошибка при вводе неправильной почты и/или номера телефона. Заполните заново!";
var delay = 44; 
var elem = document.getElementById("res");
 
var print_text = function(text, elem, delay) {
    if(text.length > 0) {
        elem.innerHTML += text[0];
        setTimeout(
            function() {
                print_text(text.slice(1), elem, delay); 
            }, delay
        );
    }
}
print_text(text, elem, delay);
</script></div>
                            <p class="card-text "><p></p></p>
                            <form action="paymentform.php">
                            <button class="btn btn-primary btn-round-lg btn-lg"> ОК </button>
                            </form>
                            
                        </div>
                    </div>
                </div>
           </div>
        </div> 
    </div>
</div>
</body>
</html>';
exit();
}
}

// connection closes
//mysqli_close($conn);

?>

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
