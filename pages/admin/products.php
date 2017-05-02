<?php
includeTmp('header-admin');

includeTmp('topbar-admin');
?>
<div class="box">
	<a href="<?=generateUrl('admin/product-add') ?>">Add Product</a>
</div>

<div class="box">
	<table class="table">
		<thead>
		<tr>
			<th>Image</th>
			<th>ID</th>
			<th>Title</th>
			<th>Description</th>
			<th>Category</th>
			<th>Price</th>
			<th>Is Active</th>
			<th>Rating</th>
			<th></th>
			<th></th>
		</tr>
		</thead>

		<tbody>
		<?php
		global $DB;

		$p = $DB->query('SELECT * FROM `products` ORDER BY `id` DESC');
		$p = $p->fetchAll();

		for($i = 0, $c = sizeof($p); $i < $c; $i++ ) {
			?>
			<tr>
				<td class="td--nopadding"><img src="<?=$p[$i]['image']?>" alt=""></td>
				<td><?=$p[$i]['id']?></td>
				<td><?=$p[$i]['title']?></td>
				<td><?=$p[$i]['description']?></td>
				<td><?=$p[$i]['cat_id']?></td>
				<td><?=generatePrice($p[$i]['price'])?></td>
				<td><?=$p[$i]['is_active'] === '1' ? 'Active' : 'Inactive'?></td>
				<td><?=$p[$i]['rating']?></td>
				<td><a href="<?=generateUrl('admin/product-edit') . '&id=' . $p[$i]['id']?>"><i class="fa fa-edit"></i> Edit</a></td>
				<td><a href="<?=generateUrl('admin/delete') . '&m=products&id=' . $p[$i]['id']?>" class="link--red"><i class="fa fa-trash"></i> Delete</a></td>
			</tr>
			<?php
		}
		?>


		</tbody>
	</table>
</div>




<?php
includeTmp('footer-admin');
?>
