<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Our Home</title>
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
                    <li class="active">
                        <a href="home.php">Home</a>
                    </li>
                    <li>
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
                    <h2>Home</h2>
                </div>
            </div>
            </nav>

            <div id="article">
                <header class="text-center">
                    <h1 class="display-4">Welcome to Our Website!</h1>
                    <p class="font-italic mb-0">Portfolio website about design graphic.</p>
                    <p class="font-italic">We hope you enjoy your visit here.</p>
                    <p class="font-italic">To know us, please look at
                        <a href="about.html" class="text-dark">
                            <u>About Us</u>
                        </a>
                    </p>
                </header>
                
            <div class="py-3">
                <div class="row">
                    <!-- 1st Hover Image -->
                    <div class="col-lg-6 mb-3 mb-lg-0">
                        <div class="hover hstyle text-white"><a href="modern.php"><img src="design/combine.jpg" alt="">
                                <div class="hoverlay"></div>
                                    <div class="hcontent px-5 py-4">
                                <h3 class="font-weight-bold mb-0 text-uppercase"> <span class="font-weight-light">Portfolio </span>Modern Design</h3>
                            <p class="hdesc mb-0">This's a modern graphic design that we have created!</p>
                          </div>
                        </div></a>
                     </div>
                    <!-- 2nd Hover Image -->
                    <div class="col-lg-6 mb-3 mb-lg-0">
                        <div class="hover hstyle text-white"><a href="vintage.php"><img src="design/vintage.jpg" alt="">
                              <div class="hoverlay"></div>
                                    <div class="hcontent px-5 py-4">
                                <h3 class="font-weight-bold mb-0 text-uppercase"> <span class="font-weight-light">Portfolio </span>Vintage Design</h3>
                            <p class="hdesc mb-0">This's a vintage graphic design that we have created!</p>
                          </div>
                        </div></a>
                      </div>
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