<?php
includeTmp('header-admin');

includeTmp('topbar-admin');
?>
<div class="box">
	<a href="<?= generateUrl('admin/category-add') ?>">Add Category</a>
</div>

<div class="box">
	<div class="col" style="width: 50%; margin: auto;">
		<table class="table">
			<thead>
			<tr>
				<th>ID</th>
				<th>Label</th>

				<th></th>
				<th></th>
			</tr>
			</thead>

			<tbody>
			<?php
			global $DB;

			$p = $DB->query('SELECT * FROM `categories` ORDER BY `id` DESC');
			$p = $p->fetchAll();

			for ($i = 0, $c = sizeof($p); $i < $c; $i++) {
				?>
				<tr>
					<td><?= $p[$i]['id'] ?></td>
					<td><?= $p[$i]['title'] ?></td>

					<td><a href="<?= generateUrl('admin/category-edit') . '&id=' . $p[$i]['id'] ?>"><i
								class="fa fa-edit"></i> Edit</a></td>
					<td><a href="<?= generateUrl('admin/delete') . '&m=categories&id=' . $p[$i]['id'] ?>" class="link--red"><i
								class="fa fa-trash"></i> Delete</a></td>

				</tr>
				<?php
			}
			?>


			</tbody>
		</table>
	</div>
</div>


<?php
includeTmp('footer-admin');
?>
