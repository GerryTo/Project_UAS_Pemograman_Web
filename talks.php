<?php
    include_once('connect.php');
    $database = new database();
    $data = $database->show_talks();
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Talks</title>
        <link rel="shortcut icon" type="image/x-icon" href="Images/icon.png"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://kit.fontawesome.com/8c16a9b77f.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <!-- Bagian Sidebar -->
        <div class="wrapper">
            <nav id="sidebar">
                <div class="sb-header">
                    <a href="home.html">
                        <img src="Images\logo5.png" width="100%" height="auto">
                    </a>
                </div>
                <!-- Menu dalam Sidebar -->
                <ul class="list-unstyled">
                    <li>
                        <a href="home.php">Home</a>
                    </li>
                    <li class="active">
                        <a href="talks.php">Talks</a>
                    </li>
                    <li>
                        <a href="#portfolio" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Portfolio</a>
                        <ul class="collapse list-unstyled" id="portfolio">
                            <li>
                                <a href="modern.php">Modern Design</a>
                             </li>
                            <li>
                                <a href="vintage.php">Vintage Design</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="contactus.php">Contact Us</a>
                    </li>
                    <div class="col -md-3 smed">
                        <a href="https://www.instagram.com/_itssnow/?hl=id"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.facebook.com/andreas.yuliantoii"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/gerryytnt"><i class="fab fa-twitter"></i></a>
                    </div>
                </ul>
            </nav>

            <!-- Isi Halaman -->
            <div id="content">
                <div class="navback">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid">
                            <!-- Button Collapse untuk Menu -->
                            <button type="button" id="sidebarCollapse" class="btn btn-outline-secondary">
                                <i class="fas fa-align-left"></i>
                                <span>Menu</span>
                            </button>
                            <h2>Talks</h2>
                        </div>
                    </nav>
                    </div>

                <div id="article">
                        <header class="text-center">
                            <h1 class="display-4">Welcome to Our Talks!</h1>
                            <p class="font-italic mb-0">We talk everything here about our team daily life, design tutorial, and many more.</p>
                            <p class="font-italic">We hope you enjoy it, thank you very much!</p>
                        </header>
                    <div class="row">
                        <div class="col-lg-7 mx-auto">
                            <?php
                               while($talks_data = mysqli_fetch_array($data)){
                                                                                                                                                                                       
                            ?>
                            <h2 class="h5 mb-0"><?php echo $talks_data['title']?></h2><span class="date"><?php echo $talks_data['date']?></span>
                            <!-- <div class="card" style="background: #f1f1f1; border: none ;width: 650px;">
                                <div class="card-body" style= "padding:0">
                                    <p class="card-text font" ><?php echo $talks_data['isi']?></p>
                                </div>
                            </div> -->
                            <div class="card mb-3" style="max-width: 1000px;background: #f1f1f1; border: none ">
                                <div class="row no-gutters">
                                    <div class="col-md-12">
                                    <div class="card-body" style= "padding:0px 0px 0px 0px">
                                        <p class="card-text"><?php echo $talks_data['isi']?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                                if(!empty($talks_data['name'])){
                                    $video = $talks_data['location'];
                            ?>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="<?php echo $talks_data['location']?>"></iframe>
                                </div>
                            <?php
                            }
                            ?>
                            <hr>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Javascript -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <script src="js/myjs.js"></script>
    </body>
</html>