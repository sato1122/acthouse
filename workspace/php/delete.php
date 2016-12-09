<?php
 	 $db = new PDO('mysql:host=localhost;dbname=acthouse;charset=utf8mb4','root','');
 	 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 	 $id = $_GET['id'];
 	 // edit　の　"update student set　name = ?, gender = ?, age = ? where id = ?"が　はてなだから　そこに合わせる
 	 $sql = "delete from student where id = ?";
 	 $stmt = $db->prepare($sql);
 	 // execute　の後は　配列しか書いてはいけない　array　は配列を書くスタートの意味なので例え一つでも書かないといけない
	 $success = $stmt->execute(array($id));
 	 header("Location: index.php");
 	 exit();
 ?>