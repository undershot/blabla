<?php
global $DB, $config;

$u = new User();


if($u->isLogged()) {
	$user_data = $u->getData();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $config['title'] ?></title>

	<link rel="stylesheet" href="./css/main.css?<?= time() ?>">
	<link rel="stylesheet" href="./FontAwesome/font-awesome.min.css">

	<script src="./Js/jquery.js" defer></script>
	<script src="./Js/prefix-free.js" defer></script>

	<meta name="viewport" content="width=device-width,initial-scale=1"/>
</head>
<body>

<?php


if($u->isAdmin()) includeTmp('topbar-admin');


?>

<header class="header">
	<nav>
		<div class="wrapper__fixed">
			<ul class="header__top-nav">
				<li>
					<i class="fa fa-clock-o"></i>

					<div class="header__top-nav__label">
						<span>Working time</span>
						Mon-Sun: 8:00 - 18:00
					</div>

				</li>

				<li>
					<i class="fa fa-truck"></i>

					<div class="header__top-nav__label">
						<span>Free shipping</span>
						On order over 199$
					</div>

				</li>

				<li>
					<i class="fa fa-money"></i>

					<div class="header__top-nav__label">
						<span>Money back 100%</span>
						Within 30 Days after delivery
					</div>

				</li>

				<li>
					<i class="fa fa-phone-square"></i>

					<div class="header__top-nav__label">
						<span>Phone 0123456789</span>
						Order Online Now!
					</div>

				</li>
			</ul>
		</div>
	</nav>

<!--	<div class="asd"></div>-->


	<div class="">
		<div class="wrapper__fixed">
			<div class="row header__logo-layout">


				<a href="/" class="logo"><img src="./logo.png" alt="E-Shop.kz"></a>

				<div class="header__search">
					<div class="header__search__category">
						<span>All Categories</span>

						<i class="fa fa-caret-down header__search__arrow"></i>
					</div>

					<div class="header__search__field">
						<input type="text" placeholder="Search" class="textfield textfield__search"/>
					</div>

					<div class="header__search__submit">
						<button type="submit" class="button button--primary button__search-submit">
							<i class="fa fa-search"></i>
						</button>
					</div>
				</div>

				<div class="header__cart">
					<a href="#" class="button button--primary button__cart">
						<i class="fa fa-shopping-cart"></i>
					</a>
				</div>

				<nav class="header__log-menu">
					<?php
					if (!$u->isLogged()) {
						?>
						<a href="<?= generateUrl('login') ?>">Authorization</a>
						<a href="<?= generateUrl('reg') ?>">Registration</a>
					<?php } else {
						?>
						<a href="#"><?=$user_data['login']?></a>
						<a href="<?= generateUrl('logout') ?>">Log out</a>
					<?php } ?>
				</nav>

			</div>
		</div>

	</div>


	<nav class="header__menu">

		<div class="wrapper__fixed">
			<ul class="header__menu-list">
				<li class="header__menu-item">
					<a href="#">Home</a>
				</li>

				<li class="header__menu-item">
					<a href="#">About Us</a>
				</li>

				<li class="header__menu-item">
					<a href="#">Bestseller Products</a>
					<span class="header__badge badge__red">
						Hot
						<i class="fa fa-caret-down"></i>
					</span>
				</li>

				<li class="header__menu-item">
					<a href="#">New Products</a>
					<span class="header__badge badge__green">
						New
						<i class="fa fa-caret-down"></i>
					</span>
				</li>

				<li class="header__menu-item">
					<a href="#">Special Products</a>
				</li>

				<li class="header__menu-item">
					<a href="#">Pages</a>
				</li>

				<li class="header__menu-item">
					<a href="#">Contact Us</a>
				</li>
			</ul>
		</div>

	</nav>
</header>