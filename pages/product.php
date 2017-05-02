<?php
global $DB, $config;

$id = $_GET['id'];
$p = $_POST;

$u = new User();

$udata = $u->getData();

$d = $DB->query("SELECT * FROM `products` WHERE `id` = $id");

$product = $d->fetch();

$config['title'] = 'Product';

if ($p['rating']) {


	$rating = intval($product['rating']);
	$rating2 = intval($p['rating']);

	$rated = json_decode($product['rated'], true);

	if(!$rated) $rated = [];

	$rated[] = [
		'id' => $udata['id'],
		'rating' => $rating2,
	];

	$new_rating = 0;

	for($i=0; $i < sizeof($rated); $i++) {
		$new_rating += $rated[$i]['rating'];
	}

	$new_rating = $new_rating / sizeof($rated);


	$rated_json = json_encode($rated);

	$DB->query("
UPDATE `products` SET `rating` = '{$new_rating}', `rated` = '{$rated_json}' WHERE `id` = {$product['id']}
");

	$d = $DB->query("SELECT * FROM `products` WHERE `id` = $id");

	$product = $d->fetch();
}


includeTmp('header');


?>

<div class="wrapper__fixed wrapper__global">

	<section class="page">
		<?php
		includeTmp('sidebar');
		?>

		<section class="content">
			<div class="sideblock sideblock__full">
				<div class="sideblock__title">
					<span class="sideblock__title-label">
						<?= $product['title'] ?>
					</span>

					<div class="product__price"><?= generatePrice($product['price']) ?></div>
				</div>

				<div class="sideblock__content" style="align-items: center; text-align: center;">
					<div class="box">
						<img src="<?=$product['image']?>" alt="">
					</div>

					<div class="box">

						<?=$product['description']?>

					</div>

					<div class="box">
						<h4>Rating: <?= $product['rating'] ?></h4>

						<?php
						$l_rated = json_decode($product['rated'], true);

						$is_rated = false;

						if($l_rated) {
							for($i=0; $i<sizeof($l_rated); $i++) {

								if($l_rated[$i]['id'] === $udata['id']) {
									$is_rated = true;
									break;
								}

							}
						}
						?>

						<?php
						if(!$is_rated) {
							?>

						<form action="" method="post">
							<select name="rating" id="">
								<?php
								$a = 1;

								for($i = 1; $i <= 5; $i++ ) {
									?>
									<option value="<?=$i ?>"><?=$i ?></option>
									<?php
								}

								?>
							</select>

							<button type="submit" class="button--primary button">Rate</button>
						</form>

							<?php
						}
						?>
					</div>
				</div>
			</div>
		</section>

	</section>
</div>


<?php
includeTmp('footer');
?>
