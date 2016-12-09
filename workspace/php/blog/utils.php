<?php
 	function get_db() {
 		// PDO データベースにアクセスするのが　get_db、言語を同じ言語に合わせる
 	 $db = new PDO('mysql:host=localhost;dbname=blog_l;charset=utf8mb4','root','');
 	 // エラーがある場合にそれを知らせてくれる　setAttribute：属性を指定する
 	 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 	 return $db;
 	}
	 // ID を渡して、一つのPOSTを取得する
 	function get_post($id) {
	 $sql = "select * from posts where id ='${id}'";
	 $post = get_db()->query($sql)->fetch();
	 return $post;
	}
	function get_limit() {
		// 表示している記事の数
		return 5;
	}
	// 　２０件あるうちの何番目からを取る　offset=5　場合　5を取得する
	function get_posts($offset){
		$limit = get_limit();
		if ($offset < 0) {
			$offset = 0;
		}
		// {$limit}に表示する記事の数を指定　offset ${offset}　で{}内に始まる数字の最初の数字が来る
		$sql = "select * from posts where status !='draft' order by created_at desc limit ${limit} offset ${offset}";
		$stmt = get_db()->query($sql);
		return $stmt;
	}
	function get_all_posts() {
		$sql = "select * from posts order by created_at desc";
		return get_db()->query($sql);
	}
	// 　下書きのみを取得する　status=draft になっているから
	function get_drafts($offset) {
		$limit = get_limit();
		$sql = "select * from posts where status = 'draft' order by created_at desc limit  ${limit} offset ${offset}";
		return get_db()->query($sql);
	}
	// 下書き以外の記事の数を得る
	function get_posts_count() {
		$sql = "select count(*) as count from posts where status != 'draft'";
		$return = get_db()->query($sql)->fetch();
		return $return['count'];
	}
	// 下書きの記事の数を得る
	function get_drafts_count() {
		$sql = "select count(*) as count from posts where status = 'draft'";
		$return = get_db()->query($sql)->fetch();
		return $return['count'];
	}
	// 　HTMLの　＜a＞と同じ
	function link_tag($url, $label, $params) {
		$qs = "?";
		foreach ($params as $key => $param) {
			$qs = "${qs}${key}=${param}&";
		}
		$url = "${url}${qs}";
		$tag = "<a href='${url}'>${label}</a>";
		echo $tag;
	}
	function is_valid_image($image_path) {
	// ファイルが存在していて、
		return (!empty($image_path) and file_exists($image_path) and !ends_with($image_path));
	}
	function ends_with($str) {
	// 一番最後の文字だけを取得する。　文字数、文字の長さ(最後の文字数−１)
	//  "3" = substr("0123" , 2)
	$end = substr($str, strlen($str) - 1);
	// そして、最後の文字が[/]	なら turu
	return $end == '/';
	}
?>