<?php
    $koneksi = mysqli_connect('localhost','root','', 'db_portfolio',);

    $id = $_GET['id'];
    
    $delete = mysqli_query($koneksi, "DELETE FROM tb_user WHERE id='$id'");
    if ($delete > 0) {
        echo '<script>alert("Data user berhasil dihapus, Terima kasih");window.location.href="users.php"</script>';
     }
?>