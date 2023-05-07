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
    
    <title>Dashboard Admin - Talks </title>
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
            <a href="create_post.php" class="btn btn-size">Add Post</a>
            <a href="posts.php" class="btn btn-size">Manage Posts</a>
        </div>
        
        <div class="content">
            <h2 class="pg-title title-style">Talks</h2>
            <table>
                <thead>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th colspan="3" align=center >Action</th>
                </thead>
                <?php  
                $query = "SELECT * FROM tb_talks
                        INNER JOIN tb_user on tb_talks.id_author  = tb_user.id";
                $data = mysqli_query($conn,$query);
                while($talks_data = mysqli_fetch_array($data)) {         
                    echo "<tr>";
                    echo "<td>".$talks_data['id']."</td>";
                    echo "<td>".$talks_data['title']."</td>";
                    echo "<td>".$talks_data['username']."</td>";    
                    echo "<td><a href='edit_post.php?id=$talks_data[id]'>Edit</a> | <a href='delete_post.php?id=$talks_data[id]'>Delete</a></td></tr>";        
                }
                ?>
            </table>
        </div>
    </div>
    </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/mydbjs.js"></script>

    </body>
</html>