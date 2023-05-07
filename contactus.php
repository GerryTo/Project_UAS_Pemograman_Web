<?php
include_once('connect.php');
$database = new database();
if(isset($_POST['contactus'])){
    if($_POST['firstname'] !="" && $_POST['lastname'] != "" && $_POST['email'] != "" && $_POST['subject'] != "" && $_POST['pesan'] != ""){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $nama = $firstname . ' ' . $lastname; 
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $pesan = $_POST['pesan'];
        if($database->contactus($nama,$email,$subject,$pesan))
        {
            header('location:home.php');
        }
     }
     else{
        echo '<script>alert("Mohon isi semua data");window.location.href="contactus.php"</script>';
     }
}

?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Contact Us</title>
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
                        <img src="Images/Logo5.png" width="100%" height="auto">
                    </a>
                </div>
                <!-- Menu dalam Sidebar -->
                <ul class="list-unstyled">
                    <li>
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
                    <li class="active">
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
                            <h2>Contact Us</h2>
                        </div>
                    </nav>
                </div>

                <div id="article">
                    <header class="text-center">
                        <h1 class="display-4">Hi There!</h1>
                        <p class="font-italic mb-0">Here's contact form so that you can ask anything related to design.</p>
                        <p class="font-italic">You can also use our services by sending a request.</p>
                    </header>

                    <form method="POST" action="" onsubmit="validasi()">
                        <div class="row">
                            <div class="col">
                                <label>Name</label>
                            </div>
                        </div>
                        <div class="row form-group">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="First Name" id="firstName" name="firstname" >
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Last Name" id="lastName" name="lastname" >
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" >
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" >
                        </div>
                        <div class="form-group">
                            <label for="textarea">Message</label>
                            <textarea class="form-control" id="textarea" name="pesan" rows="10" ></textarea>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <label for="file">Upload File</label>
                                <input type="file" class="form-control-file" id="file">
                            </div>
                            <div class="col col-auto">
                                <button type="submit" class="btn btn-light mb-2 button-us" name= "contactus" id="submit" >Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        

        <!-- Javascript -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <script src="js/myjs.js"></script>
    </body>
</html>