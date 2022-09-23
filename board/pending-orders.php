<docktype html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/dollar.jpg">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
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
    
    
<style>
    #exampla {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 50%;
}

#example td, #example th {
    border: 1px solid #ddd;
    padding: 8px;
}

#example tr:nth-child(even){background-color: #f2f2f2;}

#example tr:hover {background-color: #ddd;}

#example th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
    .enroll{
        text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
            color: white;
        }
</style>





</head>





<body>
    <center>
        <h2><strong><p class='enroll'>REPORT</p></strong></h2>
        <style type="text/css">
  .div2{
             width:40%;
             height:50px;
             margin-left:30%;
             margin-right:30%;
             background-color:white;
             text-align: center;
             border-radius: 20px;
</style>

<body align=centre>

</body>
 <table id="example" class="display nowrap" style="width:100%">
     <thead>
        <tr>
     <th>Venue_charges</th>
     <th>Cost</th>
     <th>Venue</th>
     <th>Amount</th>
 </tr>
    </thead>




<?php include 'include/connect.php';
  try{
$sql='SELECT * FROM expenses';
$reasult=$pdo->query($sql);
}
catch(PDOExecption $e)
{
$error='Error fetching caller details'.$e->getMessage();
echo $error;
exite();
}
while ($row =$reasult->fetch())
{
$callers[] = array(
 'Venue_charges'=>$row['Venue_charges'],
  'Cost'=>$row['Cost'],
  'Venue'=>$row['Venue'],
  'Amount'=>$row['Amount']);
}
?>

    <?php foreach($callers as $caller): ?>
    <tr>
        <td>
    <?php echo htmlspecialchars($caller['Venue_charges'], ENT_QUOTES, 'UTF-8');?>        
    </td>

    <td>
    <?php echo htmlspecialchars($caller['Cost'], ENT_QUOTES, 'UTF-8');?>
        
    </td>
  <td>
    <?php echo htmlspecialchars($caller['Venue'], ENT_QUOTES, 'UTF-8');?>
            
        </td>
       <td>
    <?php echo htmlspecialchars($caller['Amount'], ENT_QUOTES, 'UTF-8');?>
        
    </td></tr>
    <?php  endforeach; ?>
     </tbody>
</table>
</center>
</body>
</docktype>

        