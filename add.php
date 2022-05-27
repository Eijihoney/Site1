
<html>
<head>
<title>Add Product</title>
</head>
<body>
<center><h2>Add data about product</h2></center>
<center><form action="add.php" method="POST"></center>
<center>Name: <input type="text" name="name" value="" required></center><br><br>
<center>Price: <input type="text" name="price" value="" required></center><br><br>
<center>Image: <input type="file" name="image" id="fileToUpload"></center><br><br>
<center><input type="submit" name="submit" value="Add New Product" /></center>
</form>
</body>
</html>

<?php
 // connection to db
include 'dbconn.php';
// variables
$name = $_POST['name'];
$price = $_POST['price'];
$image = $_POST['image'];
// button was not pressed
if(!$_POST['submit'])
{
echo "<center>All fields must be filled</center>";
}
else 
{
 // else new data will be added
$sql = "INSERT INTO catalog (name, image, price)
VALUES ('$name', '$image', '$price')";

if (mysqli_query($conn, $sql)) 
{
echo "<h1><center>New product was added successfully</center></h1>";
} 
else 
{
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>

