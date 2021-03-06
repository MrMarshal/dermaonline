<footer>
    <div class="container">
        <div class="row py-5">
            <div class="col-10 mx-auto col-md-3 my-2 text-center">
                <img src="<?php echo __ROOT__?>/assets/images/page/logo.svg" class="img-fluid mb-3" width="200px" />
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
                <img src="<?php echo __ROOT__?>/assets/images/page/stars.svg" class="img-fluid mb-3" width="100px" />
                <p class="px-3">4.92 de 5</p>
            </div>
        </div>
    </div>

</footer>
<!-- Footer -->

<body>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" crossorigin="anonymous"></script>


    <script src="https://unpkg.com/browse/@coreui/coreui@2.1.16/dist/js/coreui.min.js"></script>
    <script src="<?php echo __ROOT__?>/assets/jquery-ui/jquery-ui.js"></script>
    <script src="<?php echo __ROOT__?>/assets/OwlCarousel/js/owl.carousel.min.js"></script>
    <script src="<?php echo __ROOT__?>/assets/js/scripts.js"></script>

    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                loop: true,
                autoplay: true,
                autoplayTimeout: 4000,
                // margin: 10,
                items: 1,
            });
        });
    </script>
    <script src="<?php echo __ROOT__?>/assets/js/cart.js"></script>

</body>

</html>