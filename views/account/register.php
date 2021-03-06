<section class="row container mx-auto" style="margin-top: 5rem;">

    <div class="d-none d-md-block col-12 col-md-6 mx-auto px-5 my-5">
        <img src="./assets/images/imagen-registro.jpg" class="img-fluid" />
    </div>
    <div class="col-12 col-md-6 mx-auto px-5 my-5">
        <h1 class="mt-5">Registrarse</h1>
        <form id="register" class="mt-3">
            <input type="text" id="name" style="height: 3rem !important;" required class="form-control mt-2 mb-3" value="" placeholder="Nombre(s)" />
            <input type="text" id="secondNames" style="height: 3rem !important;" required class="form-control mt-2 mb-3" value="" placeholder="Apellido(s)" />
            <input type="text" id="phoneNumber" style="height: 3rem !important;" required class="form-control mt-2 mb-3" value="" placeholder="Número teléfonico" />
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

    $("#register").on("submit", (event) => {
        event.preventDefault();
        let email = $("#email").val();
        let password = $("#password").val();
        let name = $("#name").val();
        let lastname = $("#secondNames").val();
        let phone = $("#phoneNumber").val();
        let nickname = email.split("@")[0];
        $.ajax({
            url: "./bridge/routes.php?action=registerNewUser",
            type: "POST",
            data: {
                name,
                email,
                password,
                lastname,
                phone,
                nickname
            },
            success: (data) => {
                data = JSON.parse(data);
                if (data.register==true){
                    location.href = "login";
                }else{
                    alert({
                        title:"Error",
                        text:data.message
                    })
                }
            },
            error: (error) => {
                errorHandle(error);

            }
        })
    })
    
</script>