<?php
?>

<style>
	body{
		padding-top: 35px;
	}
</style>


<div class="header__admin">


		<ul class="menu--horizontal row --vertical-center --full-height">
			<li><a href="/">E-Shop</a></li>
			<li>|</li>
			<li><a href="<?= generateUrl('admin/products') ?>">Admin Panel</a></li>
			<li>
				<a href="<?= generateUrl('admin/products') ?>">Products</a>
				<a href="<?= generateUrl('admin/product-add') ?>" class="button button__default">+</a>
			</li>
			<li><a href="<?= generateUrl('admin/categories') ?>">Categories</a></li>
			<li><a href="<?= generateUrl('admin/users') ?>">Users</a></li>
		</ul>



</div>
