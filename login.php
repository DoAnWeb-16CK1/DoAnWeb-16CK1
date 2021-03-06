<?php
	session_start();
	if (!isset($_SESSION["dang_nhap_chua"])) {
		$_SESSION["dang_nhap_chua"] = 0;
	}

	require_once './lib/db.php';

	if (isset($_POST["btnLogin"])) {
		$username = $_POST["txtUserName"];
		$password = $_POST["txtPassword"];
		$enc_password = $password;//md5($password);

		$sql = "select * from NguoiDung where UserName = '$username' and Password = '$enc_password'";
		$rs = load($sql);
		if ($rs->num_rows > 0) {
			$_SESSION["current_user"] = $rs->fetch_object();
			$_SESSION["dang_nhap_chua"] = 1;
			header("Location: index.php");
		} else {
			// sinh viên xử lý show_alert
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Đăng Nhập</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.7-dist/css/bootstrap.min.css">
</head>
<body>
	<br>
	<br>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<form method="post" action="">
					<div class="form-group">
						<label for="txtUserName">Tên đăng nhập:</label>
						<input type="text" class="form-control" id="txtUserName" name="txtUserName" placeholder="Tên đăng nhập">
					</div>
					<div class="form-group">
						<label for="txtPassword">Mật khẩu:</label>
						<input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Mật khẩu">
					</div>
					<button type="submit" class="btn btn-success btn-block" name="btnLogin">
						<span class="glyphicon glyphicon-user"></span>
						Đăng nhập
					</button>
				</form>
			</div>
		</div>
	</div>
	<script src="assets/jquery-3.1.1.min.js"></script>
	<script src="assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>