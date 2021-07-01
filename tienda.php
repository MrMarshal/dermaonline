<?php
include "routes.php";
include "classes/LoadModels.php";
$view = new Front; //Para definir una vista
$view->Header(["title" => "DERMA ONLINE"]); //La cabecera

$admin = new Model;
try {
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$pagination = $admin->products->GetProductsList(new Request(["page" => $page, "filter" => $_GET]));
	try {
		$prods = $pagination['products'];
	} catch (Exception $ex) {
		echo $ex->getMessage();
	}
	try {
		$total_pages = $pagination['total_pages'];
	} catch (Exception $ex) {
		echo $ex->getMessage();
	}
	try {
		$total_results = $pagination['total_results'];
	} catch (Exception $ex) {
		echo $ex->getMessage();
	}
} catch (Exception $ex) {
	echo $ex->getMessage();
}


try {
	$popular = $admin->products->GetPopularProducts();
} catch (Exception $ex) {
	echo $ex->getMessage();
}
try {
	$categories = $admin->products->GetCategoriesList();
} catch (Exception $ex) {
	echo $ex->getMessage();
}
?>


<style type="text/css">
	.selector {
		position: relative;
		padding: 20px;
		width: 100%;
		color: #7e7e7e;
	}

	.selector ul {
		position: relative;
		display: block;
		overflow: auto;
		min-width: 138px;
		max-height: 200px;
		background: #fff;
		list-style: none;
		white-space: inherit;
		padding-right: 17px;
		width: calc(100% + 17px)
	}

	.selector li {
		position: relative;
		padding: 3px 20px 3px 25px;
		cursor: pointer
	}

	.selector li:before {
		position: absolute;
		top: 50%;
		left: 0;
		top: 4px;
		display: inline-block;
		margin-right: 9px;
		width: 17px;
		height: 17px;
		background-color: #f4f4f4;
		border: 1px solid #d5d5d5;
		content: ""
	}

	.selector li[data-selected="1"]:before {
		border: 1px solid #d7d7d7;
		background-color: #fff
	}

	.selector li[data-selected="1"]:after {
		position: absolute;
		top: 50%;
		left: 3px;
		top: 11px;
		display: inline-block;
		width: 4px;
		height: 10px;
		border-right: 2px solid;
		border-bottom: 2px solid;
		background: none;
		color: #39c9a9;
		content: "";
		-webkit-transform: rotate(40deg) translateY(-50%);
		transform: rotate(40deg) translateY(-50%)
	}

	.selector li:hover {
		color: #aaa
	}

	.selector li .total {
		position: absolute;
		right: 0;
		color: #d7d7d7
	}

	.selector .price-slider {
		text-align: center;
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-ms-flex-wrap: wrap;
		flex-wrap: wrap;
		-webkit-box-pack: justify;
		-ms-flex-pack: justify;
		justify-content: space-between;
		-webkit-box-align: center;
		-ms-flex-align: center;
		align-items: center;
		position: relative;
		padding-top: 17px
	}

	@media (min-width: 768px) {
		.selector .price-slider {
			padding-top: 8px
		}
	}

	.selector .price-slider:before {
		position: absolute;
		top: 50%;
		left: 0;
		margin-top: 0;
		color: #39c9a9;
		content: attr(data-currency);
		-webkit-transform: translateY(-50%);
		transform: translateY(-50%)
	}

	.selector #slider-range {
		width: 90%;
		margin-bottom: 30px;
		border: none;
		background: #e2f7f2;
		height: 3px;
		margin-left: 8px;
		margin-right: 8px
	}

	@media (min-width: 768px) {
		.selector #slider-range {
			width: 100%
		}
	}

	.selector .ui-slider-handle {
		border-radius: 50%;
		background-color: #39c9a9;
		border: none;
		top: -14px;
		width: 28px;
		height: 28px;
		outline: none
	}

	@media (min-width: 768px) {
		.selector .ui-slider-handle {
			top: -7px;
			width: 16px;
			height: 16px
		}
	}

	.selector .ui-slider-range {
		background-color: #d7d7d7
	}

	.selector .slider-price {
		position: relative;
		display: inline-block;
		padding: 5px 10px;
		width: 40%;
		background-color: #e2f7f2;
		line-height: 28px;
		text-align: center
	}

	.selector .slider-price:before {
		position: absolute;
		top: 50%;
		left: 5px;
		margin-top: 0;
		color: #39c9a9;
		content: attr(data-currency);
		-webkit-transform: translateY(-50%);
		transform: translateY(-50%)
	}

	.selector .show-all {
		position: relative;
		padding-left: 25px;
		color: #39c9a9;
		cursor: pointer;
		line-height: 28px
	}

	.selector .show-all:after,
	.selector .show-all:before {
		content: "";
		position: absolute;
		top: 50%;
		left: 4px;
		margin-top: -1px;
		color: #39c9a9;
		width: 10px;
		border-bottom: 1px solid
	}

	.selector .show-all:after {
		-webkit-transform: rotate(90deg);
		transform: rotate(90deg)
	}

	.selector.open ul {
		max-height: none
	}

	.selector.open .show-all:after {
		display: none
	}


	* {
		-webkit-box-sizing: border-box;
		-ms-box-sizing: border-box;
		box-sizing: border-box;
	}
</style>
<style>
	.ui-widget-header {
		border: 0.5px solid #dddddd;
		background: #B37737;
		color: #333333;
		font-weight: bold;
	}

	.ui-slider-horizontal .ui-slider-range {
		top: 30%;
		height: 30%;
	}

	.ui-widget-content {
		border: 1px solid #ccc !important;
	}

	.ui-state-default,
	.ui-widget-content .ui-state-default,
	.ui-widget-header .ui-state-default,
	.ui-button,
	html .ui-button.ui-state-disabled:hover,
	html .ui-button.ui-state-disabled:active {
		border: 1px solid #b37737;
		background: #b37737;
		font-weight: normal;
		color: #454545;
	}

	.ui-slider-horizontal .ui-slider-handle {
		top: 0em;
		margin-left: -.01em;
	}

	.ui-slider .ui-slider-handle {
		position: absolute;
		z-index: 2;
		width: 0.1em;
		height: 0.5em;
		cursor: default;
		-ms-touch-action: none;
		touch-action: none;
	}
</style>




<div class="col-12">
	<div class="row">
		<div class="col-12 py-5 px-5" style="margin-top: 8rem; background-color:#F2F2F2">
			Home / Productos
		</div>
		<div class="col-12 col-md-3 py-5 pl-5 pr-4">
			<p><strong class="texts-store">Filtrar por precio</strong></p>
			<div id="slider-range"></div>

			<label for="amount" class="mt-2">Precio:</label>
			<input type="text" id="amount" disabled readonly style="border:0;">

			<p class="mb-3 mt-5"><strong class="texts-store">Categorías</strong></p>
			<?php foreach ($categories as $cat) { ?>
				<p class="mb-2"><a href="tienda.php?page=1?category=<?php echo $cat['id']; ?>" class="link-p"><?php echo $cat['name']; ?></a></p>
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
									<button class="middle" onclick="addToCart(<?php echo $prod['id']; ?>,
																			 '<?php echo $prod['name']; ?>',
																			 '<?php echo $prod['price']; ?>',
																			 '<?php echo $prod['main_image']; ?>',
																			 <?php echo $prod['existence']; ?>)">
										<div class="text">Agregar al carrito</div>
									</button>
								</div>
								<a href="tienda-1.php">
									<h5 class="name-product mb-0 text-center mt-3"><strong><?php echo $prod['name'] . "(" . $prod['id'] . ")"; ?></strong></h5>
								</a>
								<p class="price-product mb-0 text-center">$<?php echo $prod['price']; ?></p>
							</div>
						<?php } ?>

						<div class="col-12 text-center">
							<p class="links-number">
								<?php
								echo '<a class="btn" href="tienda.php?page=1" > 1 </a>';
								if ($page > 3) {
									echo '<a class="btn" onclick="gotopage(' . round($page / 2) . ')" > ... </a>';
								}
								for ($i = $page - 1; $i <= $page + 1; $i++) {
									if ($i <= $total_pages && $i > 1 && $i < $total_pages) {
										$p = $page == $i ? ('<span style="font-size:22px;font-weight:bold;">' . $i . '</span>') : ($i);
										echo '<a class="btn" onclick="gotopage(' . $i . ')">' . $p . '</a>';
									}
								}
								if (($total_pages - $page) > 2) {
									echo '<a class="btn" onclick="gotopage(' . round(($total_pages + $page) / 2) . ')" > ... </a>';
								}
								echo '<a class="btn" onclick="gotopage(' . $total_pages . ')" > ' . $total_pages . ' </a>';
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
	function gotopage(page) {
		location.href = "tienda.php?page=" + page;
	}
</script>

</div>
<?php
$view->Footer(); // Footer
?>
<script>
	$(function() {
		$("#slider-range").slider({
			range: true,
			min: 0,
			max: 5000,
			values: [0, 5000],
			slide: function(event, ui) {
				$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
			}
		});
		$("#amount").val("$" + $("#slider-range").slider("values", 0) +
			" - $" + $("#slider-range").slider("values", 1));
	});
</script>