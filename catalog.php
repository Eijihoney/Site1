

<?php

session_start();
$product_ids = array();
// check if button has been submitted
if (filter_input(INPUT_POST, 'add_to_cart')) 
{
if (isset($_SESSION['shopping_cart'])) 
{
//keep track of how many products are in the shopping cart
$count = count($_SESSION['shopping_cart']);
// create consecutive array for matching array keys to goods id's
$product_ids = array_column($_SESSION['shopping_cart'], 'id');
if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids))
{
$_SESSION['shopping_cart'][$count] = array
 (
'id' => filter_input(INPUT_GET, 'id'),
'name' => filter_input(INPUT_POST, 'name'),
'price' => filter_input(INPUT_POST, 'price'),
'quantity' => filter_input(INPUT_POST, 'quantity')
); 
}
        else 
{
// match array key to ID of the product being added to the order
for ($i=0; $i < count($product_ids); $i++) 
{ 
if ($product_ids[$i] == filter_input(INPUT_GET, 'id')) 
{
// add item quantity to the existing product in the array
$_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
}
}
}
}
else 
{ 
// if shopping cart does not exist, first created product is with array key 0
$_SESSION['shopping_cart'][0] = array
 (
'id' => filter_input(INPUT_GET, 'id'),
'name' => filter_input(INPUT_POST, 'name'),
'price' => filter_input(INPUT_POST, 'price'),
'quantity' => filter_input(INPUT_POST, 'quantity')
); 
}
}

if (filter_input(INPUT_GET, 'action') == 'delete')
{
// loop through all existing products until it matches ID
foreach ($_SESSION['shopping_cart'] as $key => $product) 
{
if ($product['id'] == filter_input(INPUT_GET, 'id')) 
{
// remove product from the order
unset($_SESSION['shopping_cart'][$key]);
}
}
// reset session array keys so they match with product’s array id number
$_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}
function pre_r($array)
{
echo '<pre>';
print_r($array);
echo '</pre>';
}
?>


 <!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="01, 02">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Главное</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Главное.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.5.4, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i|Lato:100,100i,300,300i,400,400i,700,700i,900,900i">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    
 
    
    
    
    
    
    <script type="application/ld+json">{
        "@context": "http://schema.org",
        "@type": "Organization",
        "name": "",
        "logo": "images/QP.png"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Главное">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body u-xl-mode"><header class="u-clearfix u-header u-header" id="sec-d2d5"><div class="u-clearfix u-sheet u-sheet-1">
        <a href="Главное.html" data-page-id="20033221" class="u-image u-logo u-image-1" data-image-width="500" data-image-height="500" title="Qazaq Prints">
          <img src="images/QP.png" class="u-logo-image u-logo-image-1">
        </a>
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
            <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="catalog.php" style="padding: 10px 20px;">Каталог</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="О-нас.php" style="padding: 10px 20px;">О нас</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Контакты.php" style="padding: 10px 20px;">Контакты</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>

<?php 


$connect = mysqli_connect('localhost', 'root', '', 'website');
$query = 'SELECT * FROM catalog ORDER BY id ASC';
$result = mysqli_query($connect, $query);

if ($result):
if (mysqli_num_rows($result)>0):
while ($product = mysqli_fetch_assoc($result)):
?>
<style>
  
.btn:focus{
    border: 1px solid #fff !important;

}
.btn:hover{
    background-color: #03e9f4;
    color: white;
    border: 1px solid #fff;
    
}
.btn{
   
   
    background-color: #243b55;
    color: #03e9f4;
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 0.9px;
    padding: 8px 20px  8px  20px !important;
    border: 1px solid #fff;
}
.btn-danger {
  font-size: 14px;
  padding: 3px;
}
.btn-danger:hover {
  background-color: #fff;
    color: red;
    border: 1px solid #fff;
}
.products {
  border: 1px solid #333;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 16px;
  margin-bottom: 20px;
}
.table {
  margin: 0px auto;
  float: none;
}
.row {
  margin: 0px auto;
  float: none;
}
.centered{
  float: none;
  margin: 0 auto;
</style>

 <div class="col-sm-4 col-md-3">

<form method="post" action="catalog.php?action=add&id=<?php echo $product['id']; ?>">
<div class="products">
<img src="<?php echo $product['image']; ?>"class="img-responsive" />
<h4 class="text-info"><?php echo $product['name']; ?><h4>
<h4><?php echo $product['price']; ?> тг<h4>
<input type="text" name="quantity" class="form-control" value="1" />
<input type="hidden" name="name" value="<?php echo $product['name']; ?>" />
<input type="hidden" name="price" value="<?php echo $product['price']; ?>" />
<input type="submit" name="add_to_cart" style="margin-top: 5px" class="btn " value="Добавить" />
</div>      
 </form>
</div>

<?php
endwhile;
endif;
endif;
?>
<div style="clear:both"></div>
<br />

<div class="table-responsive">
<table class="table">
<tr><th colspan="5"><h3>Детали о заказе</h3></th></tr>
<tr>
    <th width="40%">Название товара</th>
    <th width="10%">Количество</th>
    <th width="20%">Цена</th>
    <th width="15%">Итого</th>
    <th width="5%">Действие</th>
</tr>
<?php

if (!empty($_SESSION['shopping_cart'])):
$total = 0;
foreach ($_SESSION['shopping_cart'] as $key => $product):
?>
<tr>
<td><?php echo $product['name']; ?></td>
<td><?php echo $product['quantity']; ?></td>
<td><?php echo $product['price']; ?> тг</td>
<td><?php echo number_format($product['quantity'] * $product['price'], 2); ?> тг</td>
<td><a href="catalog.php?action=delete&id=<?php echo $product['id']; ?>">
<div class="btn-danger">Убрать</div>
</a>
</td>
</tr>
<?php

$total = $total + ($product['quantity'] * $product['price']);
endforeach;
?>
<tr>
<td colspan="3" align="right">Итого</td>
<td align="right"><?php echo number_format($total, 2); ?> тг</td>
<td></td>
</tr>
<tr>
<td colspan="5">
<?php
if (isset($_SESSION['shopping_cart'])):
if (count($_SESSION['shopping_cart']) > 0):
?>
 
<form action="paymentform.php" method="post">
<button class="btn btn-lg btn-primary btn-block order-btn" type="submit" name="order-sub">Оформить</button>
</form>
<?php
endif; 
endif; 
?>
</td>
</tr>
<?php
endif;
?>
</table>
</div>
</h4>
</h4>
</h4>
</h4>
</div>
</form>
</div>
</body>
<footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-c697"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">QR все права защищены</p>
      </div></footer>
</html>

