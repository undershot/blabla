<?php
global $config, $DB;

$config['title'] = 'E-shop';

includeTmp('header');

$cat_id = $_GET['cat_id'];

if (!$cat_id) {
	$p = $DB->query('SELECT * FROM `products` WHERE `cat_id` = 1 AND `is_active` = 0 ORDER BY `id` DESC LIMIT 0,4');
	$speakers = $p->fetchAll();

	$p = $DB->query('SELECT * FROM `products` WHERE `cat_id` = 1 AND `is_active` = 0 ORDER BY `id` DESC LIMIT 0,4');
	$computer = $p->fetchAll();

	$p = $DB->query('SELECT * FROM `products` WHERE `cat_id` = 1 AND `is_active` = 0 ORDER BY `id` DESC LIMIT 0,4');
	$smartphone = $p->fetchAll();
} else {
	$p = $DB->query("SELECT * FROM `products` WHERE `cat_id` = $cat_id AND `is_active` = 0 ORDER BY `id` DESC LIMIT 0,4");
	$cat_products = $p->fetchAll();

	$cat = $DB->query("SELECT * FROM `categories` WHERE `id` = $cat_id");
	$cat = $cat->fetch();
}


?>

<div class="wrapper__fixed wrapper__global">

	<section class="page">
		<?php
		includeTmp('sidebar');
		?>

		<section class="content">

			<?php
			if ($cat_id) {
				?>
				<div class="sideblock sideblock__full">
					<div class="sideblock__title __pink">
					<span class="sideblock__title-label">
						<?= $cat['title'] ?>
					</span>
					</div>

					<div class="sideblock__content">

						<ul class="sideblock__products-list products__list">
							<?php
							for ($i = 0; $i < sizeof($cat_products); $i++) {
								?>
								<li class="sideblock__products-item">
									<a href="#" class="image__wrapper">
										<img src="<?= $cat_products[$i]['image'] ?>" class="product__image"
										     alt="<?= $cat_products[$i]['title'] ?>">
									</a>

									<div class="product__brief">
										<a href="<?= generateUrl('product') . '&id=' . $cat_products[$i]['id'] ?>"
										   class="product__title"><?= $cat_products[$i]['title'] ?></a>
										<span
											class="product__price"><?= generatePrice($cat_products[$i]['price']) ?></span>
									</div>
								</li>
								<?php
							}
							?>
						</ul>

					</div>
				</div>
				<?php
			} else {
				?>

				<div class="sideblock sideblock__full">
					<div class="sideblock__title">
						<span class="sideblock__title-label">
							Speaker
						</span>
					</div>

					<div class="sideblock__content">
						<ul class="sideblock__products-list products__list">
							<?php
							for ($i = 0; $i < sizeof($speakers); $i++) {
								?>
								<li class="sideblock__products-item">

									<a href="#" class="image__wrapper">
										<img src="<?= $speakers[$i]['image'] ?>" class="product__image"
										     alt="<?= $speakers[$i]['title'] ?>">
									</a>

									<div class="product__brief">
										<a href="<?= generateUrl('product') . '&id=' . $speakers[$i]['id'] ?>"
										   class="product__title"><?= $speakers[$i]['title'] ?></a>

										<span class="product__price"><?= generatePrice($speakers[$i]['price']) ?></span>
									</div>
								</li>
								<?php
							}
							?>
						</ul>

					</div>
				</div>


				<div class="sideblock sideblock__full">
					<div class="sideblock__title __pink">
						<span class="sideblock__title-label">
							Computer
						</span>
					</div>

					<div class="sideblock__content">

						<ul class="sideblock__products-list products__list">
							<?php
							for ($i = 0; $i < sizeof($computer); $i++) {
								?>
								<li class="sideblock__products-item">

									<a href="#" class="image__wrapper">
										<img src="<?= $computer[$i]['image'] ?>" class="product__image"
										     alt="<?= $computer[$i]['title'] ?>">
									</a>


									<div class="product__brief">
										<a href="<?= generateUrl('product') . '&id=' . $computer[$i]['id'] ?>"
										   class="product__title"><?= $computer[$i]['title'] ?></a>

										<span class="product__price"><?= generatePrice($computer[$i]['price']) ?></span>
									</div>
								</li>
								<?php
							}
							?>
						</ul>

					</div>
				</div>


				<div class="sideblock sideblock__full">
					<div class="sideblock__title">
						<span class="sideblock__title-label">
							Smart Phone
						</span>
					</div>

					<div class="sideblock__content">

						<ul class="sideblock__products-list products__list">
							<?php
							for ($i = 0; $i < sizeof($smartphone); $i++) {
								?>
								<li class="sideblock__products-item">

									<a href="#" class="image__wrapper">
										<img src="<?= $smartphone[$i]['image'] ?>" class="product__image"
										     alt="<?= $smartphone[$i]['title'] ?>">
									</a>

									<div class="product__brief">
										<a href="<?= generateUrl('product') . '&id=' . $smartphone[$i]['id'] ?>"
										   class="product__title"><?= $smartphone[$i]['title'] ?></a>

										<span
											class="product__price"><?= generatePrice($smartphone[$i]['price']) ?></span>
									</div>
								</li>
								<?php
							}
							?>
						</ul>

					</div>
				</div>

				<?php
			}
			?>


		</section>

	</section>

</div>


<section class="subscribe">
	<div class="wrapper__fixed subscribe--inside">


		<div class="subscribe__form">

			<div class="subscribe__title">
				Sign Up for Newsletter:
			</div>

			<div class="subscribe__field">
				<input type="text" name="" placeholder="Enter Your E-mail" class="textfield textfield__subscribe" id="">
				<button class="button button__subscribe">Subscribe</button>
			</div>

		</div>


		<div class="subscribe__socials">

			<div class="socials">
				<a href="#" class="socials__item">
					<i class="fa fa-facebook"></i>
				</a>

				<a href="#" class="socials__item">
					<i class="fa fa-google-plus"></i>
				</a>

				<a href="#" class="socials__item">
					<i class="fa fa-twitter"></i>
				</a>

				<a href="#" class="socials__item">
					<i class="fa fa-youtube"></i>
				</a>

				<a href="#" class="socials__item">
					<i class="fa fa-linkedin"></i>
				</a>

				<a href="#" class="socials__item">
					<i class="fa fa-rss"></i>
				</a>


			</div>

		</div>

	</div>
</section>

<?php
includeTmp('footer');
?>
