<?php
global $config;

$p = $_POST;
//$u = new User();

//$u->logout();

$err = '';

if($p['login'] && $p['password']) {
//	var_dump($p);

	$u = new User();

	$a = $u->login($p['login'], $p['password']);

	if($a){
		if($u->isBanned()) {
			$err = 'Ваш аккаунт был заблокирован.';
		} else {
			header('Location: /');
			exit;
		}
	} else {
		$err = 'Неверный логин или пароль';
	}
}

$config['title'] = 'Login';

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
						Login
					</span>
				</div>

				<div class="sideblock__content">


					<form action="" method="post">

						<div class="col wrapper__login">

							<div class="box link--red">
								<?= $err ?>
							</div>

							<input type="text" placeholder="Login" name="login" id="" class="textfield textfield__default">
							<input type="password" placeholder="Password" name="password" id="" class="textfield textfield__default">

							<button type="submit" class="button button__default button--primary">Log In</button>

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
