<?php

require_once './lib/db.php';

if (isset($_GET["id"])) {
	$id = $_GET["id"];
	$sql = "delete from categories where CatID = $id";
	write($sql);
	header('Location: categories.php');
}