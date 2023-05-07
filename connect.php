<?php 
class database{
	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "db_portfolio";
	var $koneksi;

 
	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
	}
	function show_job(){
		$show = mysqli_query($this->koneksi,"SELECT * FROM tb_job");
		return $show;
	}
	function register($username,$email,$age,$password,$job)
	{	
		$insert = mysqli_query($this->koneksi,"INSERT INTO tb_user VALUES ('','$username','$email','$age','$password','$job')");
		return $insert;
	}
	function update_user($id,$username,$email,$age,$password,$id_job){
		$update = mysqli_query($this->koneksi, "UPDATE tb_user SET username='$username', email='$email',  age='$age', password = '$password', id_job = '$id_job' where id = '$id'");
		return $update;
	}
	function Show_id_user($id){
		$result = mysqli_query($this->koneksi,"SELECT * FROM tb_user where id = $id");
		return $result;
	}
	function show_user(){
		$show = mysqli_query($this->koneksi,"SELECT * FROM tb_user");
		return $show;
	}
    function login($username,$password,$remember)
	{
		$query = mysqli_query($this->koneksi,"SELECT * from tb_user where username='$username'");
		$data_user = $query->fetch_array();
		if(password_verify($password,$data_user['password']))
		{
			
			if($remember)
			{
				setcookie('username', $username, time() + (60 * 60 * 24 * 5), '/');
			}
			$_SESSION['username'] = $username;
			$_SESSION['is_login'] = TRUE;
			return TRUE;
		}
	}
	function update_talks($id,$title,$author,$date,$isi,$name,$target_file){
		$update= mysqli_query($this->koneksi, "UPDATE tb_talks SET title='$title', author='$author', date='$date', isi='$isi', name='$name', location='$target_file' where id= '$id'");
        return $update;
	}
	function Show_id_talks($id){
		$result = mysqli_query($this->koneksi,"SELECT * FROM tb_talks where id = $id");
		return $result;
	}
	function show_talks(){
		$result = mysqli_query($this->koneksi,"SELECT * FROM tb_talks ORDER BY id ASC");
		return $result;
	}
    function contactus($nama,$email,$subject,$pesan){
        $insert= mysqli_query($this->koneksi, "INSERT INTO tb_contactus VALUES ('', '$nama','$email','$subject','$pesan')");
        return $insert;    
    }
	function talks($title,$author,$date,$isi,$name,$target_file){
		$insert= mysqli_query($this->koneksi, "INSERT INTO tb_talks VALUES ('', '$title','$author','$date','$isi','$name','$target_file')");
        return $insert;
	}
	function conn(){
		return $this->koneksi;
	}
	function relogin($username)
	{
		$query = mysqli_query($this->koneksi,"select * from tb_user where username='$username'");
		$data_user = $query->fetch_array();
		$_SESSION['username'] = $username;
		$_SESSION['is_login'] = TRUE;
	}
} 

 
 
?>