<?php
    //include connect.php page for database connection
    include('connect.php');
    include('functions.php')
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Twist Photography - Captures all your moment</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/twist.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/baguetteBox.min.css">
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link rel="icon" type="image/png" href="img/favicon.png" />
        <link rel="icon" href="img/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" sizes="180x180" href="img/logos/apple-touch-icon.png">
        <link rel="apple-touch-icon" href="img/logos/apple-touch-icon.png">
        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css">
                
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
                    <!--[if lt IE 9]>
                                                                                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                                                                                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
                                                                            <![endif]-->
    </head>

    <body id="page-top" class="index">
        <!-- Loading -->
        <div id="overlay">
            <div class="overlay-center">
                <i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px; margin:0 auto;"></i>
            </div>
        </div>
        <!-- Navigation -->
        <nav id="navigation" class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top" style="padding: 0;"><img src="img/logos/twist.png" width="56" alt="Twist Photography SG" /></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#page-top">Home</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#about">About</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#portfolio">Portfolio</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <!-- Header -->
        <header>
            <div class="container-fluid">
                <div class="intro-text">
                    <div class="intro-heading">Twist Photography</div>
                    <p>Captures all your moments! Coverage of parties, outdoor shoot, events, and wedding!</p>
                    <ul class="list-inline social-buttons">

                        <li>
                            <a href="https://www.facebook.com/twistphotography/"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/twistphotographysg/"><i class="fa fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- About Section -->
        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 wow fadeInUp">
                        <h2 class="section-heading">About</h2>
                        <h3 class="section-subheading text-muted text-justify">Twist Photography was founded in 2013. In the eyes of our photographers. We focus in details, and documenting a beautiful and memorable scene for your lifetime. In the years of building the business, Twist Photography has documented a couple of events ranging from corporate to consumer.</h3>
                    </div>
                    <div class="col-lg-6 text-center wow fadeInUp">
                        <img class="img-responsive center-block" src="img/about.jpg" alt="About Us">

                    </div>
                </div>
            </div>
        </section>

        <!-- Portfolio Grid Section -->
        <section id="portfolio" class="bg-black">
            <div class="container">
                <div class="row">
                    <div class="row">
                    <div class="col-lg-4 col-lg-push-8 text-center color-white wow fadeInUp">
                        <h2 class="section-heading">Portfolio</h2>
                        <h3 class="section-subheading text-muted">Twist Photography specializes in event coverage such as Corporate Seminars & Conference, Company Annual Diner & Dance, Concert &  Performance, sport events. Consumer's event coverage like Actual-Day Wedding, Birthday Parties, Solemnization, Baby shower and celebrations.</h3>
                    </div>

                    <!-- Grid starts here-->
                    
                    <?php writeGrid();?>
                    </div>
                    <div class="row">
                    <div class="col-lg-7">
                        <div class="text-pagination wow fadeInUp">
                            <ul class="pagination ">
                                <?php writePagination();?>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5"></div>
                    </div>
                </div>
                <div class="row">

                </div>
            </div>
        </section>
        <!-- Contact Section -->
        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-left wow fadeInUp">
                        <h2 class="section-heading">Contact</h2>
                        <h4 class="section-subheading "><i class="fa fa-envelope"></i> twistphotography@outlook.sg</h4>
                        <h4 class="section-subheading "><i class="fa fa-phone"></i> +65 9128 4233</h4>
                        <h3 class="section-subheading text-muted">
                        Do you have any questions on your mind?
                            <br />
                        Why not leave us an enquiry and we will get back to you as soon as possible!
                        </h3>
                        <form name="sentMessage" id="contactForm" novalidate>
                            <!-- change this before deploying-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Your Email *" id="email" name="_replyto" required data-validation-required-message="Please enter your email address.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <input type="text" name="_gotcha" style="display:none" />
                                    <div class="clearfix"></div>
                                    <div class="col-lg-12 text-center">
                                        <div id="success"></div>
                                        <button type="submit" class="btn btn-xl">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 top-buffer-25 wow fadeInUp">
                        <?php if($empty_promo == FALSE){?>
                        <img class="img-responsive" src="<?php echo $promo_url; ?>" alt="Special Offer!" />
                        <?php }  ?>
                    </div>
                </div>
                <div class="row">

                </div>
            </div>
        </section>

        <!-- Footer Section -->
        <footer class="bg-black">
            <div class="container">
                <span class="copyright">
                Twist Photography &copy; 2013-<script>document.write(new Date().getFullYear())</script>
                </span>

            </div>
        </footer>

        <!-- Portfolio Modals -->
        <!-- Use the modals below to showcase details about your portfolio projects! -->
        <?php writeLightBox();?>

        <!-- Wow so much doge animation -->
        <script src="js/wow.min.js"></script>
        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script src="js/classie.js"></script>
        <script src="js/cbpAnimatedHeader.js"></script>

        <!-- Contact Form JavaScript -->
        <script src="js/jqBootstrapValidation.js"></script>
        <script src="js/contact_me.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/baguetteBox.min.js"></script>
        <script src="js/twist.js"></script>

    </body>

</html>
