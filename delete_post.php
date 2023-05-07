<?php
    $koneksi = mysqli_connect('localhost','root','', 'db_portfolio',);

    $id = $_GET['id'];
	$result = mysqli_query($koneksi,"SELECT * FROM tb_talks where id = $id");
	$talks_data = mysqli_fetch_array($result);
    $files=$talks_data['location'];
    
    if (file_exists($files)){
        unlink($files);
    }
    $delete = mysqli_query($koneksi, "DELETE FROM tb_talks WHERE id='$id'");
    if ($delete > 0) {
        echo '<script>alert("Data Talks berhasil dihapus, Terima kasih");window.location.href="posts.php"</script>';
     }
?>