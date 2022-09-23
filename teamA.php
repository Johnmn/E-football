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
                $productByCode = runQuery("select * from matches where Clubs='$Clubs'");
                $itemArray = array($productByCode[0]["Clubs"] => array('Clubs' => $productByCode[0]["Clubs"],  'quantity' => $_REQUEST["quantity"]));
                if (!empty($_SESSION["cart_item"])) {
                    if (in_array($productByCode[0]["Clubs"], $_SESSION["cart_item"])) {
                        foreach ($_SESSION["cart_item"] as $k => $v) {
                            if ($productByCode[0]["Clubs"] == $k)
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
                $item_total += ($item["quantity"] * $item["quantity"]);
                $count++;
            }
            //updating total and count variables
            $_SESSION['total'] = $item_total;
            $_SESSION['count'] =$count-1;
            //header("location: order_online.php");
            break;
    }
}
?>
<html>
<head></head>
<body>
  <!-- Table shows the menu and provides quantity and add to cart(+ sign) button -->
  <?php
  $query1="select * from matches  where Clubs like '%TeamA%' ORDER BY id asc";
  $result1=mysqli_query($conn,$query1);
  ?>
  <div class="form-group col-md-3"></div>
  <div class="form-group col-md-6">
    <div class="well">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <center><h2>Order online</h2></center>
        </div>
      </div>
      <div class="well">
          <div class="table-responsive">
          <table class="table table-striped">
          <thead>
              <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Clubs</th>
                  <th>Location</th>
                  
                  <th>Quantity</th>
                  <th></th>

              </tr>
          </thead>
          <tbody>
            <?php
            $count=1;
            while($row=mysqli_fetch_array($result1)) {
                ?>
                <tr>
                    <form action="teamA.php" method="get">
                        <td><?php echo $count."." ?></td>
                        <td><?php echo $row[1] ?></td>
                        <td><?php echo $row[2] ?></td>
                        <td><?php echo $row[3] ?></td>
                        <td><?php echo $row[4] ?></td>
                        <td><input type="number" name="quantity" class="col-xs-8"></td>
                        <td>
                          <button type="submit" class="btn btn-primary btn-md">
                          <span class="glyphicon glyphicon-plus"></span></button>
                        </td>
                        <input type="hidden" name="Clubs" value="<?php echo $row[3] ?>">
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
