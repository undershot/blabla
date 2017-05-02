<?php
global $config;

$p = $_POST;
//$u = new User();

//$u->logout();


if($p['login'] && $p['password']) {
//	var_dump($p);

	$u = new User();

//	$a = $u->login($p['login'], $p['password']);
	$u = $u->reg($p['login'], $p['password']);

	if($u){
		header('Location: ' . generateUrl('login'));
		exit;
	}


}

$config['title'] = 'Registration';

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
						Registration
					</span>
				</div>

				<div class="sideblock__content">
					<form action="" method="post">

						<div class="col wrapper__login">

							<input type="text" placeholder="Login" name="login" id="" class="textfield textfield__default">

							<input type="email" placeholder="Email" name="email" class="textfield textfield__default" id="">
							<input type="text" placeholder="Phone" name="phone" class="textfield textfield__default" id="">

							<input type="password" placeholder="Password" name="password" id="" class="textfield textfield__default">
							<input type="password" placeholder="Confirm password" name="c_password" id="" class="textfield textfield__default">

							<button type="submit" class="button button__default button--primary">Registration</button>

						</div>

					</form>
				</div>
			</div>

		</section>

	</section>

</div>

<?php
includeTmp('footer');
?>