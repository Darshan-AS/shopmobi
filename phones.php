<html lang="en">
<body>

    <?php 
        include 'header.php';
        $_SESSION['page'] = 'PHONES';
    ?>
     <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="home.php">Home</a>
                        </li>
                        <li>Phones</li>
                    </ul>
                </div>

               <?php include("sidebar.php"); ?>

                <div class="col-md-9">
                    <div class="box">
                        <h1 style="margin: 10px;">All Smartphones</h1>
                        <p style="margin-bottom: 0px;">Purchase your first smartphone on Shopmobi and get extra 10% off on your next smartphone purchase!!</p>
                    </div>

                    <div class="box info-bar">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 products-showing">
                                Showing <strong>6</strong> of <strong>25</strong> products
                            </div>

                            <div class="col-sm-12 col-md-8  products-number-sort">
                                <div class="row">
                                    <form class="form-inline">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="products-number">
                                                <strong>Show</strong>  <a href="#" class="btn btn-default btn-sm btn-primary">6</a>  <a href="#" class="btn btn-default btn-sm">12</a>  <a href="#" class="btn btn-default btn-sm">All</a> products
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="products-sort-by">
                                                <strong>Sort by</strong>
                                                <select name="sort-by" class="form-control">
                                                    <option>Price</option>
                                                    <option>Name</option>
                                                    <option>Sales first</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row products">

                    <?php
                        include("connect.php");
                        $conn = connect_to_db();

                        $sql = "SELECT phone_id, phone_name, prize, img_front, img_rear FROM smartphone";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) { 
                    ?>
            
                        <div class="col-md-4 col-sm-6">
                            <div class="product" style="padding-top: 10px;">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php?id=<?php echo $row["phone_id"];?>">
                                                <img src="img/<?php echo $row["img_front"];?>" alt="" class="img-responsive center-block" style="height:337.313px; " >
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
                                    <h3 style="margin: 0px;"><a href="detail.php"><?php echo $row["phone_name"]; ?></a></h3>
                                    <p class="price"><?php echo $row["prize"]; ?></p>
                                    <p class="buttons">
                                        <a href="detail.php?id=<?php echo $row["phone_id"];?>" class="btn btn-default">View detail</a>
                                        <a href="cart.php?phone-id=<?php echo $row["phone_id"];?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>
                                </div>
                                <!-- /.text -->
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
                       
                    <div class="pages">

                        <p class="loadMore">
                            <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a>
                        </p>

                        <ul class="pagination">
                            <li><a href="#">&laquo;</a>
                            </li>
                            <li class="active"><a href="#">1</a>
                            </li>
                            <li><a href="#">2</a>
                            </li>
                            <li><a href="#">3</a>
                            </li>
                            <li><a href="#">4</a>
                            </li>
                            <li><a href="#">5</a>
                            </li>
                            <li><a href="#">&raquo;</a>
                            </li>
                        </ul>
                    </div>


                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

        <?php include("footer.php"); ?>


</body>

</html>