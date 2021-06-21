    <footer>
        <div class="container">
            <div class="row py-5">
                <div class="col-md-3 my-2">
                    <img src="../assets/images/Logo.png" class="img-fluid mb-3" width="200px" />
                    <p><img src="../assets/images/Iconos/market.svg" class="mr-3" />Ciudad de México, México</p>
                    <p><img src="../assets/images/Iconos/phone.svg" class="mr-3" />55-37-27-27-29</p>
                    <p><img src="../assets/images/Iconos/mail.svg" class="mr-3" />contact@ateratechnologies.com</p>
                </div>
                <div class="col-md-3 my-2">
                    <h5 class="mb-4">GAMING</h5>
                    <p><a class="py-3" href="">BÁSICO</a></p>
                    <p><a class="py-3" href="">AVANZADO</a></p>
                    <p><a class="py-3" href="">DESKTOPS</a></p>
                    <p><a class="py-3" href="">LAPTOPS</a></p>
                </div>
                <div class="col-md-3 my-2">
                    <h5 class="mb-4">COMPAÑIAS</h5>
                    <p><a class="py-3" href="">BÁSICO</a></p>
                    <p><a class="py-3" href="">AVANZADO</a></p>
                    <p><a class="py-3" href="">DESKTOPS</a></p>
                    <p><a class="py-3" href="">LAPTOPS</a></p>
                    <p><a class="py-3" href="">CONSULTORIA</a></p>
                </div>
                <div class="col-md-3 my-2">
                    <h5 class="mb-4">LEGALES</h5>
                    <p><a class="py-4" href="">Términos y Condiciones</a></p>
                    <p><a class="py-4" href="">Aviso de Privacidad</a></p>
                </div>
            </div>
        </div>

    </footer>
    <!-- Footer -->

    <body>
        <!-- Scripts -->
        <?php if($js!=null) foreach ($js as $j) { ?>
        <script src="<?php echo $backing; ?>assets/js/<?php echo $j ?>.js"></script>
        <?php } ?>
        
        <script src="<?php echo $backing; ?>assets/jquery/jquery.js"></script>
        <script src="<?php echo $backing; ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo $backing; ?>assets/OwlCarousel/js/owl.carousel.min.js"></script>
    </body>

    </html>