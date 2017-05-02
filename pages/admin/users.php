<?php
includeTmp('header-admin');

includeTmp('topbar-admin');
?>

<div class="box">
	<div class="col" style="width: 50%; margin: auto;">
		<table class="table">
			<thead>
			<tr>
				<th>ID</th>
				<th>Username</th>
				<th>Banned</th>

				<th></th>
				<th></th>
			</tr>
			</thead>

			<tbody>
			<?php
			global $DB;

			$p = $DB->query('SELECT * FROM `users` ORDER BY `id` DESC');
			$p = $p->fetchAll();

			for ($i = 0, $c = sizeof($p); $i < $c; $i++) {
				?>
				<tr>
					<td><?= $p[$i]['id'] ?></td>
					<td><?= $p[$i]['login'] ?></td>
					<td><?= $p[$i]['is_banned'] === '1' ? 'Banned' : 'No' ?></td>

					<td>
						<?php
						if($p[$i]['login'] !== 'admin'){
							if($p[$i]['is_banned'] === '1') {
								?>
								<a href="<?= generateUrl('admin/users-ban') . '&m=0&id=' . $p[$i]['id'] ?>">
									Unban
								</a>
								<?php
							} else {
								?>
								<a href="<?= generateUrl('admin/users-ban') . '&m=1&id=' . $p[$i]['id'] ?>">
									Ban
								</a>
								<?php
							}
						}
						?>

					</td>
					<td><a href="<?= generateUrl('admin/delete') . '&m=users&id=' . $p[$i]['id'] ?>" class="link--red"><i
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
