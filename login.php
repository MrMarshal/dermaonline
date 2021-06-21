<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Login</title>
        <meta name="description" content="Admintres is a Dashboard & Admin Site Responsive Template by hencework." />
        <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Admintres Admin, Admintresadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
        <meta name="author" content="hencework"/>
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        
        <!-- vector map CSS -->
        <link href="assets/vendor/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
        
        
        
        <!-- Custom CSS -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <!--Preloader-->
        <div class="preloader-it">
            <div class="la-anim-1"></div>
        </div>
        <!--/Preloader-->
        
        <div class="wrapper  pa-0">
            <header class="sp-header">
                <div class="sp-logo-wrap pull-left">
                    <a href="index.html">
                        <!--<img class="brand-img mr-10" src="../img/logo.png" alt="brand"/>-->
                        <!--<span class="brand-text"><img  src="../img/brand.png" alt="brand"/></span>-->
                    </a>
                </div>
                <div class="clearfix"></div>
            </header>
            
            <!-- Main Content -->
            <div class="page-wrapper pa-0 ma-0 auth-page">
                <div class="container">
                    <!-- Row -->
                    <div class="table-struct full-width full-height">
                        <div class="table-cell vertical-align-middle auth-form-wrap">
                            <div class="auth-form  ml-auto mr-auto no-float card-view pt-30 pb-30">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="mb-30">
                                            <h3 class="text-center txt-dark mb-10">Iniciar sesión</h3>
                                            <h6 class="text-center nonecase-font txt-grey">Ingresa tus datos</h6>
                                        </div>  
                                        <div class="form-wrap">
                                            <form action="#">
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="exampleInputEmail_2">Dirección de email</label>
                                                    <input type="email" class="form-control" required="" id="exampleInputEmail_2" placeholder="ejemplo@mail.com">
                                                </div>
                                                <div class="form-group">
                                                    <label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password</label>
                                                    <!--<a class="capitalize-font txt-orange block mb-10 pull-right font-12" href="forgot-password.html">forgot password ?</a>-->
                                                    <div class="clearfix"></div>
                                                    <input type="password" class="form-control" required="" id="exampleInputpwd_2" placeholder="Contraseña">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <!--<div class="checkbox checkbox-primary pr-10 pull-left">
                                                        <input id="checkbox_2" required="" type="checkbox">
                                                        <label for="checkbox_2"> Keep me logged in</label>
                                                    </div>-->
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <button class="btn btn-orange btn-rounded" onclick="login()">sign in</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->   
                </div>
                
            </div>
            <!-- /Main Content -->
        
        </div>
        <!-- /#wrapper -->
        
        <!-- JavaScript -->
        
        <!-- jQuery -->
        <script src="assets/vendor/bower_components/jquery/dist/jquery.min.js"></script>
        
        <!-- Bootstrap Core JavaScript -->
        <script src="assets/vendor/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="assets/vendor/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
        
        <!-- Slimscroll JavaScript -->
        <script src="assets/js/jquery.slimscroll.js"></script>
        
        <!-- Init JavaScript -->
        <script src="assets/js/init.js"></script>
    </body>
</html>




<script type="text/javascript">
    function login() {
        console.log("Holi")
        $.ajax({
            url:"bridge/routes.php?action=newConsumption",
            type:"post",
            data:{
                user_id: 1,
                apartment_id: 1,
                //previous:12,
                lecture: 17,
                photo: "una foto",
                note: "alguna nota"
            },
            success:function(res){
                console.log(res)
            }
        })
    }
</script>