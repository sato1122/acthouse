<?php
// $ の後は数字はダメ　○=a1 ×=1a  大文字と小文字は違うモノとして扱われる
$a = <<<EOT
　「フィンテック（FinTech）」という言葉が昨今、メディアを賑わしている。金融（finance）と技術（technology）の融合を意味する造語で、金融の世界に革命をもたらすとも言われている。日本ではまだ馴染みが薄いかもしれないが、ビットコインのような仮想通貨は日本でも知られるようになった。
EOT;
//<<<ETO （内容）　ETO; で長いテキストを表示できる
?>
<?php require "utuls.php"; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
 	<?php
 	
 	 // 下は、テキストに何も入ってない時に何も指示をしない
 	 if (isset($_POST['name'])){
	 	 $insert_sql = "insert into student (name, gender, age) value (?, ?, ?)";
	 	 // 入力したものがPOSTで送られてくるので、それをはてなの中で入手できる
	 	 // 下のは、はてなの中の順番を決める
	 	 $name = $_POST['name'];
	 	 $gender = $_POST['gender'];
	 	 $age = $_POST['age'];
	 	 $stmt = $db->prepare($insert_sql);
	 	 // 入力されたものを　db　のところで一時保存し準備する
	 	 $success = $stmt->execute(array($name, $gender, $age));
	 	 // 上は、dbで保存し、準備したものを実行する時に名前と性別と年齢のところに当てはめる
	 	 // ー＞は次の関数を呼び出している

		 // foreach ($stmt as $row) {
	 	 // print_r($row);
	 	 // }
		 }
		 	$sql = 'select * from student';
		 // $get_db で utuls.phpに書いている　function get_db()　の中身を取ってくる
		 	$stmt = $get_db->query($sql);
	 		?>
 	
 	<style>
 		table {border-collapse: collapse; }
 		table td {
 			border: 1px solid gray;
 		}
 	</style>
 	<table>
 	  <tr>
 	  	<td>id</td>
 	  	<td>名前</td>
 	  	<td>性別</td>
 	  	<td>年齢</td>
 	  </tr>
 	  <!--  foreach でサーバーの中を１項目ずつ[id.name,gendre,age]を読み込み、終われば次の情報に行く-->
 		<?php foreach ($stmt as $row) { ?>
 		 <tr>
 		  <td><?php echo $row['id'];?></td>
 		  <td><?php echo $row['name'];?></td>
 		  <td><?php echo $row['gender'];?></td>
 		  <td><?php echo $row['age'];?></td>
 		  <td>
 		  	<a href="edit.php?id=<?php echo $row['id'];?>">編集</a>
 		  	<a href="delete.php?id=<?php echo $row['id'];?>">削除</a>
 		  </td>
 		  </tr>
 		<?php }?>
 	</table>
 	<div>
 		<form action="" method="post">
 			名前：<input type="text" name="name">
 			性別：<input type="text" name="gender">
 			年齢：<input type="text" name="age">
 			<button>作成</button>
 		</form>
 	</div>

  <hr>
	<pre>
		<?php
		// 配列の中に配列を書くことができる,多次元配列
		 $arr = array(
			 	'red' => array('apple', 'cherry'),
			 	'yellow' => array('banana', 'mongo'),
			 	'purple' => 'grape'
		 	);
		 // $arr['red'][1]　で　cherry　を取ることができる.二つないので $arr['purple']　だけで　grape　が取れる。
		 print_r($arr)
		?>
	</pre>

	<hr>
	<pre>
		<?php
		// 連想配列
		 $arr = array('red' => 'apple', 'yellow' => 'banana', 'orange' => 'orange');
		 // $arr['red'] で apple が取れる
		 // jqueryの場合{ "red": "apple"}
		 print_r($arr)
		?>
	</pre>

	<hr>
	<pre>	
		<?php
		// php　の配列
			$arr = array('apple','banana','cherry');
		// $srr['0']でアップルが取れる。前から[0,1,2]	
			print_r($arr)
		?>
	</pre>

	<hr>
	<!-- 下のはスーパーグーバル変数、どこからもアクセスできる。サーバーと行ってこいをだけをする -->
	<h4>$_SERVER</h4>
	<pre><?php print_r($_SERVER); ?></pre>
	<h4>$_GET</h4>
	<pre><?php print_r($_GET); ?></pre>
	<h4>$_POST</h4>
	<pre><?php print_r($_POST); ?></pre>
	<h4>$_FILES</h4>
	<pre><?php print_r($_FILES); ?></pre>
	<h4>$_COOKIE</h4>
	<pre><?php print_r($_COOKIE); ?></pre> 

	<form action="/php/" method="post" enctype="multipart/form-data">
	<!--method="post"　だから　POSTの所に表示される、method="get"に変えれば　GET　に表示される  -->
		<input type="text" name="texit1" value="テスト">
		<input type="radio" name="radio1" value="r1">R1
		<input type="radio" name="radio2" value="r2">R2	
		<input type="radio" name="radio3" value="r3">R3
		<input type="file" name="file">
		<button>送信</button>
	</form>

	<?php echo($a); ?>
</body>
</html>