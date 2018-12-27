<?php
	require_once "./lib/db.php";
	require_once 'cart.inc';

	if (!isset($_GET["id"])) {
		header('Location: index.php');
	}
?>
<?php include 'header.php'; ?>
<h1>Chi tiết sản phẩm</h1>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Chi tiết sản phẩm</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<?php
								$id = $_GET["id"];
								$sql = "select * from SanPham where ID = $id";
								$rs = load($sql);
								if ($rs->num_rows > 0) :
									$row = $rs->fetch_assoc();
							?>
							<div class="col-md-12">
								<img src="imgs/sp/<?= $row["LoaiSP"] ?>/<?= $row["MaSP"] ?>.jpg" alt="...">
							</div>
							<div class="col-md-12">
								<h3><?= $row["TenSP"] ?></h3>
							</div>
							<div class="col-md-12">
								<h3>Giá: <?= number_format($row["Gia"]) ?> VNĐ</h3>
							</div>
							<div class="col-md-12">
								Mô tả chi tiết sản phẩm: <h3><?= $row["MoTa"] ?></h3>
							</div>
							<div class="col-md-4 col-sm-4">
								<form method="post" action="addItemToCart.inc.php">
									<div class="input-group">
										<input type="hidden" name="txtProID" value="<?= $_GET["id"] ?>">
										<input type="text" class="form-control" value="1" name="txtQuantity" id="txtQuantity">
										<span class="input-group-btn">
											<button class="btn btn-success" type="submit" name="btnAddItemToCart">
												<span class="glyphicon glyphicon-plus"></span>
											</button>
										</span>
									</div>
								</form>
							</div>
							<?php
								else :
							?>
							<div class="col-md-12">
								Không có sản phẩm thoả điều kiện.
							</div>
							<?php
								endif;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/jquery-3.1.1.min.js"></script>
	<script src="assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<script src="assets/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
	<script type="text/javascript">
		$(function () {
			$('#txtQuantity').TouchSpin({
				min: 1,
				max: 69
				// step: 1,
				// decimals: 0,
				// boostat: 5,
				// maxboostedstep: 10,
				// postfix: '%'
			});
		});
	</script>
</body>
</html>