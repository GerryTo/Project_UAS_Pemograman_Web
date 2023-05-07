<?php
  session_start();
  include_once('connect.php');
  $database = new database();
  if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(isset($_POST['remember'])){
      $remember = TRUE;
    }
    else{
      $remember = FALSE;
    }
    if($database->login($username,$password,$remember))
    {
      header('location:posts.php');
    }
  }
  if(isset($_SESSION['is_login']))
  {
    header('location:posts.php');
  }
 
  if(isset($_COOKIE['username']))
  {
    $database->relogin($_COOKIE['username']);
    header('location:posts.php');
  }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" type="image/x-icon" href="Images/icon.png"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/reglog.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">

    <title>Login</title>
</head>
  <body>
    <div class="container-reglog">
        <div class="wrapper-reglog">
            <form method="post">
                <span class="reglog-title">
                    Login
                </span>

                <div class="admin-content">
                    <div class="content">
                        <form action="" method="post">
                            <div>
                                <label>Username/Email</label>
                                <input type="text" class="text-input" name="username"required>
                            </div>
                            <div>
                                <label>Password</label>
                                <input type="password" class="text-input" id="password" name="password" required>
                                <input type="checkbox" onclick="myFunction()"> Show Password
                            </div>
                            <div>
                                <a href="register.php">
                                    <label class="reglog-link">Don't have an admin or writter account yet? Please click here to Register!</label><br>
                                </a>
                                <a href="home.php">
                                    <label class="reglog-link">Return to Homepage.</label>
                                </a>
                            </div>
                                <button type="submit" class="btn-reglog btnsize-reglog" name="login">Login Now!</button>
                        </form>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="js/mydbjs.js"></script>
</body>
</html>