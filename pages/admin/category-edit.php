<?php
includeTmp('header-admin');

$p = $_POST;
$g = $_GET;

global $DB;

if($p) {
	$DB->query("
UPDATE `categories` SET `title` = '{$p['title']}' WHERE `id` = {$g['id']}
");
	?>
	<meta http-equiv="refresh" content="0; url=<?= generateUrl('admin/categories') ?>" />
	<?php

} else {
	$c = $DB->query("SELECT * FROM `categories` WHERE `id` = {$g['id']}");
	$c = $c->fetch();
}

includeTmp('topbar-admin');
?>

	<form action="" method="post">

		<div class="col" style="width: 50%; margin: auto;">
			<input type="text" name="title" placeholder="Title" id="" value="<?= $c['title']?>" class="textfield textfield__default">

			<button type="submit" class="button button__default button--primary">Edit</button>
		</div>

	</form>

<?php
includeTmp('footer-admin');
