<form action="post.php" method="post" enctype="multipart/form-data">
	<div>
		<label for="title">タイトル
			<input type="text" name="title" value="<?php echo $post['title']; ?>">
	 	</label>
	</div>
	<div>
		<label for="content">内容
			<textarea name="content" id="" cols="30" rows="10">
				<?php echo $post['content']; ?>
			</textarea>
		</label>
	</div>
	<div>
		<label for="image">写真
			<input type="file" name="image">
			</label>
	<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
	</div>
	<div>
		<label for="draft">
			<?php $draft = $post['status'] == "draft"; ?>
			<input type="checkbox" name="draft" value="true" <?php echo $post['id']; ?>">下書き
		</label>
	</div>
		<button>作成</button>
</form>