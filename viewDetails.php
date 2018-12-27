<?php
require_once "./lib/db.php";

$ProId = $_REQUEST["ID"];

$sql = "Update SanPham Set LuotXem = LuotXem + 1 Where ID=$ProId";
$rs = write($sql);

?>