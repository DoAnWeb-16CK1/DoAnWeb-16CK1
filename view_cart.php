<?php
	require_once "./lib/db.php";
	require_once 'cart.inc';

	if (!isset($_SESSION["dang_nhap_chua"])) {
		$_SESSION["dang_nhap_chua"] = 0;
	}

	if ($_SESSION["dang_nhap_chua"] == 0) {
		header("Location: login.php");
	}
	
	if (isset($_POST["btnCheckOut"])) {
		$o_Total = $_POST["txtTotal"];
		$o_UserID = $_SESSION["current_user"]->f_ID;
		$o_OrderDate = strtotime("+7 hours", time());
		$str_OrderDate = date("Y-m-d H:i:s", $o_OrderDate);
		//$sql = "insert into orders(OrderDate, UserID, Total) values('$str_OrderDate', $o_UserID, $o_Total)";
		$sql = "insert into DatHang(UserID, TongGia, NgayTao) values($o_UserID, $o_Total, '$str_OrderDate')";
		$o_ID = write($sql);

		//
		// order_details

		foreach ($_SESSION["cart"] as $proId => $q) {
			$sql = "select * from SanPham where ID = $proId";
			$rs = load($sql);
			$row = $rs->fetch_assoc();
			$price = $row["Gia"];
			$amount = $q * $price;
			//$d_sql = "insert into orderdetails(OrderID, ProID, Quantity, Price, Amount) values($o_ID, $proId, $q, $price, $amount)";
			$d_sql = "insert into DatHang(ID, UserID, TongGia, TinhTrang, NgayTao) values($o_ID, $proId, $price, $q, $amount)";
			write($d_sql);
		}

		//
		// clear cart
		
		$_SESSION["cart"] = array();
	}
?>
<?php include 'header.php'; ?>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Giỏ hàng của bạn</h3>
					</div>
					<div class="panel-body">
						<form id="f" method="post" action="updateCart.inc.php">
							<input type="hidden" id="txtCmd" name="txtCmd">
							<input type="hidden" id="txtDProId" name="txtDProId">
							<input type="hidden" id="txtUQ" name="txtUQ">
						</form>
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Sản phẩm</th>
									<th>Giá</th>
									<th class="col-md-2">Số lượng</th>
									<th>Thành tiền</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$total = 0;
							foreach ($_SESSION["cart"] as $proId => $q) :
								$sql = "select * from SanPham where MaSP = $proId";
								$rs = load($sql);
								$row = $rs->fetch_assoc();
								$amount = $q * $row["Gia"];
								$total += $amount;
							?>
								<tr>
									<td><?= $row["TenSP"] ?></td>
									<td><?= number_format($row["Gia"]) ?></td>
									<!-- <td><?= $q ?></td> -->
									<td>
										<input class="quantity-textfield" type="text" name="" id="" value="<?= $q ?>">
									</td>
									<td><?= number_format($amount) ?></td>
									<td class="text-right">
										<a class="btn btn-xs btn-danger cart-remove" data-id="<?= $proId ?>" href="javascript:;" role="button">
											<span class="glyphicon glyphicon-remove"></span>
										</a>
										<a class="btn btn-xs btn-primary cart-update" data-id="<?= $proId ?>" href="javascript:;" role="button">
											<span class="glyphicon glyphicon-ok"></span>
										</a>
									</td>
								</tr>
							<?php
							endforeach;
							?>
							</tbody>
							<tfoot>
								<td>
									<a class="btn btn-success" href="#" role="button">
										<span class="glyphicon glyphicon-backward"></span>
										Tiếp tục mua hàng
									</a>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><b><?= number_format($total) ?></b></td>
								<td class="text-right">
									<form method="POST" action="">
										<input type="hidden" name="txtTotal" value="<?= $total ?>">
										<button name="btnCheckOut" type="submit" class="btn btn-primary">
											<span class="glyphicon glyphicon-bell"></span>
											Thanh toán
										</button>
									</form>
								</td>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/jquery-3.1.1.min.js"></script>
	<script src="assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<script src="assets/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
	<script type="text/javascript">
		$('.cart-remove').on('click', function() {
			var id = $(this).data('id');
			$('#txtDProId').val(id);
		    $('#txtCmd').val('D');
		    $('#f').submit();
		});

		$('.cart-update').on('click', function() {

			var q = $(this).closest('tr').find('.quantity-textfield').val();
			$('#txtUQ').val(q);

			var id = $(this).data('id');
			$('#txtDProId').val(id);
		    $('#txtCmd').val('U');

		    $('#f').submit();
		});

		$('.quantity-textfield').TouchSpin({
	        min: 1,
	        max: 69,
	        verticalbuttons: true,
            // step: 1,
            // decimals: 0,
            // boostat: 5,
            // maxboostedstep: 10,
            // postfix: '%'
	    });
	</script>
</body>
</html>