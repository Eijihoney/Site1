<?php
if(session_id() == '') 
{
session_start();
}
$product_ids = array();
// check if button has been submitted
if (filter_input(INPUT_POST, 'order')) 
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
<html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="products.css"/>
<body>  
<?php 


$connect = mysqli_connect('localhost', 'root', '', 'website');
$query = 'SELECT * FROM catalog ORDER BY id ASC';
$result = mysqli_query($connect, $query);

if ($result):
if (mysqli_num_rows($result)>0):
while ($product = mysqli_fetch_assoc($result)):
?>
 <div class="col-sm-4 col-md-3">

<form method="post" action="Кац.php?action=add&id=<?php echo $product['id']; ?>">
<div class="products">
<img src="<?php echo $product['image']; ?>"class="img-responsive" />
<h4 class="text-info"><?php echo $product['name']; ?><h4>
<h4><?php echo $product['price']; ?> tg<h4>
<input type="text" name="quantity" class="form-control" value="1" />
<input type="hidden" name="name" value="<?php echo $product['name']; ?>" />
<input type="hidden" name="price" value="<?php echo $product['price']; ?>" />
<input type="submit" name="add_to_cart" style="margin-top: 5px" class="btn btn-success" value="Order" />
</div>      
 </form>
</div>

<?php
endwhile;
 endif;
endif;
?>
<div style="clear:both"></div>
<br/>
// table about the order details
<div class="table-responsive">
<table class="table">
<tr><th colspan="5"><h3>Order Details</h3></th></tr>
<tr>
<th width="40%">Product Name</th>
<th width="10%">Quantity</th>
<th width="20%">Price</th>
<th width="15%">Total</th>
<th width="5%">Action</th>
</tr>
<?php

if (!empty($_SESSION['shopping_cart'])):
$total = 0;
foreach ($_SESSION['shopping_cart'] as $key => $product):
?>
<tr>
<td><?php echo $product['name']; ?></td>
<td><?php echo $product['quantity']; ?></td>
<td><?php echo $product['price']; ?> tg</td>
<td><?php echo number_format($product['quantity'] * $product['price'], 2); ?> tg</td>
<td><a href="Кац.php?action=delete&id=<?php echo $product['id']; ?>">
<div class="btn-danger">Remove</div>
</a>
</td>
</tr>
<?php

$total = $total + ($product['quantity'] * $product['price']);
endforeach;
?>
<tr>
<td colspan="3" align="right">Total</td>
<td align="right"><?php echo number_format($total, 2); ?> tg</td>
<td></td>
</tr>
<tr>
<td colspan="5">
<?php
if (isset($_SESSION['shopping_cart'])):
if (count($_SESSION['shopping_cart']) > 0):
?>
 
<form action="order.php" method="post">
<button class="btn btn-lg btn-primary btn-block order-btn" type="submit" name="order-sub">Buy</button>
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
</div>
</body>

</html>


