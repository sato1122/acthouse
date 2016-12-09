<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>編集</title>
</head>
<body>
	<?php
		 $db = new PDO('mysql:host=localhost;dbname=acthouse;charset=utf8mb4','root','');
	 	 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 	 if (isset($_POST['id'])){
	 	 	$sql = "update student set name = ?, gender = ?, age = ? where id = ?";
	 	 	$id = $_POST['id'];
	 	 	$name = $_POST['name'];
	 	 	$gender = $_POST['gender'];
	 	 	$age = $_POST['age'];
	 	 	$stmt = $db->prepare($sql);
	 	 	$success = $stmt->execute(array($name, $gender, $age, $id));
	 	 	// index.php　というURLに戻す　処理後に飛ばしたい場所のURLを書く　変更ボタンを押すと飛んでいく
	 	 	header("Location: index.php");
	 	 	exit();
	 	 }


	 	 	// URLの最後にある　id＝数字　を取得する
	 	 $id = $_GET['id'];
	 	 // id を　画面上に表示する　ダブルコーテーション（””）の時のみ表示　シングルコーテーション（’’）の時は表示されない
	 	 $sql = "select * from student where id =${id}";
	 	 $student = $db->query($sql)->fetch();
	 ?> 
	 <form action="" method="post">
	 	<input type="text" name="name" value="<?php echo $student['name']; ?>">
	 	<input type="text" name="gender" value="<?php echo $student['gender']; ?>">
	 	<input type="text" name="age" value="<?php echo $student['age']; ?>">
	 	<input type="hidden" name="id" value="<?php echo $student['id']; ?>">
	 	<button>変更</button>
	 </form>
</body>
</html>