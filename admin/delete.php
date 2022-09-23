<?php


require('includes/config.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM matches WHERE Id=$id"; 
$results=$query->fetchAll(PDO::FETCH_OBJ);
header("Location: manage-matches.php"); 
?>
