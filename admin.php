<?php
session_start();
//include connect.php page for database connection
include('connect.php');
include('functions.php');
include('upload.php');
if (isset($_SESSION['error'])) {
    $a = $_SESSION['error'];
}
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
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top navbar-shrink">
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
                        <a class="page-scroll" href="/">Home</a>
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
    <!-- About Section -->
    <section id="admin">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wow fadeInUp">
                    <h2 class="section-heading">Admin Page</h2>
                    <!-- change this before deploying-->
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" name="upload_portfolio" id="upload_portfolio" enctype="multipart/form-data" action="admin.php">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Title *" id="title" required data-validation-required-message="Please enter the title.">
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Category *" id="phone" required data-validation-required-message="Please enter the category.">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Description *" id="description" required data-validation-required-message="Please enter the Description" style="height: 200px"></textarea>
                                </div>
                                <input type="text" name="_gotcha" style="display:none" />
                                <div class="clearfix"></div>
                                <div class="row">
                                    <div class="col-lg-6 text-left">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-primary btn-file">
                                                    Add Album Cover&hellip; <input type="file" name="album_cover" required data-validation-required-message="Please upload album cover.">
                                                </span>
                                            </span>
                                            <input type="text" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 text-left">
                                        <p></p>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-primary btn-file">
                                                    Add Photos&hellip; <input type="file" name="album_photos[]" required data-validation-required-message="Please upload photos." multiple>
                                                </span>
                                            </span>
                                            <input type="text" class="form-control" readonly>
                                        </div>
                                        <p></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 text-left">
                                        <div id="success">
                                            <p>
                                                <?php
                                                if (isset($_GET['result']) && $_GET['result'] == "success") {
                                                echo "You have successfully uploaded your portfolio!";
                                                }
                                                if (isset($_GET['result']) && $_GET['result'] == "failed") {
                                                foreach ($errors as $err) {
                                                echo $err;
                                                }
                                                }
                                                if (!isset($_GET['result'])) {
                                                foreach ($errors as $err) {
                                                echo $err;
                                                }
                                                }

                                                ?>
                                            </p>
                                        </div>

                                        <input id="submit" type="submit" class="btn btn-xl" value="Upload!"></>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section -->
    <footer class="bg-black">
        <div class="container">
            <span class="copyright">
                Twist Photography &copy; 2013-
                <script>document.write(new Date().getFullYear())</script>
            </span>
        </div>
    </footer>
    <!-- Wow so much doge animation -->
    <script src="js/wow.min.js"></script>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/admin.js"></script>
</body>
</html>