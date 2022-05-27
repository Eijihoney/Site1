<style >
body{
   letter-spacing: 0.7px;
  background: #C4D7DC;
    margin: auto;
  width: 90%;
   
}
</style>
<body>
<div id="header">
<center><img src="https://cdn.igromania.ru/mnt/articles/4/3/2/2/6/7/31442/preview/f0fa93471924fc02_1920xH.jpg">
<h3> Welcome to Admin Panel | QR </h3></center>
</div>
<div id="sidemenu">
 <ul> 
<li><a href="add.php" target="_blank"> Add New Products </a></li>
<li><a href="order.php" target="_blank"> Order </a></li>
 </ul>	
</div>
<div id="data">
<br><br>
<h1>Catalog</h1>
<?php
// connection with db
include 'dbconn.php';
$sql = "SELECT * FROM catalog";
$result = mysqli_query($conn, $sql);
// output data about products
if (mysqli_num_rows($result) > 0) 
{
echo "<table border='1' width='70%'>"; 
while($row = mysqli_fetch_assoc($result)) 
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>"; 
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['price'] . " тг". "</td>";
echo "<td><img src='/Site1/". $row['image']."'></td>";
echo "<td><a href ='delete.php?rn=$row[id]'>delete</td>";
echo "</tr>"; 
}   
echo '</table>';
mysqli_close($conn);	
}
 else 
{
echo "<h3><center>No data found!<center></h3>";
}
?>
</div>
</body>