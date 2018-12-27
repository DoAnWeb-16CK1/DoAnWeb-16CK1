<?php
	require_once "./lib/db.php";
	if (!isset($_GET["id"])) {
		header('Location: index.php');
	}
	require_once 'cart.inc';
	if (!isset($_SESSION["dang_nhap_chua"])) {
		$_SESSION["dang_nhap_chua"] = 0;
	}

	if ($_SESSION["dang_nhap_chua"] == 0) {
		header("Location: login.php");
	}
?>
<?php include 'header.php'; ?>
				<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Sản phẩm</h3>
						</div>
						<div class="panel-body">
							<div class="row">
							<?php
								$id = $_GET["id"];
								$sql = "select * from SanPham where NhaSanXuatID = $id";
								$rs = load($sql);
								if ($rs->num_rows > 0) : 
									while ($row = $rs->fetch_assoc()) :
							?>
										<div class="col-sm-6 col-md-4">
											<div class="thumbnail">
												<img src="imgs/sp/<?= $row["LoaiSP"] ?>/<?= $row["MaSP"] ?>.jpg" alt="...">
												<div class="caption">
													<h5><?= $row["TenSP"] ?></h5>
													<h4>Giá: <?= number_format($row["Gia"]) ?> VNĐ</h4>
													<p style="height: 20px">Xuất xứ: <?= $row["XuatXu"] ?></p>
													<p style="height: 20px">Tình trạng: <?= $row["TinhTrang"] ?></p>
													<br>
													<p>
														<a href="details.php?id=<?= $row["ID"] ?>" class="btn btn-primary" role="button">
															Chi tiết
														</a>
														
														<form method="post" action="addItemToCart.inc.php">
														<input type="hidden" name="txtProID" value="<?= $row["MaSP"] ?>">
														<input type="hidden" class="form-control" value="1" name="txtQuantity" id="txtQuantity">
																<button class="btn btn-danger" name="btnAddItemToCart">
																<span class="glyphicon glyphicon-shopping-cart"></span>
																Đặt mua
																</button>
		
														</form>
														
													</p>
												</div>
											</div>
										</div>
							<?php 
									endwhile;
								else :
							?>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										Không có sản phẩm nào.
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
	</body>
</html>