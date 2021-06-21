<section class="col-md-11 col-lg-10 mx-auto">
    <div class="row">
        <div class="col-md-3 col-lg-2 my-5" id="filters">
            
            <!-- Filtro de categorías -->
            <div class="row">
                <div class="col-12">
                    <p><strong>CATEGORÍAS</strong></p>
                </div>
                <?php foreach ($data['categories'] as $cat) { ?>
                    <div class="col-12">
                        <input class="mr-2 category_checkbox" type="checkbox" onclick="searchByCategory()" value="<?php echo $cat['id']; ?>" /><label><small><strong> <?php echo $cat['name']; ?></strong></small></label>
                    </div>
                <?php } ?>
            </div>

            <!-- Filtro de Marcas -->
            <div class="row mt-5">
                <div class="col-12">
                    <p><strong>MARCAS</strong></p>
                </div>
                <?php foreach ($data['manufacturers'] as $mans) { ?>
                    <div class="col-12">
                        <input class="mr-2 manufacturers_checkbox" type="checkbox" onclick="searchByManufacturers()" value="<?php echo $mans['id']; ?>" /><label><small><strong> <?php echo $mans['name']; ?></strong></small></label>
                    </div>
                <?php } ?>
            </div>

            <!-- Filtro de Tipos -->
            <div class="row mt-5">
                <div class="col-12">
                    <p><strong>TIPOS</strong></p>
                </div>
                <?php foreach ($data['types'] as $typs) { ?>
                    <div class="col-12">
                        <input class="mr-2 types_checkbox" type="checkbox" onclick="searchByTypes()" value="<?php echo $typs['id']; ?>" /><label><small><strong> <?php echo $typs['name']; ?></strong></small></label>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-9 col-lg-9 mx-auto">
            <div class="row">
                <div class="col-12 mt-5">
                    <p><i><strong>Nuestros Productos</strong></i></p>
                </div>
                <!-- Aquí se pintan los productos -->
                <div id="products_container" class="row">
                    <?php foreach ($data['products'] as $pro) { ?>
                        <div class="col-md-4 my-5">
                            <div class="row">
                                <div class="col-11 mx-auto" style="height: 220px;">
                                    <a href="#" onclick="javascript: showProduct(<?php echo $pro['id']; ?>); return false;">
                                        <img src="https://drive.google.com/uc?export=view&id=<?php echo explode('id=', $pro['image_1'])[1]; ?>" class="img-fluid" style="max-height: 170px;"/>
                                    </a>
                                </div>
                                <div class="col-8"><i><?php echo $pro['name']; ?></i></div>
                                <div class="col-4"><strong>$<?php echo $pro['price']; ?></strong></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>



<script type="text/javascript">

    let cats = [];
    let manus = [];
    let typs = [];

    function getProducts() {
        $.ajax({
            type:"get",
            url:"../bridge/routes.php?action=getProductsByFilter",
            data:{
                categories:JSON.stringify(cats),
                manufacturers:JSON.stringify(manus),
                types:JSON.stringify(typs)
            },
            success:function(res) {
                let prods = JSON.parse(res);
                console.log(prods);
                let prs = "";
                for (var i = 0; i < prods.length; i++) {
                    let pr = prods[i];
                    let im = pr.image_1;
                    if (im.includes("https://drive.google.com/open")){
                        im = "https://drive.google.com/uc?export=view&id="+pr.image_1.split("id=")[1];
                    }
                    prs+='<div class="col-md-4 my-5">'+
                        '    <div class="row">'+
                        '        <div class="col-11 mx-auto" style="height: 220px;">'+
                        '            <a href="#" onclick="javascript: showProduct('+pr.id+'); return false;">'+
                        '                <img src="'+im+'" class="img-fluid" style="max-height: 170px;"/>'+
                        '            </a>'+
                        '        </div>'+
                        '        <div class="col-8"><i>'+pr.name+'</i></div>'+
                        '        <div class="col-4"><strong>$'+pr.price+'</strong></div>'+
                        '    </div>'+
                        '</div>';
                }

                $("#products_container").html(prs);

            }
        })
    }

    function searchByCategory() {
        cats = [];
        $('.category_checkbox:checkbox:checked').each(function() {
            cats.push($(this).val());
        });
        getProducts();
    }

    function searchByManufacturers(argument) {
        manus = [];
        $('.manufacturers_checkbox:checkbox:checked').each(function() {
            manus.push($(this).val());
        });
        getProducts();
    }

    function searchByTypes(argument) {
        typs = [];
        $('.types_checkbox:checkbox:checked').each(function() {
            typs.push($(this).val());
        });
        getProducts();
    }

</script>