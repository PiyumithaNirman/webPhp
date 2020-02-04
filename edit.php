<?php

 
require('db.php');
include("auth.php");
$id=$_REQUEST['id'];
$query = "SELECT * from new_record where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> | <a href="insert.php">Insert New Record</a> | <a href="logout.php">Logout</a></p>
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$product_id =$_REQUEST['product_id'];
$product_name =$_REQUEST['product_name'];
$price =$_REQUEST['price'];
$submittedby = $_SESSION["username"];
$update="UPDATE new_record SET product_id='".$product_id."', product_name='".$product_name."', price='".$price."', submittedby='".$submittedby."' WHERE id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br><a href='view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" name="product_id" placeholder="Enter New Product Id" required value="<?php echo $row['product_id'];?>" /></p>
<p><input type="text" name="product_name" placeholder="Enter New Product Name" required value="<?php echo $row['product_name'];?>" /></p>
<p><input type="text" name="price" placeholder="Enter New Price" required value="<?php echo $row['price'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>

<br /><br /><br /><br />
</div>
</div>
</body>
</html>
