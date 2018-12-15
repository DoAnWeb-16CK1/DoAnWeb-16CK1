<?php
	require_once "./lib/db.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Danh mục</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<a class="btn btn-primary" href="category_add.php" role="button">
					<span class="glyphicon glyphicon-plus"></span>
					Thêm danh mục
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Danh mục</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$sql = "select * from categories";
						$rs = load($sql);
						while ($row = $rs->fetch_assoc()) :
					?>
							<tr>
								<td><?= $row["CatID"] ?></td>
								<td><?= $row["CatName"] ?></td>
								<td class="text-right">
									<a class="btn btn-default btn-xs" href="category_edit.php?id=<?= $row["CatID"] ?>" role="button">
										<span class="glyphicon glyphicon-pencil"></span>
									</a>
									<a class="btn btn-danger btn-xs" href="category_delete.php?id=<?= $row["CatID"] ?>" role="button">
										<span class="glyphicon glyphicon-remove"></span>
									</a>
								</td>
							</tr>
					<?php
						endwhile;
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script src="assets/jquery-3.1.1.min.js"></script>
	<script src="assets/bootstrap-3.3.7/js/bootstrap.min.js"></script>
</body>
</html>