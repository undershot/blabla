<aside class="sidebar">

	<div class="sideblock sideblock__categories">
		<div class="sideblock__title" onclick="toggleCats()">
					<span class="sideblock__title-label">
						<i class="fa fa-bars"></i>
						Categories
					</span>
			<i class="fa fa-caret-down" id="cats-caret"></i>
		</div>

		<div class="sideblock__content cats cats--hidden" id="cats">
			<ul class="sideblock__categories-list">

				<?php

				global $DB;
				$c = $DB->query("SELECT * FROM `categories` ORDER BY `title` ASC");

				$c = $c->fetchAll();

				for($i=0; $i<sizeof($c); $i++) {
					?>
					<li class="sideblock__categories-item">
						<a href="/?cat_id=<?= $c[$i]['id']?>"><?= $c[$i]['title'] ?></a>
					</li>

					<?php
				}
				?>
				

				<li class="sideblock__categories-item">
					<a href="#">
						More Categories

						<i class="fa fa-plus"></i>
					</a>
				</li>
			</ul>
		</div>
	</div>


	<script>
		function toggleCats() {
			if($("#cats").hasClass("cats--hidden")) $("#cats").removeClass("cats--hidden").addClass("cats--visible");
			else $("#cats").removeClass("cats--visible").addClass("cats--hidden");

			$("#cats-caret").toggleClass("cats--hidden");
		}
	</script>

	<div class="sideblock sideblock__bestsellers">
		<div class="sideblock__title">
					<span class="sideblock__title-label">
						Bestseller
					</span>
		</div>

		<div class="sideblock__content">

			<ul class="sideblock__products-list">
				<li class="sideblock__products-item">
					<img src="./Images/13.jpg" class="product__image" alt="Various Versions">

					<div class="product__brief">
						<a href="#" class="product__title">Various Versions</a>

						<span class="product__price">$99.00<s>$120.00</s></span>
					</div>
				</li>

				<li class="sideblock__products-item">
					<img src="./Images/11.jpg" class="product__image" alt="Various Versions">

					<div class="product__brief">
						<a href="#" class="product__title">Estabilshed Fact</a>

						<span class="product__price">$85.00<s>$105.00</s></span>
					</div>
				</li>

				<li class="sideblock__products-item">
					<img src="./Images/12.jpg" class="product__image" alt="Various Versions">

					<div class="product__brief">
						<a href="#" class="product__title">Trid Palm</a>

						<span class="product__price">$90.00<s>$120.00</s></span>
					</div>
				</li>

				<li class="sideblock__products-item">
					<img src="./Images/2.jpg" class="product__image" alt="Various Versions">

					<div class="product__brief">
						<a href="#" class="product__title">Estabilished Fact</a>

						<span class="product__price">$85.00<s>$105.00</s></span>
					</div>
				</li>
			</ul>

		</div>
	</div>


</aside>