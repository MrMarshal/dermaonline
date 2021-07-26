<div class="col-12">
    <div class="row">
        <div class="col-12 py-5 px-5" style="margin-top: 8rem; background-color:#F2F2F2">
            Home / Productos
        </div>
        <div class="col-12 col-md-8 mx-auto my-5 ">
            <div class="row">
                <div class="col-6 mx-auto col-md-2 p-0 mt-3" style="font-size: 80%;">
                    <a class="link">
                        <p class="text-uppercase mt-5"><strong style="font-weight: 400;">Hola <?php echo $user['name']; ?></strong> </p>
                    </a>
                    <a href="cuenta" class="link" style="background-color: #F2F2F0 !important;">
                        <p class="text-uppercase mt-2"><strong style="font-weight: 400;">mi cuenta</strong> </p>
                    </a>
                    <a href="personal-detail" class="link">
                        <p class="text-uppercase mt-2"><strong style="font-weight: 400;">datos personales</strong> </p>
                    </a>
                    <a href="purchases" class="link">
                        <p class="text-uppercase mt-2"><strong style="font-weight: 400;">mis compras</strong> </p>
                    </a>
                    <a href="logout" class="link">
                        <p class="text-uppercase mt-2"><strong style="font-weight: 400;">cerrar sesión</strong> </p>
                    </a>
                </div>
                <form class="col-12 col-md-10 mx-auto mt-3" id="form_details">
                    <div class="row">
                        <div class="col-12 col-lg-7">
                            <p><strong>MODIFICA TUS DATOS PERSONALES</strong></p>
                            <hr class="my-0">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label class="mb-1 mt-3"><strong>Nombre*</strong></label>
                                    <input class="form-control" required value="" id="name" placeholder="Nombre" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="mb-1 mt-3"><strong>Apellido*</strong></label>
                                    <input class="form-control" required value="" id="lastname" placeholder="Apellido(s)" />
                                </div>
                                <div class="col-12">
                                    <label class="mb-1 mt-3"><strong>Género</strong></label>
                                    <div class="row col-12 ">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Hombre
                                            </label>
                                        </div>
                                        <div class="form-check ml-3">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Mujer
                                            </label>
                                        </div>
                                        <div class="form-check ml-3">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Sin especificar </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <label class="mb-1 mt-3"><strong>Teléfono*</strong></label>
                                    <input class="form-control" required value="" id="phone" placeholder="Teléfono" />
                                </div>
                                <div class="col-12">
                                    <label class="mb-1 mt-3"><strong>Correo</strong></label>
                                    <br>
                                    <span id="email">
                                        mail@mail.com
                                    </span>
                                </div>
                                <div class="col-12">
                                    <label class="mb-1 mt-3"><strong>Nueva dirección de correo</strong></label>
                                    <input class="form-control" type="email" id="new_email" value="" placeholder="mail@mail.com" />
                                </div>
                                <div class="col-12">
                                    <label class="mb-1 mt-3"><strong>Confirma tu dirección de correo</strong></label>
                                    <input class="form-control" type="email" id="confirm_email" value="" placeholder="mail@mail.com" />
                                </div>

                            </div>
                            <hr class="mt-4 mb-2">


                        </div>
                        <div class="col-12 col-md-5">
                            <p><strong>Cambia tu contraseña</strong></p>
                            <hr class="my-0">
                            <div class="col-12 px-0">
                                <label class="mb-1 mt-3"><strong>Contaseña actual</strong></label>
                                <input class="form-control" id="new_password" value="" type="password" placeholder="***" />
                            </div>
                            <div class="col-12 px-0">
                                <label class="mb-1 mt-3"><strong>Nueva contaseña</strong></label>
                                <input class="form-control" id="confirm_password" value="" type="password" placeholder="***" />
                            </div>
                            <hr class="my-4">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-3 text-right">
                            <button class="btn btn-2">Guardar cambios</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>
</div>
<script>
    const form = document.getElementById("form_details");

    const name = document.getElementById("name");
    const lastname = document.getElementById("lastname");
    const phone = document.getElementById("phone");
    const email = document.getElementById("email");
    // 
    const new_email = document.getElementById("new_email");
    const confirm_email = document.getElementById("confirm_email");
    // 
    const new_password = document.getElementById("new_password");
    const confirm_password = document.getElementById("confirm_password");
    let flagEmail = false;
    let flagPassword = false;
    form.addEventListener("submit", (event) => {
        event.preventDefault();
        flagEmail = false;
        flagPassword = false;
        const userId = <?php
                        echo $_SESSION['user']['id'] ?>;
        if (new_email.value || confirm_email.value) {
            if (new_email.value !== confirm_email.value) {
                return alert("Los correos no coinciden");
            } else {
                flagEmail = true;
            }
        }
        if (new_password.value || confirm_password.value) {
            if (new_password.value !== confirm_password.value) {
                return alert("Las contraseñas no coinciden");
            } else {
                flagPassword = true;
            }
        }
        changeDataUser();



    });
    const changeDataUser = () => {
        $.ajax({
            type: "post",
            url: hostname + "/bridge/routes.php?action=updateUserDetail",
            data: {
                name: name.value,
                lastname: lastname.value,
                phone: phone.value
            },
            success: function(res) {
                alert({
                    title: "Listo",
                    text: "Datos guardados con éxito",
                    icon: "success",
                    button: "Listo",
                    time: 5000,
                });
                if (flagEmail) {
                    changeEmailUser();
                } else if (flagPassword) {
                    changePasswordUser();
                } else {
                    window.location.reload();
                }

            },
            error: (error) => {
                errorHandle(error);
            },
        });
    }
    const changeEmailUser = () => {
        $.ajax({
            type: "post",
            url: hostname + "/bridge/routes.php?action=updateEmailDetail",
            data: {
                email: new_email.value,
            },
            success: function(res) {
                alert({
                    title: "Listo",
                    text: "Datos guardados con éxito",
                    icon: "success",
                    button: "Listo",
                    time: 5000,
                });
                if (flagPassword) {
                    changePasswordUser();
                } else {
                    window.location.reload();
                }
            },
            error: (error) => {
                errorHandle(error);
            },
        });
    }
    const changePasswordUser = () => {
        $.ajax({
            type: "post",
            url: hostname + "/bridge/routes.php?action=updatePasswordDetail",
            data: {
                password: new_password.value,
            },
            success: function(res) {
                alert({
                    title: "Listo",
                    text: "Datos guardados con éxito",
                    icon: "success",
                    button: "Listo",
                    time: 5000,
                });
                window.location.reload();
            },
            error: (error) => {
                errorHandle(error);
            },
        });
    }
</script>
<script>
    $(document).ready(() => {
        $.ajax({
            type: "post",
            url: hostname + "/bridge/routes.php?action=getUserDetail",
            data: {},
            success: function(data) {
                let resp = JSON.parse(data);
                name.value = resp.name;
                lastname.value = resp.lastname;
                phone.value = resp.phone;
                email.innerText = resp.email;
            },
            error: (error) => {
                errorHandleAddress(error);
            },
        });

    })
    const errorHandleAddress = (error) => {
        console.log(error);
        switch (error.status) {
            case 400:
                alert("Algo salió mal, intenta más tarde X001BR");
                break;
            case 404:
                break;
            case 401:
                alert("No estás autorizado para esta operación");
                break;
            case 500:
                alert(
                    "Ha ocurrido un error en nuestros servidores, intenta más tarde X001BE"
                );
                break;
            default:
                break;
        }
    };
</script>