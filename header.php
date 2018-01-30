<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Shopmobi e-commerce template">
    <meta name="author" content="Darshan Don">
    <meta name="keywords" content="">

    <title>
        ShopMobi: You'll find it here :)
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">



</head>

<body>

    <!-- *** TOPBAR ***
       _________________________________________________________ -->
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer" data-animate="fadeInDown">
                <a href="#" class="btn btn-success btn-sm" data-animate-hover="shake">Offer of the day</a>  <a href="#">Get flat 35% off on orders over ₹15000!</a>
            </div>
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
                        <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                        </li>
             
                    <li><a href="register.php">Register</a>
                    </li>
                    <li><a href="contact.php">Contact</a>
                    </li>
                    <li><a href="#">Recently viewed</a>
                    </li>
                    <?php 
                    session_start();
                    if(isset($_SESSION["username"])) { ?>
                        <li style="font-size: 20px"><a href="#"><?php echo $_SESSION["username"]; ?></a>
                        </li>

                        <?php 
                    }
                    ?>

                </ul>
            </div>
        </div>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" id="email-modal" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password-modal" placeholder="password">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="register.php"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="logout-modal" tabindex="-1" role="dialog" aria-labelledby="Logout" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" id="email-modal" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password-modal" placeholder="password">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="register.php"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div>
        

    </div>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
       _________________________________________________________ -->

       <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="home.php" data-animate-hover="bounce">
                    <img src="img/logo.png" alt="Shopmobi logo" class="hidden-xs">
                    <img src="img/logo-small.png" alt="Shopmobi logo" class="visible-xs"><span class="sr-only">Shopmobi - go to homepage</span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                    <a class="btn btn-default navbar-toggle" href="basket.html">
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs"><?php echo $_SESSION["no-in-cart"] ?> items in cart</span>
                    </a>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="home.php">Home</a>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Xiaomi <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>Mi series</h5>
                                            <ul>
                                                <li><a href="phones.php">Mi 6</a>
                                                </li>
                                                <li><a href="phones.php">Mi 5x</a>
                                                </li>
                                                <li><a href="phones.php">Mi 5s</a>
                                                </li>
                                                <li><a href="phones.php">Mi 5</a>
                                                </li>
                                                <li><a href="phones.php">Mi 4s</a>
                                                </li>
                                                <li><a href="phones.php">Mi 4i</a>
                                                </li>
                                                <li><a href="phones.php">Mi 4</a>
                                                </li>
                                                <li><a href="phones.php">Mi 3</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Redmi Series</h5>
                                            <ul>
                                                <li><a href="phones.php">Redmi 5A</a>
                                                </li>
                                                <li><a href="phones.php">Redmi 4X</a>
                                                </li>
                                                <li><a href="phones.php">Redmi 4 Prime</a>
                                                </li>
                                                <li><a href="phones.php">Redmi 4 </a>
                                                </li>
                                                <li><a href="phones.php">Redmi Pro</a>
                                                </li>
                                                <li><a href="phones.php">Redmi 3X</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Note Series</h5>
                                            <ul>
                                                <li><a href="phones.php">Redmi Note 5A</a>
                                                </li>
                                                <li><a href="phones.php">Redmi Note 4X</a>
                                                </li>
                                                <li><a href="phones.php">Redmi Note 3</a>
                                                </li>
                                                <li><a href="phones.php">Redmi Note 2</a>
                                                </li>
                                                <li><a href="phones.php">Redmi Note 4G</a>
                                                </li>
                                                <li><a href="phones.php">Redmi Note 3G</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Featured</h5>
                                            <ul>
                                                <li><a href="phones.php">Mi A1</a>
                                                </li>
                                                <li><a href="phones.php">Mi Mix 2</a>
                                                </li>
                                                <li><a href="phones.php">Mi Max 2</a>
                                                </li>
                                                <li><a href="phones.php">Mi Mix</a>
                                                </li>
                                                <li><a href="phones.php">Mi Max</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Samsung <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>S series</h5>
                                            <ul>
                                                <li><a href="phones.php">S8 Plus</a>
                                                </li>
                                                <li><a href="phones.php">S8</a>
                                                </li>
                                                <li><a href="phones.php">S7 Edge</a>
                                                </li>
                                                <li><a href="phones.php">S7</a>
                                                </li>
                                                <li><a href="phones.php">S6 Edge</a>
                                                </li>
                                                <li><a href="phones.php">S6</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>JSeries</h5>
                                            <ul>
                                                <li><a href="phones.php">Galaxy J7</a>
                                                </li>
                                                <li><a href="phones.php">Galaxy J7 Pro</a>
                                                </li>
                                                <li><a href="phones.php">Galaxy J5</a>
                                                </li>
                                                <li><a href="phones.php">Galaxy J5 Prime</a>
                                                </li>
                                                <li><a href="phones.php">Galaxy J3</a>
                                                </li>
                                                <li><a href="phones.php">Galaxy J3 Prime</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Note Series</h5>
                                            <ul>
                                                <li><a href="phones.php">Note 8</a>
                                                </li>
                                                <li><a href="phones.php">Note 7</a>
                                                </li>
                                                <li><a href="phones.php">Note 5</a>
                                                </li>
                                                <li><a href="phones.php">Note Edge</a>
                                                </li>
                                                <li><a href="phones.php">Note 4</a>
                                                </li>
                                                <li><a href="phones.php">Note 3</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3" hidden="">
                                            <div class="banner">
                                                <a href="#">
                                                    <img src="img/banner.jpg" class="img img-responsive" alt="">
                                                </a>
                                            </div>
                                            <div class="banner">
                                                <a href="#">
                                                    <img src="img/banner2.jpg" class="img img-responsive" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>

                </ul>

            </div>
            <!--/.nav-collapse -->

            <div class="navbar-buttons">

                <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="cart.php" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm"><?php echo $_SESSION["no-in-cart"] ?> items in cart</span></a>
                </div>
                <!--/.nav-collapse -->

                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>

            <div class="collapse clearfix" id="search">

                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn">

                         <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

                     </span>
                 </div>
             </form>

         </div>
         <!--/.nav-collapse -->

     </div>
     <!-- /.container -->
 </div>
 <!-- /#navbar -->

 <!-- *** NAVBAR END *** -->

</body>
</html>