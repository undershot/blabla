<?php
includeTmp('header-admin');

global $DB;

$p = $_POST;
$f = $_FILES;
$id = $_GET['id'];

$d = $DB->query("SELECT * FROM `products` WHERE `id` = $id");

$product = $d->fetch();

function uploadImage($file) {
	$img = new Imagick($file['tmp_name']);

	$img->cropThumbnailImage(165, 165);

	$filename = '/imgs/' . time() . '.jpg';

	file_put_contents(ROOT . $filename, $img);

	return $filename;
}

if ($p) {
	$f = $f['image'];

	if ($f['size']) {
		$f = uploadImage($f);
	} else {
		$f = $product['image'];
	}



	$is_active = $p['is_active'] ? 1 : 0;

	$DB->query("
UPDATE `products` SET `title` = '{$p['title']}', `description` = '{$p['description']}', `price` = '{$p['price']}', `cat_id` = '{$p['cat_id']}', `image` = '{$f}', `is_active` = {$is_active} WHERE `id` = $id
");

	?>
	<meta http-equiv="refresh" content="0; url=<?= generateUrl('admin/products') ?>"/>
	<?php

}

includeTmp('topbar-admin');
?>

	<form action="" method="post" enctype="multipart/form-data">
		<div class="col" style="width: 50%; margin: auto;">

			<h4>Title</h4>
			<input type="text" name="title" placeholder="Title" id="" value="<?=$product['title']?>" class="textfield textfield__default">

			<h4>Price</h4>
			<input type="number" name="price" placeholder="Price" id="" value="<?=$product['price']?>" class="textfield textfield__default">


			<h4>Category</h4>
			<select name="cat_id" id="">
				<?php
				$cats = $DB->query("SELECT * FROM `categories`");
				$cats = $cats->fetchAll();

				for ($i = 0; $i < sizeof($cats); $i++) {
					?>
					<option value="<?= $cats[$i]['id'] ?>" <?= $cats[$i]['id'] === $product['cat_id'] ? ' selected' : '' ?>><?= $cats[$i]['title'] ?></option>
					<?php
				}
				?>
			</select>


			<h4>Image</h4>
			<div>
				<img src="<?=$product['image']?>" alt="">

				<input type="file" name="image" id="">
			</div>

			<h4>Product active</h4>
			<div>
				<input type="checkbox" name="is_active" value="1" <?=$product['is_active'] === '1' ? ' checked' : '' ?> id=""> Is Active
			</div>

			<h4>Description</h4>
			<textarea placeholder="Description" name="description" id="" cols="30" rows="10"
			          class="textfield textfield__default"><?=$product['description']?></textarea>

			<button type="submit" class="button button__default button--primary ">Edit</button>
		</div>

	</form>

<?php
includeTmp('footer-admin');
