<?php $page_title = "投稿されました"; ?>
<?php include "parts/header.php"; ?>
<?php
		 $title = $_POST['title'];
		 $content = $_POST['content'];
		 $id = $_POST['id'];
		if (empty($id)) {
			// 新規作成処理
			$sql = "insert into posts (title, content) values (?,?)";
			$success = get_db()->prepare($sql)->execute(array($title, $content));
			// 画像情報を更新時にidを使用するので、最新のレコードのidwp取得する
			$sql = "select * from posts order by id desc limit 1";
			$post = get_db()->query($sql)->fetch();
			$id = $post['id'];
		} else {
			// 編集処理
			$sql = "update posts set title = ?,content = ? where id = ?";
			$params = array($title, $content, $id);
			$success = get_db()->prepare($sql)->execute($params);
		}
		$image = $_FILES['image'];
		if($image['error'] == 0) {
				$path = "uploads/${id}";
			 // ID ＝１０の場合
			 // $path = "uploads/10";
			 $path = "uploads/${id}";
			 @mkdir($path, 0777, true);
			 // ファイルの名前を取得する
			 $image_name = $image['name'];
			 // ↓ここに、ファイルの拡張子がを取得する
			 $image_type = $image['type'];
			 // $path = "uploads/10/sample.jpeg;
			 $image_path = "${path}/${image_name}";
			 // tmp_nameに一時的に保存されてる所から、自分の好きなところのにmoveする(動かす)
			 move_uploaded_file($image['tmp_name'], $image_path);
			 $sql = "update posts set image_path = ?, image_type = ? where id = ?";
			 $params=array($image_path, $image_type, $id);
			 $success = get_db()->prepare($sql)->execute($params);
			 	// デフォルトでついてる（パブリッシュ）をドラフトに帰る
			 // パブリッシュのものだけ表示する　下書き
		}
		 if (isset($_POST['draft'])) {
		 	$sql = "update posts set status = 'draft' where id = ${id}";
		 	get_db()->query($sql);
		 }
	 ?>
	<p>投稿されました</p>
	<a href="index.php">TOPに戻る</a>	
<?php include "parts/footer.php" ?>