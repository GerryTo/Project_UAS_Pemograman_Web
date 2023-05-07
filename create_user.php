<?php
    session_start();
    if($_SESSION['is_login']!= true){
        header("location:login.php?pesan=belum_login");
    }
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
        header('location:users.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" 
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/mydbstyle.css">
    <link rel="stylesheet" href="css/admin.css">
    
    <title>Dashboard Admin - Add User </title>
</head>

<body>
    <header>
        <div class="logo">
            <h1 class="logo-text">DASHBOARD</h1>
        </div>
        
        <i class="fa fa-bars menu-toggle"></i>
        <ul class="nav">
            <li>
                <a>
                    <i class="fa fa-user"></i> <?php echo $_SESSION['username']?> <i class="fa fa-chevron-down"></i>
                </a>
                <ul>
                    <li><a href="posts.php">Dashboard</a></li>
                    <li><a href="logout.php" class="logout" style="color: #F98888;">Logout</a></li>
                </ul>
            </li>
        </ul>
    </header>
    
    <!-- dashboard admin -->
    <div class="admin-wrapper">
        
    <!-- Left Sidebar -->
    <div class="left-sidebar">
        <ul>
            <li><a href="posts.php" style="color: white;">Talks</a></li>
            <li><a href="users.php" style="color: white;">Users</a></li>
        </ul>
    </div>
    
    <!-- Admin Content -->
    <div class="admin-content">
        <div class="button-group">
            <a href="create_user.php" class="btn btn-size">Add User</a>
            <a href="users.php" class="btn btn-size">Manage Users</a>
        </div>
        
        <div class="content">
            <h2 class="pg-title title-style">New User Gonna Join!!</h2>
            <form action="" method="post">
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
                    <button type="submit"name="create"class="btn btn-size">Join!</button>
                </div>
            </form>
        </div>
    </div>
    </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
        <script src="js/mydbjs.js"></script>
    </body>
</html>