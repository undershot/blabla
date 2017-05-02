<?php



$f = $_FILES['av'];

if($f) {

	$a = new Imagick($f['tmp_name']);
	$a->cropThumbnailImage(100, 100);

	file_put_contents('asd' . time() . '.jpg', $a);

}
?>

<form action="" enctype="multipart/form-data" method="post">
	<input type="file" name="av" id="">

	<input type="submit" value="go">
</form>
