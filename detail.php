<html lang="en">
<body>

    <?php 
    include 'header.php';
    $_SESSION['page'] = 'DETAIL';

    include("connect.php");
    $conn = connect_to_db();

    $sql = "SELECT phone_name, ram, internal, resolution, battery, display_size, camera, processor, os, prize, brand, img_front, img_rear  FROM smartphone WHERE phone_id =" . $_GET['id'] .";";
    $result = $conn->query($sql);
    $details = $result->fetch_assoc();
    ?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="home.php">Home</a>
                        </li>
                        <li><a href="phones.php">Phones</a>
                        </li>
                        <li><?php echo $details["phone_name"]; ?></li>
                    </ul>

                </div>

                <?php 
                include 'sidebar.php';
                ?>

                <div class="col-md-9">

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage" style="border-radius: 30px;">
                                <img src="img/<?php echo $details["img_front"]; ?>" alt="" class="img-rounded img-responsive" style="border-radius: 30px;">
                            </div>

                            <div class="ribbon sale">
                                <div class="theribbon">SALE</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                            <div class="ribbon new">
                                <div class="theribbon">NEW</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->   
                        </div>

                        <div class="col-sm-6">
                            <div class="box">
                                <h1 class="text-center"><?php echo $details["phone_name"]; ?></h1>
                                <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, Features and Specifications</a>
                                </p>
                                <p class="price"><?php echo $details["prize"]; ?></p>

                                <p class="text-center buttons">
                                    <a href="cart.php?phone-id=<?php echo $_GET['id'];?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a> 
                                    <a href="basket.html" class="btn btn-default"><i class="fa fa-heart"></i> Add to wishlist</a>
                                </p>


                            </div>

                            <div class="row center" id="thumbs">
                                <div class="col-xs-4">
                                    <a href="img/<?php echo $details["img_front"]; ?>" class="img-rounded thumb" style="border-radius: 15px;">
                                        <img src="img/<?php echo $details["img_front"]; ?>" alt="" class="img-rounded img-responsive" style="border-radius: 15px;">
                                    </a>
                                </div>
                                <div class="col-xs-4">
                                    <a href="img/<?php echo $details["img_rear"]; ?>" class="img-rounded thumb" style="border-radius: 15px;">
                                        <img src="img/<?php echo $details["img_rear"]; ?>" alt="" class="img-rounded img-responsive" style="border-radius: 15px;">
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="box" id="details">
                        <p>
                            <h4>Product details</h4>
                            <table class="col-md-12" style="margin-left: 15px; margin-right: 15px;">
                                <tr>
                                    <td>Model Name</td>
                                    <td><?php echo $details["phone_name"]; ?></td>
                                </tr>
                                <tr>
                                    <td>Display size</td>
                                    <td><?php echo $details["display_size"]; ?></td>
                                </tr>
                                <tr>
                                    <td>Resolution</td>
                                    <td><?php echo $details["resolution"]; ?></td>
                                </tr>
                                <tr>
                                    <td>Operating System</td>
                                    <td><?php echo $details["os"]; ?></td>
                                </tr>
                                <tr>
                                    <td>Processor</td>
                                    <td><?php echo $details["processor"]; ?></td>
                                </tr>
                                <tr>
                                    <td>Internal Storage</td>
                                    <td><?php echo $details["internal"]; ?></td>
                                </tr>
                                <tr>
                                    <td>RAM</td>
                                    <td><?php echo $details["ram"]; ?></td>
                                </tr>
                                <tr>
                                    <td>Camera</td>
                                    <td><?php echo $details["camera"]; ?></td>
                                </tr>
                                <tr>
                                    <td>Battery capacity</td>
                                    <td><?php echo $details["battery"]; ?></td>
                                </tr>
                                <tr>
                                    <td>Brand</td>
                                    <td><?php echo $details["brand"]; ?></td>
                                </tr>
                            </table>
                        </p>
                        
                        <blockquote>
                            <p><em>Our Smartphones are smarter than you</em>
                            </p>
                        </blockquote>

                        <hr>
                        <div class="social">
                            <h4>Show it to your friends</h4>
                            <p>
                                <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                            </p>
                        </div>
                    </div>

                    <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height">
                                <h3>You may also like these products</h3>
                            </div>
                        </div>

                        <?php 

                        $brand = $details["brand"];
                        $sql = "SELECT phone_id, phone_name, prize, img_front, img_rear FROM smartphone WHERE brand = '$brand' ORDER BY prize DESC LIMIT 3;";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                                    // output data of each row
                            while($row = $result->fetch_assoc()) { 
                                ?>
                                <div class="col-md-3 col-sm-6">
                                    <div class="product same-height" style="padding-top: 10px">
                                       <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front">
                                                <a href="detail.php?id=<?php echo $row["phone_id"];?>">
                                                    <img src="img/<?php echo $row["img_front"];?>" alt="" class="img-responsive center-block" style="height:337.313px;">
                                                </a>
                                            </div>
                                            <div class="back">
                                                <a href="detail.php?id=<?php echo $row["phone_id"];?>">
                                                    <img src="img/<?php echo $row["img_rear"];?>" alt="" class="img-responsive center-block" style="height:337.313px;">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="detail.php" class="invisible">
                                        <img src="img/<?php echo $row["img_front"];?>" alt="" class="img-responsive" style="height:337.313px;">
                                    </a>
                                    <div class="text">
                                        <h3 style="margin: 0px;"><a href="detail.php?id=<?php echo $row["phone_id"];?>"><?php echo $row["phone_name"]; ?></a></h3>
                                        <p class="price"><del><?php echo 1.1*$row["prize"]; ?></del> <?php echo $row["prize"]; ?></p>
                                    </div>
                                </div>
                                <!-- /.product -->
                            </div>

                            <?php    
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    ?>
                </div>

            </div>



        </div>
        <!-- /.col-md-9 -->
    </div>
    <!-- /.container -->

    <!-- /#content -->

    <?php include("footer.php"); ?>

</body>

</html>