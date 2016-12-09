<?php
	require 'utils.php';
	$id = $_GET['id'];
	// good!を押されたら、１つ増やす
	$sql = "update posts set likes = likes + 1 where id = ${id}";
	get_db()->query($sql);
	// 一回実行されたら、 show.php に戻る
	$url = "show.php?id=${id}";
	header("Location: ${url}");
	exit();

?>