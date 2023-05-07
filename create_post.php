<?php
session_start();
if($_SESSION['is_login']!= true){
    header("location:login.php?pesan=belum_login");
}
include_once('connect.php');
$database = new database();
$result = $database->show_user();
if(isset($_POST['create']))
{
    $title = $_POST['title'];
    $date = $_POST['date'];
    $isi = $_POST['isi'];
    $author = $_POST['author'];
    $maxsize = 52428800;
    $name = $_FILES['file']['name'];
    $target_dir = "video/";
    $target_file = $target_dir . $_FILES["file"]["name"];
    $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extensions_arr = array("mp4","avi","3gp","mov","mpeg");
    if( in_array($videoFileType,$extensions_arr) ){
        if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
            echo "File too large. File must be less than 50MB.";
            }
        else{
            move_uploaded_file($_FILES['file']['tmp_name'],$target_file);
        }
    }
    if($database->talks($title,$author,$date,$isi,$name,$target_file)){
        header('location:posts.php');
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
    
    <title>Dashboard Admin - Create Talks </title>
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
            <h2 class="pg-title title-style">Making a post...</h2>
            <form action="" method="post" enctype='multipart/form-data'>
                <div>
                    <label>Title</label>
                    <input type="text" name="title" class="text-input">
                </div>
                <div>
                    <label>Author</label>
                    <select name="author" class="text-input" required>
                    <?php
                    while($data = mysqli_fetch_array($result)){
                        $ket="";
                        if(isset($_GET['author'])){
                            $author = ($_GET['author']);
                            if($author==$data['id'])
                            {
                                $ket="selected";
                            }
                        }
                    ?>
                    <option <?php echo $ket; ?> value="<?php echo $data['id'];?>"><?php echo $data['username'];?></option>
                    <?php
                         }
                    ?>
                    </select>
                </div>
                <div>
                    <label>Date and Time</label>
                    <input type="text" id="currentDateTime" name="date" class="text-input">
                </div>
                <div>
                    <label>Content</label>
                    <textarea name="isi" id="content"></textarea>
                </div>
                <div>
                    <label>Video</label>
                    <input type="file" name="file" class="text-input">
                </div>
                <div>
                    <button type="submit" name="create" class="btn btn-size">Add Post</button>
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