<html lang="en">
<body>

    <?php
         
        include 'header.php';
        $_SESSION['page'] = 'CHECKOUT2';

        include 'connect.php';
        $conn = connect_to_db();
        $firstname = $lastname = $street = $locality = $city =$state = $country = $pin = $pn = $email = ""; 

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_SESSION["user-id"];
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $street = $_POST["street"];
            $locality = $_POST["locality"];
            $city = $_POST["city"];
            $state = $_POST["state"];
            $country = $_POST["country"];
            $pin = $_POST["zip"];
            $pn = $_POST["phone"];
            $email = $_POST["email"];
        }

        $sql = "INSERT INTO checkout_details VALUES ('$id', '$firstname', '$lastname', '$street', '$locality', '$city', '$state', '$country', '$pin', '$pn', '$email')";
        $result = $conn->query($sql);
        if ($result === FALSE) {
            echo "";
        }

        $conn->close();

    ?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="home.php">Home</a>
                        </li>
                        <li>Checkout - Delivery method</li>
                    </ul>
                </div>

                <div class="col-md-9" id="checkout">

                    <div class="box">
                        <form method="post" action="checkout3.php">
                            <h1>Checkout - Delivery method</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="checkout1.php"><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                <li class="active"><a href="#"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>

                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="box shipping-method">

                                            <h4>Normal delivery</h4>

                                            <p>Get it in 2 or 3 bussiness days - normal option</p>

                                            <div class="box-footer text-center">

                                                <input type="radio" name="delivery" value="delivery1" checked>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="box shipping-method">

                                            <h4>Prime delivery</h4>

                                            <p>Get it right on next day - fastest option possible.</p>

                                            <div class="box-footer text-center">

                                                <input type="radio" name="delivery" value="delivery2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.content -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="basket.html" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Addresses</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Continue to Payment Method<i class="fa fa-chevron-right"></i>
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

        <?php include("footer.php"); ?>

</body>

</html>