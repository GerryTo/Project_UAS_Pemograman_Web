<?php
    include_once('connect.php');
    $database = new database();
    $result = $database->show_job();
    if(isset($_POST['create'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $password = password_hash ($_POST['password'], PASSWORD_DEFAULT);
        $job = $_POST['role'];
        if($database->register($username,$email,$age,$password,$job))
        {
        header('location:login.php');
        }
    }
?>
<!DOCTYPE html>
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

    <title>Register</title>
</head>
<body>
    <div class="container-reglog">
        <div class="wrapper-reglog">
            <form action="" method="POST">
                <span class="reglog-title">
                    Register
                </span>
                    <div class="admin-content">
                        <div class="content">
                            <form action="" method="POST">
                                <div>
                                    <label>Username</label>
                                    <input type="text" name="username" class="text-input" required>
                                </div>
                                <div>
                                    <label>Email</label>
                                    <input type="email" name="email" class="text-input" placeholder="name@example.com" required>
                                </div>
                                <div>
                                    <label>Age</label>
                                    <input type="text" name="age" class="text-input">
                                </div>
                                <div class>
                                    <label>Password</label>
                                    <input type="password" name="password" class="text-input" id="password" required>
                                    <input type="checkbox" onclick="myFunction()"> Show Password
                                </div>
                                <div>
                                    <label>Occupation</label>
                                    <select name="role" class="text-input" required>
                                    <?php
                                    while($data = mysqli_fetch_array($result)){
                                        $ket="";
                                        if(isset($_GET['role'])){
                                            $job = ($_GET['role']);
                                            if($job==$data['id_job'])
                                            {
                                                $ket="selected";
                                            }
                                        }
                                    ?>
                                    <option <?php echo $ket; ?> value="<?php echo $data['id_job'];?>"><?php echo $data['job'];?></option>
                                <?php
                                    }
                                ?>
                                    </select>
                                </div>
                                <div>
                                    <a href="login.php">
                                        <label class="reglog-link">Already have an account? Please click here to login!</label><br>
                                    </a>
                                    <a href="home.php">
                                        <label class="reglog-link">Return to Homepage.</label>
                                    </a>
                                </div>
                                <div>
                                    <button type="submit" class="btn-reglog btnsize-reglog" name="create" >Register Now!</button>
                                </div>
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