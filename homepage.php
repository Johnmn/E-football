<?php

include "connection.php";
include "header.php";
if(!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (!empty($_REQUEST["quantity"])) {
                $Dates = $_REQUEST['Dates'];
                function runQuery($query){
                    //database connectivity
                    $conn = mysqli_connect("localhost", "root", null, "project");
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        $resultset[] = $row;
                    }
                    if (!empty($resultset))
                        return $resultset;
                }
                /*
                implementing concept of php arrays for inserting into "cart_item" variable which stores
                values related to order
                */
                $productByCode = runQuery("select * matches where Id='$Id'");
                $itemArray = array($productByCode[0]["Id"] => array('Dates' => $productByCode[0]["Id"], 'Price' => $productByCode[0]["Price"], 'quantity' => $_REQUEST["quantity"]));
                if (!empty($_SESSION["cart_item"])) {
                    if (in_array($productByCode[0]["Dates"], $_SESSION["cart_item"])) {
                        foreach ($_SESSION["cart_item"] as $k => $v) {
                            if ($productByCode[0]["Id"] == $k)
                                $_SESSION["cart_item"][$k]["quantity"] = $_REQUEST["quantity"];
                        }
                    }
                    else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                    }
                }
                else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            $item_total = 0;
            $count=1;
            foreach ($_SESSION["cart_item"] as $item) {
                $item_total += ($item["Price"] * $item["quantity"]);
                $count++;
            }
            //updating total and count variables
            $_SESSION['total'] = $item_total;
            $_SESSION['count'] =$count-1;
            header("location: homepage.php");
            break;
    }
}
?>
<html>
<head></head>
<body>
  <!-- Table shows the menu and provides quantity and add to cart(+ sign) button -->
  <?php
  $query1="select * from matches order by Id asc";
  $result1=mysqli_query($conn,$query1);
  ?>
  <div class="form-group col-md-3"></div>
  <div class="form-group col-md-6">
    <div class="well">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <center><h2>Buy Tickets</h2></center>
        </div>
      </div>
      <style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
      <div class="well">
          <div class="table-responsive">
          <table id="customers">
          <thead>
              <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Clubs</th>
                  <th>Venue</th>
                  <th>Price per ticket</th>

                  <th>Detail</th>
                  <th>Comment</th>

              </tr>
          </thead>
          <tbody>
            <?php
            $count=1;
            while($row=mysqli_fetch_array($result1)) {
                ?>
                <tr>
                    <form action="homepage.php" method="get">
                        <td><?php echo $count."." ?></td>
                        <td><?php echo $row['Dates'] ?></td>
                        <td><?php echo $row['Timess'] ?></td>
                        <td><?php echo $row['Clubs'] ?></td>
                        <td><?php echo $row['Venue'] ?></td>
                        <td><?php echo $row['Price'] ?></td>
                        
                          <button type="submit" class="btn btn-primary btn-md">
                          <span class="glyphicon glyphicon-plus"></span></button>
                        </td>
                        
                        <td>
                          <a href="edit.php?id=<?php echo $row["Id"]; ?>">view</a>
</td>
                       
                        <input type="hidden" name="Dates" value="<?php echo $row['Id'] ?>">
                        <input type="hidden" name="action" value="add">
                         <td>
                          <button type="submit" class="btn btn-primary btn-md">
                          <span class="glyphicon glyphicon-plus"></span><a href="comment.php"> Comment</button>
                        </td>
                       
                    </form>

                </tr>
                <?php
                $count++;
            }
            ?>
          </tbody>
        </table>
          </div>
      </div>
    </div>
  </div>
</body>
</html>
