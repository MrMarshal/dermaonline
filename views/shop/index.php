<?php
$price_range = isset($price_range) ? $price_range : "0-5000";
$min_price = (explode("-", $price_range)[0]);
$max_price = (explode("-", $price_range)[1]);
// $pagination = $admin->products->GetProductsList(new Request(["page" => $page, "filter" => ["category" => $category, "min_price" => $min_price, "max_price" => $max_price]]));
// $prods = $pagination['products'];
// $total_results = $pagination['total_results'];
// $total_pages = $pagination['total_pages'];
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

			<p class="mb-3 mt-5"><strong class="texts-store">Categorías</strong><a class="btn" onclick="set_category(0)">Ver todas</a></p>
			<?php foreach ($categories as $cat) { ?>
				<p class="mb-2"><a class="btn" onclick="set_category(<?php echo $cat['id']; ?>)" class="link-p"><?php echo $cat['name']; ?></a></p>
			<?php } ?>

			<p class="mb-3 mt-5"><strong class="texts-store">Tags populares</strong></p>
			<div class="row">
				<span id="tags"></span>

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
					<p class="showing-text">Mostrando <span id="count">0</span> resultados</p>
				</div>
				<div class="col-12 pb-4">
					<div class="row" id="products_galery"></div>
					<div class="row">
						<div class="col-12 text-center">
							<p class="links-number" id="pages">
								1
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	let min_price = <?php echo $min_price; ?>;
	let max_price = <?php echo $max_price; ?>;
	let category = <?php echo $category != null ? $category : 0; ?>;

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
		location.href = "<?php echo __ROOT__; ?>/tienda/" + page + "/" + min_price + "-" + max_price + (category != 0 ? ("/" + category) : "");
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

		$("#amount").val(toMoney($("#slider-range").slider("values", 0)) + " - " + toMoney($("#slider-range").slider("values", 1)));
	});
</script>
<script>
	let total_results = 0;
	let total_pages = 0;
	let page = <?php echo $page; ?>;
	$(document).ready(() => {
		loadProducts(onSuccess);
	})

	function loadProducts(onSuccess = () => {}) {

		let products = []
		$.ajax({
			type: "post",
			url: `<?php echo __ROOT__; ?>/bridge/routes.php?action=getProducts`,
			data: {
				category: <?php echo $category ?  "'" . $category . "'" : "''"; ?>,
				min_price: <?php echo "'" . $min_price . "'"; ?>,
				max_price: <?php echo "'" . $max_price . "'"; ?>,
			},
			success: function(res) {

				let resp = JSON.parse(res);

				products = resp.products;
				onSuccess(products, resp.total_results, resp.total_pages);
				dragTags(products);
			},
			error: (error) => {

				errorHandle(error);
			},
		});
	}

	function onSuccess(products = [], total_results, total_pages) {
		$("#products_galery").html("");
		let html = "";
		products.forEach(x => {
			html += `<div class="col-12 col-md-6 mb-5">
								<div class="container-2">
									<img src="${x.main_image}" alt="Avatar" class="image col-12">
									<button class="middle" onclick="addToCart(${x.id})">
										<div class="text">Agregar al carrito</div>
									</button>
								</div>
								<a href="<?php echo __ROOT__ . '/producto/' ?>${x.seo_name}">
									<h5 class="name-product mb-0 text-center mt-3"><strong>${x.name} (${x.id})</strong></h5>
								</a>
								<p class="price-product mb-0 text-center">$${x.price}</p>
							</div>`;
		});
		total_results = total_results;
		total_pages = total_pages;
		$("#products_galery").html(html);
		$("#count").html(products.length);
		drawPages(total_pages);
	}

	function drawPages(total_pages) {
		let html = `<a class="btn" onclick="set_page(1)" > 1 </a>`;
		let page = parseInt(<?php echo $page ? $page : 0; ?>);
		if (page > 3) {
			html += `<a class="btn" onclick="set_page('${parseInt(page / 2)}')" > ... </a>`;
		}

		for (let i = page - 1; i <= page + 1; i++) {
			if (i <= total_pages && i > 1 && i < total_pages) {
				p = page == i ? (`<span style="font-size:22px;font-weight:bold;">${i}</span>`) : (i);
				html += `<a class="btn" onclick="set_page(${i})">${p}</a>`;
			}
		}

		if ((total_pages - page) > 2) {
			html += `<a class="btn" onclick="set_page(${parseInt((total_pages + page) / 2)} > ... </a>`;
		}
		html += `<a class="btn" onclick="set_page(${total_pages})" >${total_pages}</a>`;
		$("#pages").html(html);
	}

	function dragTags(prods) {
		let c = 0;
		let arr = []
		let html = "";
		prods.forEach(pr => {
			debugger;
			if (c == 10) return;

			arr = pr.tags.split('#');
			key = Math.floor(Math.random() * (9 - 0)) + 0;
			if (arr[key] != "") {
				html += `<div class="b-tags px-3 py-1 my-1 mx-1" onclick="alert('bien')">${arr[key]}</div>`
				c++;
			}
		});
		$("#tags").html(html);
	}
</script>