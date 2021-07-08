<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="<?php echo __ROOT__?>/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo __ROOT__?>/assets/css/styles.css">
        <link rel="stylesheet" href="<?php echo __ROOT__?>/assets/css/styles2.css">
        <link rel="stylesheet" href="<?php echo __ROOT__?>/assets/css/responsive.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">

        <link rel="stylesheet" href="<?php echo __ROOT__?>/assets/OwlCarousel/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo __ROOT__?>/assets/OwlCarousel/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="<?php echo __ROOT__?>/assets/jquery-ui/jquery-ui.css">

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

        <script src="<?php echo __ROOT__?>/assets/jquery/jquery.js"></script>
        <script src="<?php echo __ROOT__?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script>
            $(function() {
                window.alert = function(params) {
                    if (!params.text){
                        let a = params;
                        params = {text:a};
                    }
                    Swal.fire({
                         title: params.title||"Alerta",
                         text: params.text||"Alerta",
                         confirmButtonText: params.button||"Okey", // Text on button
                         icon: params.icon||"success", //built in icons: success, warning, error, info
                         timer: params.time||3000, //timeOut for auto-close
                    });
                }

            });
        </script>

        <!-- <link rel='stylesheet' id='fusion-dynamic-css-css' href="assets/css/parallax.min.css" type='text/css' media='all' /> -->
    </head>