<html lang="en">
<body>

    <?php        
    session_start();
    include 'connect.php';
    $conn = connect_to_db();

    $user = $_SESSION["user-id"];
    
    if ( isset( $_GET['phone-id'] )) {
        $phone = $_GET["phone-id"];
        $sql = "INSERT INTO cart (user_id, phone_id) VALUES ('$user', '$phone')";

        if ($conn->query($sql) === TRUE) {
            $page = $_SESSION['page'];
            if($page != 'CART')
                $_SESSION['no-in-cart'] += 1;
        }
        else
            echo "";

        $_SESSION['page'] = 'CART';
    }

    include 'header.php';
    
    ?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Shopping cart</li>
                    </ul>
                </div>

                <?php 
                $sql = "SELECT s.phone_name AS phone_name, c.quantity AS quantity, s.prize AS prize, s.img_front AS img_front, s.img_rear AS img_rear FROM smartphone s, cart c WHERE s.phone_id = c.phone_id AND c.user_id = '$user';";
                $result = $conn->query($sql);
                ?>

                <div class="col-md-9" id="basket">

                    <div class="box">

                        <form method="post" action="checkout1.php">

                            <h1>Shopping cart</h1>
                            <p class="text-muted">You currently have <?php echo $_SESSION["no-in-cart"] ?> item(s) in your cart.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Quantity</th>
                                            <th>Unit price</th>
                                            <th>Discount</th>
                                            <th colspan="2">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        if ($result->num_rows > 0) {
                                                // output data of each row
                                            $total = 0;
                                            while($row = $result->fetch_assoc()) {    
                                                $total += $row["prize"];
                                                ?>

                                                <tr>
                                                    <td>
                                                        <a href="#">
                                                            <img src="img/<?php echo $row["img_front"] ?>" alt="">
                                                        </a>
                                                    </td>
                                                    <td><a href="#"><?php echo $row["phone_name"]; ?></a>
                                                    </td>
                                                    <td>
                                                        <input type="number" value="<?php echo $row["quantity"]; ?>" class="form-control">
                                                    </td>
                                                    <td>&#8377 <?php echo $row["prize"]; ?></td>
                                                    <td>&#8377 0.00</td>
                                                    <td>&#8377 <?php echo $row["prize"]; ?></td>
                                                    <td><a href="#"><i class="fa fa-trash-o"></i></a>
                                                    </td>
                                                </tr>

                                                <?php
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                        $conn->close();
                                        ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th colspan="2">&#8377 <?php echo $total; ?></th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="phones.php" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                                </div>
                                <div class="pull-right">
                                    <button class="btn btn-default"><i class="fa fa-refresh"></i> Update basket</button>
                                    <button type="submit" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- /.box -->

                </div>

                <?php 
                $_SESSION['subtotal'] = $total;
                $_SESSION['shipping-cost'] = 10;
                $_SESSION['tax'] = 0;
                ?>
                <!-- /.col-md-9 -->

                <div class="col-md-3">
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order summary</h3>
                        </div>
                        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <th>&#8377 <?php echo $_SESSION['subtotal']; ?></th>
                                    </tr>
                                    <tr>
                                        <td>Shipping </td>
                                        <th>&#8377 <?php echo $_SESSION['shipping-cost']; ?></th>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <th>&#8377 <?php echo $_SESSION['tax']; ?></th>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <th>&#8377 <?php echo $_SESSION['subtotal'] + $_SESSION['shipping-cost'] + $_SESSION['tax']; ?></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="box">
                        <div class="box-header">
                            <h4>Coupon code</h4>
                        </div>
                        <p class="text-muted">If you have a coupon code, please enter it in the box below.</p>
                        <form>
                            <div class="input-group">

                                <input type="text" class="form-control">

                                <span class="input-group-btn">

                                   <button class="btn btn-primary" type="button"><i class="fa fa-gift"></i></button>

                               </span>
                           </div>
                           <!-- /input-group -->
                       </form>
                   </div>

               </div>
               <!-- /.col-md-3 -->

           </div>
           <!-- /.container -->
       </div>
       <!-- /#content -->

       <?php include 'footer.php'; ?>

   </body>

   </html>