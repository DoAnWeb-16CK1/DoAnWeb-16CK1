<?php 
	require_once "./lib/db.php";
	require_once 'cart.inc';
	if (!isset($_SESSION["dang_nhap_chua"])) {
		$_SESSION["dang_nhap_chua"] = 0;
	}

	if ($_SESSION["dang_nhap_chua"] == 0) {
		header("Location: login.php");
	}
?>
<?php include 'header.php'; ?>
<h1>Thông tin khách hàng</h1>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Profile</h3>
					</div>
					<div class="panel-body">
						Nội dung khách hàng hiển thị ở đây
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/jquery-3.1.1.min.js"></script>
	<script src="assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>