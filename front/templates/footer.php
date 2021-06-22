    <footer>
        <div class="container">
            <div class="row py-5">
                <div class="col-10 mx-auto col-md-3 my-2 text-center">
                    <img src="<?php echo $backing; ?>assets/images/page/logo.svg" class="img-fluid mb-3" width="200px" />
                </div>
                <div class="col-6 col-md-3 my-2">
                    <a>Mi cuenta</a><br>
                    <a>Contacto</a><br>
                    <a>Términos y condiciones</a><br>
                    <a>Política de envíos</a><br>
                    <a>Política de rembolsos</a><br>
                    <a>Aviso de Privacidad</a>
                </div>
                <div class="col-6 order-12 order-md-1 col-md-3 my-2">
                    <a>Facebook</a><br>
                    <a>Instagram</a><br>
                    <a>Blog</a><br>
                </div>
                <div class="col-6 order-1 order-md-12 col-md-3 my-2">
                    <img src="<?php echo $backing; ?>assets/images/page/stars.svg" class="img-fluid mb-3" width="100px" />
                    <p class="px-3">4.92 de 5</p>
                </div>
            </div>
        </div>

    </footer>
    <!-- Footer -->

    <body>
        <!-- Scripts -->
        <?php if ($js != null) foreach ($js as $j) { ?>
            <script src="<?php echo $backing; ?>assets/js/<?php echo $j ?>.js"></script>
        <?php } ?>

        <script src="<?php echo $backing; ?>assets/jquery/jquery.js"></script>
        <script src="<?php echo $backing; ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo $backing; ?>assets/OwlCarousel/js/owl.carousel.min.js"></script>
        <script src="<?php echo $backing; ?>assets/js/scripts.js"></script>
    </body>

    </html>