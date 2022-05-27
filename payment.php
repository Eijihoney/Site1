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
  echo '<section class="u-align-center u-black u-clearfix u-container-style u-dialog-block u-opacity u-opacity-70 u-valign-middle u-dialog-section-4" id="signup-sub" data-dialog-show-on="click">
      <div class="u-align-center u-border-2 u-border-grey-10 u-container-style u-dialog u-gradient u-shape-rectangle u-dialog-1">
        <div class="u-container-layout u-container-layout-1">
          <h2 class="u-custom-font u-font-montserrat u-text u-text-default u-text-palette-1-light-1 u-text-1">Welcome<br>to my site<br>
          </h2>
          <p class="u-text u-text-2">Sample text. Click to select the text box. Click again or double click to start editing the text.</p>
          <a href="paymentform.php" data-page-id="733519072" class="u-border-none u-btn u-button-style u-hover-palette-1-base u-palette-1-light-2 u-btn-1">join to free</a>
        </div><button class="u-dialog-close-button u-icon u-text-black u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 413.348 413.348" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-cdad"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 413.348 413.348" id="svg-cdad"><path d="m413.348 24.354-24.354-24.354-182.32 182.32-182.32-182.32-24.354 24.354 182.32 182.32-182.32 182.32 24.354 24.354 182.32-182.32 182.32 182.32 24.354-24.354-182.32-182.32z"></path></svg></button>
      </div>
    </section><style> .u-dialog-section-4 {
  min-height: 826px;
}

.u-dialog-section-4 .u-dialog-1 {
  width: 566px;
  min-height: 464px;
  box-shadow: 5px 5px 20px 0 rgba(0,0,0,0.4);
  background-image: linear-gradient(#f2f2f2, #d9d9d9);
  margin: 60px auto;
}

.u-dialog-section-4 .u-container-layout-1 {
  padding: 0;
}

.u-dialog-section-4 .u-text-1 {
  font-size: 3.75rem;
  letter-spacing: 3px;
  font-weight: 700;
  text-transform: none;
  margin: 126px auto 0;
}

.u-dialog-section-4 .u-text-2 {
  margin: 33px 30px 0;
}

.u-dialog-section-4 .u-btn-1 {
  font-size: 1rem;
  letter-spacing: 1px;
  border-style: none;
  font-weight: 700;
  text-transform: uppercase;
  background-image: none;
  margin: 33px auto 0;
}

.u-dialog-section-4 .u-icon-1 {
  width: 20px;
  height: 20px;
  left: auto;
  top: 14px;
  position: absolute;
  right: 18px;
}

@media (max-width: 1199px) {
  .u-dialog-section-4 .u-dialog-1 {
    height: auto;
  }

  .u-dialog-section-4 .u-text-2 {
    margin-left: 30px;
    margin-right: 30px;
  }
}

@media (max-width: 767px) {
  .u-dialog-section-4 .u-dialog-1 {
    width: 540px;
  }

  .u-dialog-section-4 .u-container-layout-1 {
    padding-left: 30px;
    padding-right: 30px;
  }

  .u-dialog-section-4 .u-text-2 {
    margin-left: 17px;
    margin-right: 17px;
  }
}

@media (max-width: 575px) {
  .u-dialog-section-4 .u-dialog-1 {
    width: 340px;
  }

  .u-dialog-section-4 .u-container-layout-1 {
    padding-left: 25px;
    padding-right: 25px;
  }

  .u-dialog-section-4 .u-text-1 {
    font-size: 2.5rem;
  }

  .u-dialog-section-4 .u-text-2 {
    margin-left: 0;
    margin-right: 0;
  }
}</style>';
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
