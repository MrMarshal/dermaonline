<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top pt-2 pb-3" id="mainNav">
    <a class="" href="./">
        <img src="<?php echo $backing; ?>assets/images/page/logo.svg" class=" mx-5" style="max-width:140px" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars ms-1"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="./">
                    <p class="my-2"><strong>Home</strong></p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="acerca.php">
                    <p class="my-2"><strong>Acerca</strong></p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="categorias.php">
                    <p class="my-2"><strong>Categorias</strong></p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tienda.php?page=1">
                    <p class="my-2"><strong>Tienda</strong></p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cuenta.php">
                    <p class="my-2">
                        <strong>
                            <img src="<?php echo $backing; ?>assets/images/page/user.svg" />
                        </strong>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="carrito.php">
                    <p class="my-2">
                        <strong>
                            <img src="<?php echo $backing; ?>assets/images/page/car.svg" />
                        </strong>
                    </p>
                </a>
            </li>
        </ul>
    </div>
</nav>