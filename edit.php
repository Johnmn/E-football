<?php

 
include "connection.php";
include "header.php";
$id=$_REQUEST['id'];
$query = "SELECT * from matches where Id='".$id."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>
<body>
<div class="form">

<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$Dates = $_REQUEST['Dates'];
$Clubs =$_REQUEST['Clubs'];
$Venue =$_REQUEST['Venue'];
$Price =$_REQUEST['Price'];
$quantity =$_REQUEST['quantity'];
$update="insert into tickets (Id,Dates,Clubs,Venue,Price,quantity) values ('$id','$Dates','$Clubs','$Venue','$Price','$quantity')";
mysqli_query($conn,$update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br><a href='homepage.php'>View Updated Record</a>";  
                 
                       
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="Id" type="hidden" value="<?php echo $row['Id'];?>" />
<p><input type="text" name="Dates" placeholder="Enter Name" required value="<?php echo $row['Dates'];?>" /></p>
<p><input type="text" name="Clubs" placeholder="Enter Age" required value="<?php echo $row['Clubs'];?>" /></p>
<p><input type="text" name="Venue" placeholder="Enter Age" required value="<?php echo $row['Venue'];?>" /></p>
<p><input type="text" name="Price" placeholder="Enter Age" required value="<?php echo $row['Price'];?>" /></p>
<p><input type="number" name="quantity" placeholder="Quantity" required ="" /></p>
<p><input name="submit" type="submit" value="Insert" /></p>
</form>
<?php } ?>

</div>
</div>
</body>
</html>
