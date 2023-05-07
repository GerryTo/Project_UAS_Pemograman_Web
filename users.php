<?php
    session_start();
    if($_SESSION['is_login']!= true){
        header("location:login.php?pesan=belum_login");
    }
    include_once('connect.php');
    $database = new database();
    $conn = $database->conn();
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
    
    <title>Dashboard Admin - Users </title>
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
            <h2 class="pg-title title-style">Users List</h2>
            <table>
                <thead>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Occupation</th>
                    <th colspan="2">Action</th>
                </thead>    
                <?php  
                $query = "SELECT * FROM tb_user
                        INNER JOIN tb_job on tb_user.id_job  = tb_job.id_job";
                $data = mysqli_query($conn,$query);
                while($user_data = mysqli_fetch_array($data)) {         
                    echo "<tr>";
                    echo "<td>".$user_data['id']."</td>";
                    echo "<td>".$user_data['username']."</td>";
                    echo "<td>".$user_data['job']."</td>";    
                    echo "<td><a href='edit_user.php?id=$user_data[id]'>Edit</a> | <a href='delete_user.php?id=$user_data[id]'>Delete</a></td></tr>";        
                }
                ?>
            </table>
        </div>
    </div>
    </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="../../js/mydbjs.js"></script>

    </body>
</html>