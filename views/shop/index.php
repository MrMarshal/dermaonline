<?php
	$price_range = isset($price_range)?$price_range:"0-5000";
	$min_price = (explode("-", $price_range)[0]);
	$max_price = (explode("-", $price_range)[1]);
	$pagination = $admin->products->GetProductsList(new Request(["page" => $page, "filter" => ["category"=>$category,"min_price"=>$min_price,"max_price"=>$max_price]]));
	$prods = $pagination['products'];
	$total_results = $pagination['total_results'];
	$total_pages = $pagination['total_pages'];
	$popular = $admin->products->GetPopularProducts();
	$categories = $admin->products->GetCategoriesList();
?>

<div class="col-12">
	<div class="row">
		<div class="col-12 py-5 px-5" style="margin-top: 8rem; background-color:#F2F2F2">
			Home / Productos
		</div>
		<div class="col-12 col-md-3 py-5 pl-5 pr-4">
			<p><strong class="texts-store">Filtrar por precio</strong></p>
			<div id="slider-range"></div>

			<label for="amount" class="mt-2">Precio:</label>
			<div class="row">
				<div class="col-8">
					<input type="text" id="amount" disabled readonly style="border:0;">
				</div>
				<div class="col-2">
					<a class="btn" onclick="set_range()">Aplicar</a>
				</div>
			</div>

			<p class="mb-3 mt-5"><strong class="texts-store">Categorías</strong></p>
			<?php foreach ($categories as $cat) { ?>
				<p class="mb-2"><a class="btn" onclick="set_category(<?php echo $cat['id']; ?>)" class="link-p"><?php echo $cat['name']; ?></a></p>
			<?php } ?>

			<p class="mb-3 mt-5"><strong class="texts-store">Tags populares</strong></p>
			<div class="row">
				<?php $c = 0;
				foreach ($prods as $pr) {
					if ($c == 10) break;
					$arr = explode("#", $pr['tags']);
					$key = array_rand($arr);
					if ($arr[$key] != "") {
						$c++; ?>
						<div class="b-tags px-3 py-1 my-1 mx-1"><?php echo $arr[$key]; ?></div>
				<?php }
				} ?>
			</div>
			<p class="mb-3 mt-5"><strong class="texts-store">Productos populares</strong></p>
			<?php foreach ($popular as $pop) { ?>
				<div class="row mb-2">
					<div class="col-8">
						<img src="<?php echo $pop['image']; ?>" class="img-fluid" />
					</div>
					<div class="col-4 px-0">
						<p class="name-product mb-0 mt-5"><?php echo $pop['name']; ?></p>
						<p class="price-product">$<?php echo $pop['price']; ?></p>
					</div>
				</div>
			<?php } ?>
		</div>
		<div class="col-12 col-md-8 pt-4">
			<div class="row">
				<div class="col-12">
					<p class="showing-text">Mostrando <?php echo $total_results; ?> resultados</p>
				</div>
				<div class="col-12 pb-4">
					<div class="row">
						<?php foreach ($prods as $prod) { ?>
							<div class="col-12 col-md-6 mb-5">
								<div class="container-2">
									<img src="<?php echo $prod['main_image']; ?>" alt="Avatar" class="image col-12">
									<button class="middle" onclick="addToCart(<?php echo $prod['id']; ?>)">
										<div class="text">Agregar al carrito</div>
									</button>
								</div>
								<a href="<?php echo __ROOT__.'/producto/'.$prod['id']; ?>">
									<h5 class="name-product mb-0 text-center mt-3"><strong><?php echo $prod['name'] . "(" . $prod['id'] . ")"; ?></strong></h5>
								</a>
								<p class="price-product mb-0 text-center">$<?php echo $prod['price']; ?></p>
							</div>
						<?php } ?>

						<div class="col-12 text-center">
							<p class="links-number">
								<?php
								echo '<a class="btn" onclick="set_page(1)" > 1 </a>';
								if ($page > 3) {
									echo '<a class="btn" onclick="set_page(' . round($page / 2) . ')" > ... </a>';
								}
								for ($i = $page - 1; $i <= $page + 1; $i++) {
									if ($i <= $total_pages && $i > 1 && $i < $total_pages) {
										$p = $page == $i ? ('<span style="font-size:22px;font-weight:bold;">' . $i . '</span>') : ($i);
										echo '<a class="btn" onclick="set_page(' . $i . ')">' . $p . '</a>';
									}
								}
								if (($total_pages - $page) > 2) {
									echo '<a class="btn" onclick="set_page(' . round(($total_pages + $page) / 2) . ')" > ... </a>';
								}
								echo '<a class="btn" onclick="set_page(' . $total_pages . ')" > ' . $total_pages . ' </a>';
								?>
							</p>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	let page = <?php echo $page; ?>;
	let min_price = <?php echo $min_price; ?>;
	let max_price = <?php echo $max_price; ?>;
	let category = <?php echo $category!=null?$category:0; ?>;

	function set_page(p) {
		page = p;
		realoadPage();
	}

	function set_range() {
		min_price = $("#slider-range").slider("values", 0);
		max_price = $("#slider-range").slider("values", 1);
		realoadPage();
	}

	function set_category(c) {
		category = c;
		realoadPage();
	}

	function realoadPage() {
		location.href = "<?php echo __ROOT__; ?>/tienda/"+page+"/"+min_price+"-"+max_price+"/"+category;
	}
</script>

</div>


<script>
	$(function() {
		$("#slider-range").slider({
			range: true,
			min: 0,
			max: 5000,
			values: [min_price, max_price],
			slide: function(event, ui) {
				$("#amount").val(toMoney(ui.values[0]) + " - " + toMoney(ui.values[1]));
			}
		});

		$("#amount").val(toMoney($("#slider-range").slider("values", 0)) +" - " + toMoney($("#slider-range").slider("values", 1)));
	});
</script>