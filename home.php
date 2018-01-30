<!DOCTYPE html>
<html lang="en">
<body>


    <?php 
    include 'header.php';
    $_SESSION['page'] = 'HOME';
    ?>

    <div id="all">

        <div id="content">

            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider">
                        <div class="item">
                            <img src="img/main-slider1.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/main-slider2.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/main-slider3.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/main-slider4.jpg" alt="">
                        </div>
                    </div>
                    <!-- /#main-slider -->
                </div>
            </div>

            <!-- *** ADVANTAGES HOMEPAGE ***
               _________________________________________________________ -->

               <div id="advantages">

                <div class="container">
                    <div class="same-height-row">
                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-heart"></i>
                                </div>

                                <h3><a href="#">We love our customers</a></h3>
                                <p>We are known to provide best possible service ever.</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-tags"></i>
                                </div>

                                <h3><a href="#">Genuine Prize</a></h3>
                                <p>Genuine products with genuine prizes.</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-thumbs-up"></i>
                                </div>

                                <h3><a href="#">100% satisfaction guaranteed</a></h3>
                                <p>Free returns on everything for 3 months.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container -->

            </div>
            <!-- /#advantages -->

            <!-- *** ADVANTAGES END *** -->

            <!-- *** HOT PRODUCT SLIDESHOW ***
               _________________________________________________________ -->
               <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Hot Flagships</h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="product-slider">

                        <?php 
                        include("connect.php");
                        $conn = connect_to_db();

                        $sql = "SELECT phone_id, phone_name, prize, img_front, img_rear FROM smartphone ORDER BY prize DESC LIMIT 10";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                                // output data of each row
                            while($row = $result->fetch_assoc()) { 
                                ?>

                                <div class="item">
                                    <div class="product" style="padding-top: 10px">
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
                                        <!-- /.text -->

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
                    <div class="text">
                        <p class="buttons" style="text-align: center;">
                            <a href="phones.php" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>View All</a>
                        </p>
                    </div>
                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->

            <!-- *** HOT END *** -->

            <!-- *** BLOG HOMEPAGE ***
               _________________________________________________________ -->
               <script>
                    // When the user scrolls down 20px from the top of the document, show the button
                    window.onscroll = function() {scrollFunction()};

                    function scrollFunction() {
                        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                            document.getElementById("myBtn").style.display = "block";
                        } else {
                            document.getElementById("myBtn").style.display = "none";
                        }
                    }

                    // When the user clicks on the button, scroll to the top of the document
                    function topFunction() {
                        document.body.scrollTop = 0;
                        document.documentElement.scrollTop = 0;
                    }
                </script>


               <div class="box text-center" data-animate="fadeInUp">
                <div class="container">
                    <div class="col-md-12">
                        <h3 class="text-uppercase">DBMS Mini Project</h3>

                        <p class="lead">Topic: <strong><a href="#" onclick="topFunction();">Shopmobi</a></strong>- Online mobile shopping site.
                            <br>
                            Submitted by:
                        </p>
                    </div>
                </div>
            </div>

            <div class="container">

                <div class="col-md-12" data-animate="fadeInUp">

                    <div id="blog-homepage" class="row">
                        <div class="col-sm-6">
                            <div class="post" style="text-align: center;">
                                <h4><a href="#">Darshan A S</a></h4>
                                <hr>
                                <table class="col-md-12" style="margin-left: 15px; margin-right: 15px;">
                                    <tr><strong>1CR15CS049</strong></tr>
                                    <br>
                                    <tr>5th semester, section A</tr>
                                    <br>
                                    <tr>Computer Science and Engineering</tr>
                                    <br>
                                    <tr>CMR Institute of technology, Bangalore - 560037</tr>
                                    <br>
                                    <tr><strong>+91 8884311135 &nbsp &nbsp<a href="mailto:">darshandon.das465@gmail.com</a></strong></tr>
                                </table>
                                
                                <p class="read-more"><a href="#" class="btn btn-primary">know more</a>
                                </p>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="post" style="text-align: center;">
                                <h4><a href="post.html">Anjali</a></h4>
                                <hr>
                                <table class="col-md-12" style="margin-left: 15px; margin-right: 15px;">
                                    <tr><strong>1CR15CS026</strong></tr>
                                    <br>
                                    <tr>5th semester, section A</tr>
                                    <br>
                                    <tr>Computer Science and Engineering</tr>
                                    <br>
                                    <tr>CMR Institute of technology, Bangalore - 560037</tr>
                                    <br>
                                    <tr><strong>+91 78996199145 &nbsp &nbsp<a href="mailto:">anjali.amuje@gmail.com</a></strong></tr>
                                </table>
                                <p class="read-more"><a href="#" class="btn btn-primary">Know more</a>
                                </p>
                            </div>

                        </div>

                    </div>
                    <!-- /#blog-homepage -->
                </div>
            </div>
            <!-- /.container -->

            <!-- *** BLOG HOMEPAGE END *** -->


        </div>
        <!-- /#content -->


        <?php include("footer.php"); ?>

    </div>
</body>
</html>