<?php
        session_start();

        include('config.php');
        // if($_SERVER["REQUEST_METHOD"] == "POST") {
        	 // username and password sent from form

        	 // $myusername = mysqli_real_escape_string($db,$_POST['username']);
        	 // $mypassword = mysqli_real_escape_string($db,$_POST['password']);



        	$page_title="Cart";
$coupon = isset($_POST['coupon_code']) ? $_POST['coupon_code'] : "";
$action = isset($_GET['action']) ? $_GET['action'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
$getquantity = isset($_GET['quantity']) ? $_GET['quantity'] : "";
?>
<div class="basket-content">
    <div class="basket-details">
        <div class="basket-header">
            <img src="img/icon_all_food.png" class="basket-icon"/>CART Details
        </div>
        <div class="basket-body">
            <div class="order-summary">
                <a id="addFood" href="menu.php">« Add Food</a>
                <h3>Review and modify your items</h3>
                <table class="order-summary-table">
                    <tr class="order-table-header">
                        <!-- table header -->
                        <td>
                            <span>Item<span>
                        </td>
                        <td class="qty-header">Quantity</td>
                        <td class="order-item-price">Price</td>
                    </tr>

                    <!-- list of items -->
                    <?php
                    $total_price = 0;
                    if(count($_SESSION['cart_items']) > 0){
                        // get the product ids
                        $ids = "";
                        foreach($_SESSION['cart_items'] as $each_item){
                            $quantity=$each_item['quantity'];
                            $item_id=$each_item['id'];
                            $rows= $db->query("SELECT * FROM products WHERE productId='$item_id' LIMIT 1");
                            // show the list of items in cart
                            foreach($rows as $row){
                                $product_img=$row["product_image"];
                                $product_name=$row["product_name"];
                                $product_id=$row["productId"];
                                $price=$row["product_price"];
                                $prod_desc=$row["product_desc"];
                                if($quantity >1){
                                    $prodPrice=$quantity*$row["product_price"];
                                }else {
                                    $prodPrice=$row["product_price"];
                                }
                                $total_price = $total_price + $prodPrice;
                                ?>
                                <tr>
                                    <td ><a class="item-image" href=""><img src="img/<?= $product_img?>" /></a>

                                        <!-- record of the current item being choosed -->
                                        <div class='product-id' style="display:none"><?= $product_id ?></div>

                                        <div class="product-name"><?= $product_name?>
                                            <a href="remove_from_cart.php?id=<?= $product_id ?>&name=<?= $product_name?>" class="remove">
                                                <img class="removeVariant" src="img/Delete.png" alt="remove"/>
                                            </a>
                                        </div>
                                        <!--
                                        <div class="desc"><?= $product_desc?></div>
                                        -->
                                    </td>
                                    <td class="qty">
                                        <form class='update-quantity-form'>
                                          <div class='input-group'>
                                             <select name="dropdown" class="quantity_select">
                                                <option value="1" <?php echo $quantity == "1" ? 'selected' : ''; ?> >1</option>
                                                <option value="2" <?php echo $quantity == "2" ? 'selected' : ''; ?> >2</option>
                                                <option value="3" <?php echo $quantity == "3" ? 'selected' : ''; ?> >3</option>
                                                <option value="4" <?php echo $quantity == "4" ? 'selected' : ''; ?> >4</option>
                                             </select>
                                          </div>
                                        </form>
                                    </td>
                                    <td class="order-item-price">$<?= $prodPrice?></td>
                                </tr>
                            <?php
                            }
                        }
                        $taxed=($total_price * 8) / 100;
                        $totalOrder = $taxed+$total_price;
                    } else {
                    ?>
                        <tr>
                            <td>Your cart is empty!</td>
                        </tr>
                    <?php
                        unset($_SESSION["order"]);
                    }
                    ?>
                    <tr class="total-price">
                        <td colspan="2">
                            <p>Items total</p>
                            <p>Tax</p>
                            <p>Order total</p>

                            <!-- coupon -->
                            <?php       if(count($_SESSION['cart_items']) > 0){
                            ?>
                            <div id="coupon">
                                <form id="promo-form" action="cart.php" method="POST">
                                        <label for="coupon_code">Have a coupon/promotion code :</label>
                                        <input type="text" name="coupon_code" id="coupon_code" class="coupon_input" maxlenght="25"/>
                                        <input type="submit" class="coupon_btn" value="ADD"></input>
                                </form>

                            </div>
                            <?php
                    }
?>
                                         <?php
                            if($coupon=='FOOD10'){
    ?>
      <span class="alert-info">
  <img class="smiley" src="img/Eating-Smiley.jpg"  alt="smiley"/> Promotion applied
    </span>
                        <?php
                                $totalOrder= $totalOrder-($totalOrder*10)/100;
}
?>
                        </td>



                        <td class="total-price-right">
                            <p>$<?= $total_price ?></p>
                            <p>$<?= $taxed ?></p>
                            <p>$<?= $totalOrder ?></p>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3">
                            <!-- check out -->
                       <?php       if(count($_SESSION['cart_items']) > 0){
                            ?><a href='checkout.php?totalp=<?=$totalOrder?>' id='table-check-out'>checkout</a>
                            <?php
                            }
?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>?>