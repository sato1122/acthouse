<?php $page_title = "日本風景"; ?>
<?php include "parts/header.php"; ?>
<img src="image/top5.jpeg" id="sd" class="slidshow" alt="">
<br>

<form name="slide">
<input type="button" value="開始" onclick="slidesw()">
</form>

	<script>

		//画像を格納する配列の作成
		var image = new Array();

		//配列の各要素を画像に特化して、そのパスを記入
		image[0]=new Image();
		image[0].src="image/top5.jpeg";
		image[1]=new Image();
		image[1].src="image/top3.jpeg";
		image[2]=new Image();
		image[2].src="image/top4.jpeg";
		image[3]=new Image();
		image[3].src="image/top6.jpeg";


		var cnt=0;

		function slidesw()
		{

		  //getElementByIdが使える場合のみ後の処理をする
		  if(document.getElementById)
		  {

		    //スライド中はボタンを押せなくする
		    document.slide.elements[0].disabled=true;

		    //id属性が「sd」の画像タグの画像パスを切り替える
		    document.getElementById("sd").src = image[cnt].src;

		    //一つ画像を表示したらカウント用変数cntの値を＋１にする
		    cnt++;

		    //画像が最後まで表示されたか確認
		    if( cnt <= 3 )
		    {
		      //まだ表示されていなければ、setTimeout()で次の画像を表示する
		      var timer1=setTimeout("slidesw()",1500);
		    }
		    else
		    {
		      //全て表示されていたら、ボタンを押せるようにして、タイマーを停止する
		      cnt=0;
		      document.slide.elements[0].disabled=false;
		      clearTimeout(timer1);
		    }
		  }
		}
	</script>
  <nav>
	 	<div id="menu">
			<ul>
				<li><a href="#">TOP</a></li>
				<li><a href="#">ABOUT</a></li>
				<li><a href="#">DIARY</a></li>
				<li><a href="#">BBS</a></li>
			</ul>
		</div>
	</nav>
	<div class="article">
		<div id=main>
			<div class="main">
				<div id="sidemenu">
						<ul>
							<li><a href="#1">カテゴリー１</a></li>
							<li><a href="#1">カテゴリー２</a></li>
							<li><a href="#1">カテゴリー３</a></li>
							<li><a href="#1">カテゴリー４</a></li>
						</ul>
				</div>
			</div>
			<div class="contribution">
					<ul>
						<li><a href="new.php">新規投稿</a></li>
				     <li><a href="index.php?draft">下書き一覧</a></li>
				     <li><a href="pictures.php">画像一覧</a></li>
					</ul>
			</div>
		</div>
			<div class="content">
			<?php
				if (!isset($_GET['o']) or empty($_GET['o']) or $_GET['o'] < 0) {
					$offset = 0;
				} else {
					$offset = $_GET['o'];
				}
				if (isset($_GET['draft'])) {
					$posts = get_drafts($offset);
					$count = get_drafts_count();
					$params = ["draft" => ""];
				} else {
					$posts = get_posts($offset);
					$count = get_posts_count();
					$params = [];
				}
				?>
			<?php
				$limit = get_limit();
				$prev_offset = $offset - $limit;
				$next_offset = $offset + $limit;
			?>
			<?php if ($prev_offset >= 0) : ?>
				<?php
					$params["o"] = $prev_offset;
					link_tag("index.php", '<img src="image/yaji2.png" width="10%" height="5%">' , $params);
				?>
			<?php endif; ?>
			<?php if ($next_offset < $count): ?>
			<?php
					$params["o"] = $next_offset;
					link_tag("index.php", '<img src="image/yaji1.png" width="10%" height="5%">' , $params);
			?>
			<?php endif; ?>
			<div style="border: 1px solid black;">
				<h2>注目記事</h2>
				<?php $main = $posts->fetch(); ?>
				<a href="show.php?id=<?php echo $main['id']; ?>">
					<p><?php echo $main['created_at']; ?></p>
					<h3><?php echo $main['title']; ?></h3>
					<p><?php echo $main['content']; ?></p>
					<img src="image.php?id=<?php echo $main['id'];?>" alt="<?php echo $main['title']; ?>" class="image">
				</a>
			</div>
			<?php foreach($posts as $row) : ?>
				<!-- たくさんのpostを取得してきたものを一つずつのrowに入れて、一つずつ実行していく -->
					<article>
			<?php $likes = $row['likes'];
				if ($likes == 0) : ?>
				<p>Not Goot!</p>
			<?php else : ?>
				<p><?php echo $row['likes']; ?>回 Good! されています</p>
			<?php endif; ?>
						<a href="show.php?id=<?php echo $row['id']; ?>">
							<div>投稿日時:<?php echo $row['created_at'];?></div>
							<div>
								<img src="image.php?id=<?php echo $row['id'];?>" alt="<?php echo $row['title']; ?>" class="image">
							</div>
							<div><?php echo $row['title']; ?></div>
							<?php
								$content = $row['content'];
								if (mb_strlen($content) >= 50) {
								$content = mb_substr($content, 0, 50);
								$content .= '...';
								// $content .= '...' は　$content = $content . '...'  .の意味は　+=
								}
							?>
							<div><?php echo $content; ?></div>
						</a>
					</article>
					<hr>
				<?php endforeach; ?>

		 		<ul class="pagination">
		 		 <li>
						<?php
						for($i =0; $i<$count; $i++) {
							if ($i % $limit == 0) {
								$page = $i / $limit;
								$page_offset = $page * $limit;
								$params['o'] = $page_offset;
								link_tag("index.php", $page +	1, $params);
							}
						}
					?>
				</li>
				</ul>
			</div>
	</div>

<?php include "parts/footer.php"; ?>