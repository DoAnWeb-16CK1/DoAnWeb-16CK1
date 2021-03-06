<!DOCTYPE html>
<html>
<head>
	<title>Online shop</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.7-dist/css/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">
					<span class="glyphicon glyphicon-home"></span>
				</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">ĐIỆN THOẠI <span class="sr-only">(current)</span></a></li>
					<li><a href="#">TABLET</a></li>
					<li><a href="#">LAPTOP</a></li>
					<li><a href="#">PHỤ KIỆN</a></li>
					<li><a href="#">ĐỒNG HỒ</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">LIÊN HỆ <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">Separated link</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">One more separated link</a></li>
						</ul>
					</li>
				</ul>
				<form class="navbar-form navbar-left">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Bạn muốn tìm gì...">
					</div>
					<button type="submit" class="btn btn-default">TÌM KIẾM</button>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="view_cart.php">
						<span class="glyphicon glyphicon-shopping-cart"></span>
						Giỏ hàng (<?= get_total_items() ?>)
					</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b><?= $_SESSION["current_user"]->UserName ?></b> <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="profile.php">Thông tin cá nhân</a></li>
							<li><a href="#">Đổi mật khẩu</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="logout.php">Thoát</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Danh mục</h3>
					</div>
					<div class="list-group">
					<?php
						$sql = "select * from DanhMuc";
						$rs = load($sql);
						while ($row = $rs->fetch_assoc()) :
					?>
							<a href="productsByCat.php?id=<?= $row["ID"] ?>" class="list-group-item"><?= $row["Ten"] ?></a>
					<?php
						endwhile;
					?>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Nhà sản xuất</h3>
					</div>
					<div class="panel-body">
					<div class="list-group">
					<?php
						$sql = "select * from NhaSanXuat";
						$rs = load($sql);
						while ($row = $rs->fetch_assoc()) :
					?>
							<a href="productsByCatNSX.php?id=<?= $row["ID"] ?>" class="list-group-item"><?= $row["Ten"] ?></a>
					<?php
						endwhile;
					?>
					</div>
					</div>
				</div>
			</div>
</nav>