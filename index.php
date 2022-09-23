<?php

include "connection.php";
include "header.php";
if(!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (!empty($_REQUEST["quantity"])) {
                $Clubs = $_REQUEST['Clubs'];
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
                $productByCode = runQuery("select * from tblproduct where product_name='$product_name'");
                $itemArray = array($productByCode[0]["product_name"] => array('product_name' => $productByCode[0]["product_name"], 'price' => $productByCode[0]["price"], 'quantity' => $_REQUEST["quantity"]));
                if (!empty($_SESSION["cart_item"])) {
                    if (in_array($productByCode[0]["product_name"], $_SESSION["cart_item"])) {
                        foreach ($_SESSION["cart_item"] as $k => $v) {
                            if ($productByCode[0]["product_name"] == $k)
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
                $item_total += ($item["price"] * $item["quantity"]);
                $count++;
            }
            //updating total and count variables
            $_SESSION['total'] = $item_total;
            $_SESSION['count'] =$count-1;
            header("location: order_online.php");
            break;
    }
}
?>
<html>
<head></head>
<body>
  <!-- Table shows the menu and provides quantity and add to cart(+ sign) button -->
  <?php
  $query1="select * from matches";
  $result1=mysqli_query($conn,$query1);
  ?>
  <div class="form-group col-md-3"></div>
  <div class="form-group col-md-6">
    <div class="well">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <center><h2>Buy tickets</h2></center>
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
                  <th></th>

              </tr>
          </thead>
          <tbody>
            <?php
            $count=1;
            while($row=mysqli_fetch_array($result1)) {
                ?>
                <tr>
                    <form action="index.php" method="get">
                        <td><?php echo $count."." ?></td>
                        <td><?php echo $row[1] ?></td>
                        <td><?php echo $row[2] ?></td>
                        <td><?php echo $row[3] ?></td>
                        <td><?php echo $row[4] ?></td>
                        <td>
                          <button type="submit" class="btn btn-primary btn-md">
                          <span class="glyphicon glyphicon-plus"><a href="login.php"> Details </span></button>
                        </td>
                        <input type="hidden" name="product_name" value="<?php echo $row[1] ?>">
                        <input type="hidden" name="action" value="add">
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
