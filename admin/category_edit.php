<?php
	require_once './lib/db.php';

	$show_alert = 0;

	if (!isset($_GET["id"])) {
		header('Location: categories.php');
	}

	if (isset($_POST["btnUpdate"])) {
		$u_id = $_POST["txtCatID"];
		$u_name = $_POST["txtCatName"];
		$u_sql = "update categories set CatName = '$u_name' where CatID = $u_id";
		write($u_sql);
		$show_alert = 1;
	}

	if (isset($_POST["btnDelete"])) {
		$d_id = $_POST["txtCatID"];
		$d_sql = "delete from categories where CatID = $d_id";
		write($d_sql);
		header('Location: categories.php');
	}


	$id = $_GET["id"];
	$sql = "select * from categories where CatID = $id";
	$rs = load($sql);
	$name = "";
	while ($row = $rs->fetch_assoc()) {
		$name = $row["CatName"];
	}





	// if (isset($_POST["btnAdd"])) {
	// 	$name = $_POST["txtCatName"];
	// 	$sql = "insert into categories(CatName) values('$name')";
	// 	write($sql);

	// 	$show_alert = 1;
	// }
?>


<!DOCTYPE html>
<html>
<head>
	<title>Chỉnh sửa danh mục</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.7/css/bootstrap.min.css">
</head>
<body>
	<br>
	<br>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
			<?php if ($show_alert == 1) : ?>
				<div class="alert alert-success" role="alert">
					<strong>Well done!</strong> You successfully read this important alert message.
				</div>
			<?php endif; ?>
				<form method="post" action="" name="frmEdit">
					<div class="form-group">
						<label for="txtCatID">#</label>
						<input type="text" class="form-control" id="txtCatID" name="txtCatID" readonly value="<?= $id ?>">
					</div>
					<div class="form-group">
						<label for="txtCatName">Tên danh mục</label>
						<input type="text" class="form-control" id="txtCatName" name="txtCatName" placeholder="Quần áo" value="<?= $name ?>">
					</div>
					<a class="btn btn-primary" href="categories.php" role="button" title="Về thôi">
						<span class="glyphicon glyphicon-backward"></span>
					</a>
					<button type="submit" class="btn btn-success" name="btnUpdate">
						<span class="glyphicon glyphicon-check"></span>
						Chỉnh sửa
					</button>
					<button type="submit" class="btn btn-danger" name="btnDelete">
						<span class="glyphicon glyphicon-remove"></span>
						Xoá luôn
					</button>
				</form>
			</div>
		</div>
	</div>
	<script src="assets/jquery-3.1.1.min.js"></script>
	<script src="assets/bootstrap-3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(function() {
		    $('#txtCatName').focus();
		});
	</script>
</body>
</html>