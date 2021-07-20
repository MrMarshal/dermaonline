<section class="row container mx-auto" style="margin-top: 5rem;">
    <div class="order-12 order-md-1 col-12 col-md-6 mx-auto px-5 my-5 border-right-1">
        <h1>INICIA SESIÓN</h1>
        <form id="login" class="mt-3">
            <input type="email" id="email" style="height: 3rem !important;" required class="form-control my-2" value="" placeholder="Correo electrónico" />
            <input type="password" id="password" style="height: 3rem !important;" requiered class="form-control" value="" placeholder="Contraseña" />
            <p class="text-right"><small>¿Olvidaste tu contraseña?</small></p>
            <input type="submit" class="btn btn-2 col-12 py-2" value="Entrar" />
        </form>
    </div>
    <div class="order-1 order-md-12 col-12 col-md-6 mx-auto px-5 my-5">
        <h4 class="text-center mt-5">ÚNETE A DERMA ONLINE</h4>
        <p class="text-center">
            Y disfruta de nuestras oferta exclusivas en tus
            marcas favoritas
        </p>
        <a href="register" class="btn btn-transparent-yellow col-12 text-yellow py-2">REGÍSTRATE ES GRATIS</a>
    </div>
</section>
<script>
    let form = document.getElementById("login");
    let email = document.getElementById("email");
    let password = document.getElementById("password");
    form.addEventListener("submit", (event) => {
        event.preventDefault();
        debugger;
        login(email.value, password.value);
    })
    const login = (user, password) => {
        debugger;

        $.ajax({
            url: "/bridge/routes.php?action=login",
            type: "POST",
            data: {
                user,
                password
            },
            success: (data) => {

            },
            error: (error) => {
                errorHandle(error);

            }
        })
    }
</script>