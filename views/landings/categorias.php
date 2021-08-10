<?php
$categories = $admin->products->GetCategoriesList();
var_dump($categories);
?>
<!-- Pantallas chicas y medianas -->
<div class="d-block d-lg-none">
    <div class="row col-12 mx-0 px-0 mt-5 pt-5">
        <img src="./assets/images/products/acerca/1.jpg" alt="" class="w-100 h-100">
    </div>
</div>
<!-- Pantallas grandes -->
<div class="d-none d-lg-block">
    <div class="row col-12 mx-0 px-0">
        <img src="./assets/images/products/acerca/1.jpg" alt="" class="w-100 h-100">
    </div>
</div>


<section>
    <div class="container">
        <div class="row col-12 mx-0 px-0 my-5 py-5">
            <div class="col-12 col-lg-4 p-1">
                <div class="col-12 centered-lg mx-0 px-0">
                    <h1 class="subtitle-dark">Nuestras categorías</h1>
                    <p class="p-grey">Aprovecha nuestras ofertas de primera mano Nuestro programa de clientes frecuentes otorgara descuentos en paquetes así como envíos gratuitos en paquetes dentro de nuestro programa</p>
                </div>
            </div>
            <?php
            foreach ($categories as $category) {
            ?>
                <a class="col-12 col-md-6 col-lg-4 p-1" href="tienda/<?php echo $category['id']; ?>">
                    <img src="<?php echo $category['image']; ?>" alt="" class="w-100">
                    <h5 class="text-center text-dark mt-2"><?php echo $category['name'] ?></h5>
                    <p class="text-center text-dark mt-2"><?php echo $category['description'] ?></p>
                </a>
            <?php
            }
            ?>
        </div>
    </div>
</section>

<section>
    <div style="background-color: #e4e4e4;">
        <div class="container">
            <div class="row col-12 pb-5 mx-0 px-0">
                <div class="col-12 col-md-4 mt-5">
                    <div class="col-12 col-lg-9 mx-auto">
                        <img src="./assets/images/products/cat/1.jpg" alt="" class="w-100">
                        <h5 class="text-center">PARA TODOS LOS TIPOS DE PIEL</h5>
                    </div>
                </div>
                <div class="col-12 col-md-4 mt-5">
                    <div class="col-12 col-lg-9 mx-auto">
                        <img src="./assets/images/products/cat/2.jpg" alt="" class="w-100">
                        <h5 class="text-center">PRODUCTOS 100% ORGÁNICOS</h5>
                    </div>
                </div>
                <div class="col-12 col-md-4 mt-5">
                    <div class="col-12 col-lg-9 mx-auto">
                        <img src="./assets/images/products/cat/3.jpg" alt="" class="w-100">
                        <h5 class="text-center">COMPROMETIDOS CON EL CUIDADO NATURAL</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>