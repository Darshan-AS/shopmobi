<html lang="en">
<body>

    <?php
         
        include 'header.php';
        $_SESSION['page'] = 'CHECKOUT4';

        include 'connect.php';
        $conn = connect_to_db();
        $user = $_SESSION["user-id"];

        if(isset($_POST["payment"])) {
            $type = $_POST["payment"];
            $total = $_SESSION['subtotal'] + $_SESSION['shipping-cost'] + $_SESSION['tax'];
            date_default_timezone_set('Asia/Kolkata');
            $date = date('Y-m-d H:i:s');

            $sql = "INSERT INTO payment (user, amount, payment_type, date) VALUES ('$user', '$total', '$type', '$date')";
            $result = $conn->query($sql);
            if ($result === FALSE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    ?>

    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Checkout - Order review</li>
                    </ul>
                </div>

                <?php 
                    $sql = "SELECT s.phone_name AS phone_name, c.quantity AS quantity, s.prize AS prize, s.img_front AS img_front, s.img_rear AS img_rear FROM smartphone s, cart c WHERE s.phone_id = c.phone_id AND c.user_id = '$user';";
                    $result = $conn->query($sql);
                ?>

                <div class="col-md-9" id="checkout">

                    <div class="box">
                        <form method="post" action="home.php">
                            <h1>Checkout - Order review</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="checkout1.php"><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                <li><a href="checkout2.php"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                </li>
                                <li><a href="checkout3.php"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li>
                                <li class="active"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>

                            <div class="content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Product</th>
                                                <th>Quantity</th>
                                                <th>Unit price</th>
                                                <th>Discount</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    $total = 0;
                                                    while($row = $result->fetch_assoc()) {    
                                            ?>

                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="img/<?php echo $row["img_front"] ?>" alt="White Blouse Armani">
                                                    </a>
                                                </td>
                                                <td><a href="#"><?php echo $row["phone_name"]; ?></a>
                                                </td>
                                                <td><?php echo $row["quantity"]; ?></td>
                                                <td>&#8377 <?php echo $row["prize"]; ?></td>
                                                <td>&#8377 0.00</td>
                                                <td>&#8377 <?php echo $row["prize"]; ?></td>
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
                                                <th colspan="2">&#8377 <?php echo $_SESSION['subtotal']; ?></th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.content -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="checkout3.html" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Payment method</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Place an order<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->


                </div>
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

                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

        <?php include 'footer.php'; ?>

</body>

</html>