<?php
	$page_title = "画像一覧";
	include "parts/header.php"
?>
<div class="container">
<?php foreach (get_all_posts(0) as $row) : ?>
	<?php if (is_valid_image($row['image_path'])) : ?>
	<div class="row">
		<div class="col-xs-3">
		 <a href="show.php?id=<?php echo $row['id']; ?>" class="thumbnail">
		 	<img src="image.php?id=<?php echo $row['id']; ?>" alt="<?php echo $row['title']; ?>" class="image">
		 </a>
		</div>
	<?php endif; ?>
<?php endforeach; ?>
	</div>
</div>
<?php include "parts/footer.php" ;?>
