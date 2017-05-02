<?php
includeTmp('header-admin');

global $DB;

$p = $_POST;
$f = $_FILES;

function uploadImage($file)
{
	$img = new Imagick($file['tmp_name']);

	$img->cropThumbnailImage(165, 165);

	$filename = '/imgs/' . time() . '.jpg';

	file_put_contents(ROOT . $filename, $img);

	return $filename;
}

if ($p) {

	$f = $f['image'];

	if ($f) {
		$f = uploadImage($f);
	} else {
		$f = '';
	}

	$DB->query("
INSERT INTO `products` (`id`, `title`, `description`, `cat_id`, `image`, `price`, `rating`, `rated`, `is_active`)
VALUES (NULL, '{$p['title']}', '{$p['description']}', '{$p['cat_id']}', '$f', '{$p['price']}', '0', '', 1);
");

	?>
	<meta http-equiv="refresh" content="0; url=<?= generateUrl('admin/products') ?>"/>
	<?php

}

includeTmp('topbar-admin');
?>

	<form action="<?= generateUrl('admin/product-add') ?>" method="post" enctype="multipart/form-data">
		<div class="col" style="width: 50%; margin: auto;">

			<h4>Title</h4>
			<input type="text" name="title" placeholder="Title" id="" class="textfield textfield__default">

			<h4>Price</h4>
			<input type="number" name="price" placeholder="Price" id="" class="textfield textfield__default">


			<h4>Category</h4>
			<select name="cat_id" id="">
				<?php
				$cats = $DB->query("SELECT * FROM `categories`");
				$cats = $cats->fetchAll();

				for ($i = 0; $i < sizeof($cats); $i++) {
					?>
					<option value="<?= $cats[$i]['id'] ?>"><?= $cats[$i]['title'] ?></option>
					<?php
				}
				?>
			</select>


			<h4>Image</h4>
			<div>
				<input type="file" name="image" id="">
			</div>

			<h4>Description</h4>
			<textarea placeholder="Description" name="description" id="" cols="30" rows="10"
			          class="textfield textfield__default"></textarea>

			<button type="submit" class="button button__default button--primary ">Add</button>
		</div>

	</form>

<?php
includeTmp('footer-admin');
