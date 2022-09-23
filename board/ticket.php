
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
	$category=$_POST['category'];
	$description=$_POST['description'];
$sql=mysqli_query($con,"insert into category(categoryName,categoryDescription) values('$category','$description')");
$_SESSION['msg']="Category Created !!";

}

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from category where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Category deleted !!";
		  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Board| Tickets</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	 <link rel="stylesheet" type="text/css" href="jqtables/buttons.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="jqtables/jquery.dataTables.min.css" />
    <script src="jqtables/vfs_fonts.js"></script>
    <script src="jqtables/pdfmake.min.js"></script>
    <script src="jqtables/jszip.min.js"></script>
    <script src="jqtables/jquery-3.3.1.js"></script>
    <script src="jqtables/jquery.dataTables.min.js"></script>
    <script src="jqtables/javascript.js"></script>
    <script src="jqtables/dataTables.buttons.min.js"></script>
    <script src="jqtables/buttons.print.min.js"></script>
    <script src="jqtables/buttons.html5.min.js"></script>
    <script src="jqtables/buttons.flash.min.js"></script>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

						
									

	<div class="module">
							<div class="module-head">
								<h3>Ticket selling</h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Date</th>
											<th>Match</th>
											<th>Venue</th>
											<th>Number of tickets</th>
											<th>Price</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"select * from tickets");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['Dates']);?></td>
											<td><?php echo htmlentities($row['Clubs']);?></td>
											<td> <?php echo htmlentities($row['Venue']);?></td>
											<td><?php echo htmlentities($row['quantity']);?></td>
											<td> <?php echo htmlentities($row['Price']);?></td>
											<td><?php echo $row['quantity']*$row['Price']; ?></td>
										</tr>
										<?php $cnt=$cnt+1; } ?>
										
								</table>
							</div>
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>