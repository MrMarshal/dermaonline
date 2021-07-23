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
                <div class="col-12 col-md-10 mx-auto mt-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Mi cuenta</h1>
                            <hr class="my-0">
                            <p class="mt-4 mb-3"><strong>Dirección principal</strong></p>
                            <p class="mb-4"><small id="address_prefired">No tienes una dirección en tu lista.</small></p>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn b-tags px-5" data-toggle="modal" data-target="#modalAddress">Crear dirección</button>

                            <!-- Modal -->
                            <div class="modal fade" id="modalAddress" tabindex="-1" role="dialog" aria-labelledby="modalAddressLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalAddressLabel">Nueva dirección</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form id="form_new_address">
                                            <div class="modal-body col-11 mx-auto">
                                                <div class="row">
                                                    <div class="mb-3 col-12">
                                                        <p class="mb-1"><strong>Nombre de la dirección</strong></p>
                                                        <input class="form-control" required id="name_address" style="height: 3rem;" />
                                                    </div>
                                                    <div class="mb-3 col-12 col-md-6">
                                                        <p class="mb-1"><strong>Nombre</strong></p>
                                                        <input class="form-control" required id="name" style="height: 3rem;" />
                                                    </div>
                                                    <div class="mb-3 col-12 col-md-6">
                                                        <p class="mb-1"><strong>Apellido</strong></p>
                                                        <input class="form-control" required id="second_name" style="height: 3rem;" />
                                                    </div>
                                                    <div class="mb-3 col-12">
                                                        <p class="mb-1"><strong>Teléfono</strong></p>
                                                        <input class="form-control" id="phone" style="height: 3rem;" />
                                                    </div>
                                                    <div class="mb-3 col-12">
                                                        <p class="mb-1"><strong>Teléfono celular</strong></p>
                                                        <input class="form-control" required id="phone_mobile" style="height: 3rem;" />
                                                    </div>
                                                    <div class="mb-3 col-12">
                                                        <p class="mb-1"><strong>Código postal</strong></p>
                                                        <input class="form-control" required id="cp" style="height: 3rem;" maxlength="6" />
                                                    </div>
                                                    <div class="mb-3 col-12">
                                                        <p class="mb-1"><strong>Calle</strong></p>
                                                        <input class="form-control" required id="street" style="height: 3rem;" />
                                                    </div>
                                                    <div class="mb-3 col-12 col-md-6">
                                                        <p class="mb-1"><strong>Exterior</strong></p>
                                                        <input class="form-control" required id="exterior" style="height: 3rem;" />
                                                    </div>
                                                    <div class="mb-3 col-12 col-md-6">
                                                        <p class="mb-1"><strong>Interior</strong></p>
                                                        <input class="form-control" id="interior" style="height: 3rem;" />
                                                    </div>
                                                    <div class="mb-3 col-12">
                                                        <p class="mb-1"><strong>Colonia</strong></p>
                                                        <input class="form-control" required id="colonia" style="height: 3rem;" />
                                                    </div>
                                                    <div class="mb-3 col-12">
                                                        <p class="mb-1"><strong>Referencia</strong></p>
                                                        <textarea class="form-control" id="references" style="height: 3rem;"></textarea>
                                                    </div>
                                                    <div class="mb-3 col-12">
                                                        <p class="mb-1"><strong>Ciudad</strong></p>
                                                        <input class="form-control" required id="city" style="height: 3rem;" />
                                                    </div>
                                                    <div class="mb-3 col-12">
                                                        <p class="mb-1"><strong>Estado</strong></p>
                                                        <input class="form-control" required id="state" style="height: 3rem;" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer pt-0" style="border-top: 0px solid #dee2e6;">
                                                <input type="submit" class="btn btn-2 col-md-6 m-0" value="Guardar" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <hr class="">
                            <div class="row px-3">
                                <p class="mr-auto"><strong>MIS PEDIDOS</strong> </p>
                                <p class="ml-auto"><u><small>Ver todos</small></u></p>
                            </div>
                            <p class="mb-4"><small>No tienes pedidos registrados.</small></p>

                        </div>
                        <div class="col-md-6">
                            <h1 class="d-none d-md-block">&nbsp;</h1>
                            <hr class="mt-0 mb-4">
                            <p class="mr-auto"><strong>¿NECESITAS AYUDA?</strong> </p>
                            <p class="mb-4"><small>Manda un mail a atencion@dermaonline.com o <br />
                                    Llama al 800-737-4072<br />
                                    Lunes a Viernes - 9:00 a 18:00 <br />
                                    Sábado y Domingo - 9:00 a 15:00.</small></p>
                            <hr class="">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    const form = document.getElementById("form_new_address");
    const name_address = document.getElementById("name_address");
    const name = document.getElementById("name");
    const second_name = document.getElementById("second_name");
    const phone = document.getElementById("phone");
    const phone_mobile = document.getElementById("phone_mobile");
    const cp = document.getElementById("cp");
    const street = document.getElementById("street");
    const exterior = document.getElementById("exterior");
    const interior = document.getElementById("interior");
    const colonia = document.getElementById("colonia");
    const references = document.getElementById("references");
    const city = document.getElementById("city");
    const state = document.getElementById("state");

    form.addEventListener("submit", (event) => {
        event.preventDefault();
        const userId = <?php
                        echo $_SESSION['user']['id'] ?>;
        $.ajax({
            type: "post",
            url: hostname + "/bridge/routes.php?action=registerNewAddress",
            data: {
                principal: 1,
                user_id: userId,
                address: street.value,
                state_id: state.value,
                townhall: colonia.value,
                zipcode: cp.value,
                status: 1,
                name_address: name_address.value,
                name: name.value,
                second_name: second_name.value,
                phone: phone.value,
                phone_mobile: phone_mobile.value,
                exterior: exterior.value,
                interior: interior.value,
                reference: references.value
            },
            success: function(res) {
                alert({
                    title: "Listo",
                    text: "La dirección ha sido guardada con éxito",
                    icon: "success",
                    button: "Listo",
                    time: 2000,
                });
                window.location.reload();
            },
            error: (error) => {
                errorHandle(error);
            },
        });
    });
</script>
<script>
    $(document).ready(() => {
        $.ajax({
            type: "post",
            url: hostname + "/bridge/routes.php?action=GetAddressPrefired",
            data: {},
            success: function(data) {
                let resp = JSON.parse(data);
                $("#address_prefired").html(`<strong>${resp.name_address}</strong> ${resp.name} ${resp.second_name} <strong>Dirección:</strong>${resp.address} Estado: ${resp.state_id} Colonia: ${resp.townhall} CP : ${resp.zipcode}`);
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