<?php
	include "routes.php";
	include "classes/LoadModels.php";
	$view = new Front; //Para definir una vista
	$view->Header(["title" => "DERMA ONLINE"]); //La cabecera

	$admin = new Model;

	$prods = $admin->products->GetProductsList();
	$popular = $admin->products->GetPopularProducts();
	$categories = $admin->products->GetCategoriesList();
	for ($i=0; $i < 100; $i++) { 
		$prods[] = $prods[0];
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
	        padding-top:8px
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
	        width:100%
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
	        top:-7px;
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

	.selector .show-all:after, .selector .show-all:before {
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

<script type="text/javascript">
	$("#slider-range").slider({
	  range: true, 
	  min: 0,
	  max: 3500,
	  step: 50,
	  slide: function( event, ui ) {
	    $( "#min-price").html(ui.values[ 0 ]);
	    
	    console.log(ui.values[0])
	    
	    suffix = '';
	    if (ui.values[ 1 ] == $( "#max-price").data('max') ){
	       suffix = ' +';
	    }
	    $( "#max-price").html(ui.values[ 1 ] + suffix);         
	  }
	})

</script>


<div class="col-12">
	<div class="row">
		<div class="col-12 py-5 px-5" style="margin-top: 8rem; background-color:#F2F2F2">
			Home / Productos
		</div>
		<div class="col-12 col-md-3 py-5 pl-5 pr-4">
			<p><strong class="texts-store">Filtrar por precio</strong></p>


			<div class="selector">
			    <div class="price-slider">
			        <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
			            <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
			            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
			        </div>
			        <span id="min-price" data-currency="$" class="slider-price">0</span> <span class="seperator">-</span> <span id="max-price" data-currency="$" data-max="3500"  class="slider-price">3500</span>
			    </div> 
			</div>

			<p class="mb-3 mt-5"><strong class="texts-store">Categorías</strong></p>
			<?php foreach ($categories as $cat) { ?>
				<p class="mb-2"><a href="" class="link-p"><?php echo $cat['name']; ?></a></p>
			<?php } ?>

			<p class="mb-3 mt-5"><strong class="texts-store">Tags populares</strong></p>
			<div class="row">
				<?php $c = 0; foreach ($prods as $pr){
					if ($c==10) break;
					$arr = explode("#", $pr['tags']);
					$key = array_rand($arr);
					if ($arr[$key]!=""){
						$c++;?>
					<div class="b-tags px-3 py-1 my-1 mx-1"><?php echo $arr[$key]; ?></div>
				<?php }} ?>
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
					<p class="showing-text">Mostrando 1-6 de <?php echo sizeof($prods); ?> resultados</p>
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
								<a href="tienda-1.php">
									<h5 class="name-product mb-0 text-center mt-3"><strong><?php echo $prod['name']; ?></strong></h5>
								</a>
								<p class="price-product mb-0 text-center">$<?php echo $prod['price']; ?></p>
							</div>
						<?php } ?>

						<div class="col-12 text-center">
							<p class="links-number">1 2 3 4 5 6 7 8 10 11..</p>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

</div>
<?php
$view->Footer();// Footer
