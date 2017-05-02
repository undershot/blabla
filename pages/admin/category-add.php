<?php
includeTmp('header-admin');

$p = $_POST;


if($p) {
	global $DB;

	$DB->query("
INSERT INTO `categories` (`id`, `title`)
VALUES (NULL, '{$p['title']}');
");
	?>
	<meta http-equiv="refresh" content="0; url=<?= generateUrl('admin/categories') ?>" />
	<?php

}

includeTmp('topbar-admin');
?>

	<form action="" method="post">

		<div class="col" style="width: 50%; margin: auto;">
			<input type="text" name="title" placeholder="Title" id="" class="textfield textfield__default">

			<button type="submit" class="button button__default button--primary">Add</button>
		</div>

	</form>

<?php
includeTmp('footer-admin');
