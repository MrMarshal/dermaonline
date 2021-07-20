<section class="row container mx-auto" style="margin-top: 5rem;">

    <div class="d-none d-md-block col-12 col-md-6 mx-auto px-5 my-5">
        <img src="./assets/images/imagen-registro.jpg" class="img-fluid" />
    </div>
    <div class="col-12 col-md-6 mx-auto px-5 my-5">
        <h1 class="mt-5">Registrarse</h1>
        <form id="login" class="mt-3">
            <input type="email" id="email" style="height: 3rem !important;" required class="form-control mt-2 mb-3" value="" placeholder="Correo electrónico" />
            <input type="password" id="password" style="height: 3rem !important;" requiered class="form-control" value="" placeholder="Contraseña" />
            <label class="text-left mt-3 mb-3">
                <input type="checkbox" required id="accept"><small class="ml-2">He leído y acepto las <a class="text-dark" href="terms"><u>Condiciones de uso, Privacidad, Cookies
                            y correos electrónicos</u></a></small>
            </label>
            <input type="submit" class="btn btn-2 col-12 py-2" value="Registrarse" />
        </form>
    </div>
</section>
<script>
    let form = document.getElementById("login");
    let email = document.getElementById("email");
    let password = document.getElementById("password");
    form.addEventListener("submit", (event) => {
        event.preventDefault();
        debugger;
        register(email.value, password.value);
    })
    const register = (user, password) => {
        debugger;

        $.ajax({
            url: "/bridge/routes.php?action=register",
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