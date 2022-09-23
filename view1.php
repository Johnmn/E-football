<?php
/*
this page displays order details. user can make a change in order or remove a food item from the cart_item
as per requirement. user can proceed to next step that is "customer details" by clicking on confirm order.
*/
include "header.php";
if(!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "remove":
            //removing values from session variable "cart_item"
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["Dates"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            $item_total = 0;
            $count=1;
            //updating "item_total" variable
            foreach ($_SESSION["cart_item"] as $item) {
                $item_total += ($item["price"] * $item["quantity"]);
                $count++;
            }
            /*
            updating session variables "total" and "count"
            these session variables are used in cart shown on user navigation bar
            */
            $_SESSION['total'] = $item_total;
            $_SESSION['count'] =$count-1;
            header("location: order_checkout.php");
            break;
    }
}
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
    ?>
   <form action="/action_page.php">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
    <?php
}
else{
    ?>
    <div class="form-group col-md-3"></div>
    <div class="form-group col-md-6">
        <div class="alert alert-info">
            <center><h2>Cart is empty</h2></center>
        </div>
    </div>
    <?php
}
?>
