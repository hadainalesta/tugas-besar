<?php
session_start();
include '../koneksi/connection.php';
?>
<!DOCTYPE html>
<html>
<head>
		<meta name="viewport" content="width=device-width, initial-scale=2">
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="../style/css/bootstrap.min.css" >
		<link rel="stylesheet" href="../style/style.css" >
		
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		  <script src="../style/js/bootstrap.min.js"></script>
</head>
<body class="log">
	<div class="col-sm-4 col-sm-offset-4 form">
<div class="outter-form">
         <div class="logo-login">
             <em class="glyphicon glyphicon-user"></em>
         </div>
	<form action="" method="post" class="inner-login">
		 <h3 class="text-center title-login">Login Pegawai</h3>
		 <div class="form-group">
				<input type="text" name="username"  class="form-control" value="Masukkan Username"  onclick="this.value=''" >
			</div>
			<div class="form-group">
			
				<input type="password" name="password"  class="form-control" value="Masukkan Password" onclick="this.value=''">
			</div>
			
				<input type="submit" name="login" value="login" class="btn btn-block btn-custom-green">
	</form>
</div>
</div>
	<?php
	if (isset($_POST['login'])) {
	
		$username=$_POST['username'];
		$password=$_POST['password'];
		$data_pgw=mysqli_query($connection, "SELECT *FROM pegawai WHERE usernamePgw='$username' AND passwordPgw='$password'");
		$r=mysqli_fetch_array($data_pgw);
		$usernamePgw=$r['usernamePgw'];
		$passwordPgw=$r['passwordPgw'];
		if($username==$usernamePgw && $password==$passwordPgw)
		{
			$k=mysqli_query($connection, "SELECT namaPgw FROM pegawai WHERE usernamePgw='$usernamePgw'");
			$j=mysqli_fetch_array($k);
			$nik=$r['nikPgw'];
			$name=$r['namaPgw'];
			$_SESSION['nama']=$name;
			$_SESSION['nik']=$nik;
			header('location:../pegawai/index.php?nik='.$nik);
		}
		else{
				header('location:../login/login.php');
			}

	}
?>
	

</body>
</html>
