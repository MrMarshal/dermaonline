<?php include "partials/header.php"; ?>

<div class="col-12 m-0 p-0">
        <div class="container-1" style="background-color: rgb(194, 194, 194)">
            <img src="./assets/img/Alcoholismo/hero.jpg" alt="" style="width: 100%" />
            <div class="col-12 centered-center mx-0 px-0">
                <div class="text-left col-12 col-md-10 col-lg-5">
                    <div class="back-blue">
                        <div class="d-block d-sm-none">
                            <h2 class="text-white mb-0">
                                Alcoholismo
                            </h2>
                            <p class="p-begin mb-0">El alcoholismo es una <strong>adicción</strong> que genera una fuerte
                                necesidad y ansiedad de ingerir alcohol, de forma que
                                existe una dependencia física y psicológica del mismo
                                individuo, manifestándose a través de varios síntomas
                                de abstinencia cuando no es posible su ingestión</p>
                        </div>
                        <div class="d-none d-sm-block">
                            <h1 class="subtitle-white mb-0">
                                Alcoholismo
                            </h1>
                            <p class="p-begin mt-2 mb-0">El alcoholismo es una <strong>adicción</strong> que genera una fuerte
                                necesidad y ansiedad de ingerir alcohol, de forma que
                                existe una dependencia física y psicológica del mismo
                                individuo, manifestándose a través de varios síntomas
                                de abstinencia cuando no es posible su ingestión</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div style="background-color: #0098F1;">
            <div class="row col-12 mx-0 px-0">
                <div class="col-12 col-sm-6 col-lg-3 p-3">
                    <div class="row col-12 mx-0 px-0">
                        <div class="col-3 mx-0">
                            <img src="./assets/img/Ubicacion.png" alt="" width="25">
                        </div>
                        <div class="col-9 p-sm-white mx-0 px-0">
                            <p class="mb-0">Rio Nazas #15 Col. Vista Hermosa,
                                CP 62290. Cuernavaca, Morelos</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 p-3">
                    <div class="row col-12 mx-0 px-0">
                        <div class="col-3 mx-0">
                            <img src="./assets/img/Correo.png" alt="" width="35">
                        </div>
                        <a href="mailto:Correo@clinicarevive.com">
                            <div class="col-9 p-sm-white mx-0 px-0">
                                <p>Correo@clinicarevive.com</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 p-3">
                    <div class="row col-12 mx-0 px-0">
                        <div class="col-3 mx-0">
                            <img src="./assets/img/Telefono.png" alt="" width="35">
                        </div>
                        <div class="col-9 p-sm-white mx-0 px-0">
                            <p>77 74 30 81 37</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 p-3">
                    <div class="row col-12 mx-0 px-0">
                        <div class="col-3 mx-0">
                            <img src="./assets/img/clock.png" alt="" width="35">
                        </div>
                        <div class="col-9 p-sm-white mx-0 px-0">
                            <p>Disponibles las 24 horas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section id="contacto">
        <div class="container">
            <div class="row my-5">
                <div class="col-12 col-md-6">
                    <h1 class="subtitle-blue">¡Comencemos con
                        tu recuperación!</h1>
                    <p class="text-grey mt-4">Proporcionamos programas de rehabilitación y desintoxicación basados en
                        evidencia que buscan sanar su mente y cuerpo para una verdadera recuperación duradera de la
                        adicción.</p>
                    <!-- formulario -->
                    <form class="col-12 mx-auto mx-0 px-0" id="contactForm" name="sentMessage" novalidate="novalidate">
                        <div class="row">
                            <div class="col-12 col-md-6 mt-3">
                                <input type="text" id="name" class="placeholder form-control" style="background-color: rgba(0, 0, 0, 0.01)" placeholder="Nombre" required />
                                <small>
                                    <p id="nameError" style="color: #0098f1" class="m-0"></p>
                                </small>
                            </div>
                            <div class="col-12 col-md-6 mt-3">
                                <input type="email" id="email" class="placeholder form-control" style="background-color: rgba(0, 0, 0, 0.01)" placeholder="Correo" required />
                                <small>
                                    <p id="emailError" style="color: #0098f1" class="m-0"></p>
                                </small>
                            </div>
                            <div class="col-12 mt-3">
                                <input type="text" id="subject" class="placeholder form-control" style="background-color: rgba(0, 0, 0, 0.01)" placeholder="Tratamiento" required />
                                <small>
                                    <p id="subjectError" style="color: #0098f1" class="m-0"></p>
                                </small>
                            </div>
                            <div class="col-12 mt-3">
                                <textarea rows="5" cols="9" id="msj" name="msj" class="placeholder form-control" style="background-color: rgba(0, 0, 0, 0.01)" value="" placeholder="¿En qué podemos ayudarte?"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <small>
                                    <p id="errorForm" style="color: #fff"></p>
                                </small>
                            </div>
                        </div>
                        <div class="row col-12 pb-4 mx-0 px-0">
                            <input type="submit" class="btn btn-blue text-white mx-auto px-5 py-2" style="font-weight: bold;" id="sendMessageButton" type="submit" value="Enviar" />
                        </div>
                    </form>
                    <!-- fin de formulario -->
                </div>
                <div class="col-12 col-md-5 ml-auto">
                    <img src="./assets/img/Contacto.jpg" alt="" class="img img-fluid">
                    <div class="mt-2" style="background-color: #e3e3e3;">
                        <div class="row p-5">
                            <div class="col-12 col-lg-2 mt-2">
                                <div class="circle-blue mx-auto text-center pt-3">
                                    <img src="./assets/img/Telefono.png" alt="" class="col-11">
                                </div>
                            </div>
                            <div class="col-12 col-lg-9 mx-auto mt-2">
                                <p class="mb-0" style="color: #0098f1;">COMUNÍCATE CON NOSOTROS</p>
                                <h4 class="mb-0">77 74 30 81 37</h4>
                                <p style="color: #848484; font-size: 13px;">En clínica revive ofrecemos un tratamiento
                                    residencial y personalizado</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="col-12 m-0 p-0">
            <div class="container-1" style="background-color: rgb(194, 194, 194)">
                <img src="./assets/img/Alcoholismo/banner.jpg" alt="" style="width: 100%" />
                <div class="col-12 col-sm-11 col-lg-5 centered-left text-left">
                    <h1 class="col-12 letter-white">
                        Clínica revive brinda
                        tratamiento residencial
                        de 90 días
                    </h1>

                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col-12 col-lg-6 mt-3">
                    <div class="col-12 centered-lg mx-0 px-0">
                        <h1 class="subtitle-blue">Clínica
                            Revive</h1>
                        <div class="text-grey col-12 col-lg-10 mx-0 px-0">
                            <p>
                                Somos una clínica de rehabilitación de adicciones enfocada al tratamiento integral
                                (humano) que
                                busca fomentar el autoconocimiento y la auto responsabilización llegando así a alcanzar
                                un
                                estado emocional que te permite hacer un cambio real en tu vida y recuperando tu sano
                                juicio.
                            </p>
                            <p class="mt-3">Es por eso que contamos con un equipo de especialistas que estarán a cargo
                                de brindarte un servicio de dignidad y respeto, donde se te estará guiando y acompañando
                                para
                                promover un cambio de vida real.
                            </p>
                            <p class="mt-3">En Clínica Revive creemos que cada paciente es único y por lo tanto sus
                                necesidades también lo son, por lo tanto, el tratamiento es personalizado y enfocado a
                                cada
                                persona.
                            </p>
                            <p class="mt-3">Por eso al llegar con nosotros tu o tu familiar estarán acompañados en
                                cada paso durante el internamiento y en cada momento de tu vida.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mt-3">
                    <img src="./assets/img/Quienes_01.jpg" alt="" class="img img-fluid">
                </div>
            </div>
        </div>
    </section>


    <section>
        <div style="background-color: #e3e3e3;">
            <div class="container">
                <div class="row col-12 mx-0 px-0 pb-5">
                    <div class="col-12 col-md-6 col-lg-4 mx-auto text-center mt-5">
                        <img src="./assets/img/Alcoholismo/ico_personal.png" alt="" width="60">
                        <h5 class="letter-nav mt-3" style="font-weight: bold;">Personal altamente calificado</h5>
                        <p class="text-grey">Lorem ipsum dolor sit amet, consetetur
                            sadipscing elitr, sed diam nonumy </p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mx-auto text-center mt-5">
                        <img src="./assets/img/Alcoholismo/ico_instalacion.png" alt="" width="50">
                        <h5 class="letter-nav mt-3" style="font-weight: bold;">Instalaciones de primer nivel</h5>
                        <p class="text-grey">Lorem ipsum dolor sit amet, consetetur
                            sadipscing elitr, sed diam nonumy </p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mx-auto text-center mt-5">
                        <img src="./assets/img/Alcoholismo/ico_atencion.png" alt="" width="50">
                        <h5 class="letter-nav mt-3" style="font-weight: bold;">Atención personalizada</h5>
                        <p class="text-grey">Lorem ipsum dolor sit amet, consetetur
                            sadipscing elitr, sed diam nonumy </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div>
            <div class="text-center pt-5">
                <h1 class="subtitle-blue">Tratamiento residencial</h1>
                <h1 class="subtitle-blue">de 90 días</h1>
            </div>
            <div class="container pb-5">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 pt-5">
                        <div class="circulo mx-auto text-center mb-5">
                            <h1 class="subtitle-blue pt-2">1</h1>
                        </div>
                        <div style="color: #002236;">
                            <p><i class="fas fa-circle" style="font-size: 10px;"></i> Prueba Covid-19</p>
                            <p><i class="fas fa-circle" style="font-size: 10px;"></i>
                                Toma de laboratorios.
                            </p>
                            <p><i class="fas fa-circle" style="font-size: 10px;"></i> Proceso de desintoxicación.</p>
                            <p><i class="fas fa-circle" style="font-size: 10px;"></i> Valoración médica y psicológica.
                            </p>
                            <p><i class="fas fa-circle" style="font-size: 10px;"></i> Identificación de perdidas.</p>
                            <p><i class="fas fa-circle" style="font-size: 10px;"></i> Desarrollo de herramientas
                                emocionales.</p>
                            <p class="col-lg-11 mx-0 px-0"><i class="fas fa-circle" style="font-size: 10px;"></i>
                                Identificación de metas y desarrollo de
                                plan de vida.</p>
                            <p><i class="fas fa-circle" style="font-size: 10px;"></i> Habilidades sociales.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 pt-5">
                        <div class="circulo mx-auto text-center mb-5">
                            <h1 class="subtitle-blue pt-2">2</h1>
                        </div>
                        <div style="color: #002236;">
                            <p class="col-lg-11 mx-0 px-0"><i class="fas fa-circle" style="font-size: 10px;"></i>
                                Adquirir herramientas para poder afrontar situaciones de riesgo que puedan ocasionar una
                                recaída (prevención).
                            </p>
                            <p><i class="fas fa-circle" style="font-size: 10px;"></i> Desarrollo de metas y plan de
                                vida.</p>
                            <p><i class="fas fa-circle" style="font-size: 10px;"></i> Terapia familiar.</p>
                            <p><i class="fas fa-circle" style="font-size: 10px;"></i> Restaurar vínculos familiares.</p>
                            <p><i class="fas fa-circle" style="font-size: 10px;"></i> Crear una red de apoyo.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 pt-5 mx-auto">
                        <div class="circulo mx-auto text-center mb-5">
                            <h1 class="subtitle-blue pt-2">3</h1>
                        </div>
                        <div style="color: #002236;">
                            <p><i class="fas fa-circle" style="font-size: 10px;"></i> Reforzamiento de metas y plan de
                                vida.</p>
                            <p><i class="fas fa-circle" style="font-size: 10px;"></i> Desarrollo de vida emocional.</p>
                            <p><i class="fas fa-circle" style="font-size: 10px;"></i> Programa familiar e individual.
                            </p>
                            <p><i class="fas fa-circle" style="font-size: 10px;"></i> Red de apoyo establecida.</p>
                            <p><i class="fas fa-circle" style="font-size: 10px;"></i> Seguimiento de un año.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="py-5" style="background-color: #e3e3e3;">
            <div class="text-center">
                <h1 class="subtitle-blue">Testimonios</h1>
                <p style="color: #848484;">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam </p>
            </div>
            <div class="container">
                <div class="row col-12 mx-0 px-0">
                    <div class="col-12 col-md-6 col-lg-4 mx-auto mt-5">
                        <div class="circulo mx-auto text-center mb-4">
                            <i class="fas fa-user-alt mt-2" style="font-size: 50px;"></i>
                        </div>
                        <div class="text-center">
                            <h5 class="letter-nav">Nombre Apellido</h5>
                            <p style="color: #848484;">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mx-auto mt-5">
                        <div class="circulo mx-auto text-center mb-4">
                            <i class="fas fa-user-alt mt-2" style="font-size: 50px;"></i>
                        </div>
                        <div class="text-center">
                            <h5 class="letter-nav">Nombre Apellido</h5>
                            <p style="color: #848484;">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mx-auto mt-5">
                        <div class="circulo mx-auto text-center mb-4">
                            <i class="fas fa-user-alt mt-2" style="font-size: 50px;"></i>
                        </div>
                        <div class="text-center">
                            <h5 class="letter-nav">Nombre Apellido</h5>
                            <p style="color: #848484;">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section>
        <div class="container my-5">
            <div class="row">
                <div class="col-12 col-lg-4 pb-4">
                    <h1 class="subtitle-blue">Nuestros tratamientos</h1>
                    <p class="text-grey mt-3">Brindamos programas efectivos de rehabilitación y desintoxicación basados
                        en evidencia que buscan sanar su mente y cuerpo para una verdadera recuperación duradera de la
                        adicción.</p>
                    <a href="tratamientos.php">
                        <button class="btn btn-blue text-white px-5 py-2 mt-3">
                            Conocer más
                        </button>
                    </a>
                </div>
                <div class="row col-12 col-lg-8 mx-0 px-0">
                    <div class="col-12 col-md-6 p-1">
                        <div class="container1">
                            <img src="./assets/img/Alcoholismo.jpg" alt="" class="img img-fluid">
                            <div class="overlay">
                                <div class="row text col-12 m-0 p-0">
                                    <div class="col-12">
                                        <h4 style="font-weight: bold;">Alcoholismo</h4>
                                        <p class="mt-3 mb-0" style="font-size: 13px;">
                                            Enfermedad crónica caracterizada por la ingesta descontrolada de alcohol y
                                            preocupación por el consumo.
                                        </p>
                                        <a href="alcoholismo.php">
                                            <button class="btn text-white mx-0 px-0">
                                                Ver más
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 p-1">
                        <div class="container1">
                            <img src="./assets/img/Drogadiccion.jpg" alt="" class="img img-fluid">
                            <div class="overlay">
                                <div class="row text col-12 m-0 p-0">
                                    <div class="col-12">
                                        <h4 style="font-weight: bold;">Drogadicción</h4>
                                        <p class="mt-3 mb-0" style="font-size: 13px;">
                                            Enfermedad crónica que se caracteriza por la búsqueda y el consumo
                                            compulsivo de la droga.
                                        </p>
                                        <a href="drogadiccion.php">
                                            <button class="btn text-white mx-0 px-0">
                                                Ver más
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row col-12 mx-0 px-0">
                    <div class="col-12 col-md-6 col-lg-4 p-1">
                        <div class="container1">
                            <img src="./assets/img/Ansiedad.jpg" alt="" class="img img-fluid">
                            <div class="overlay">
                                <div class="row text col-12 m-0 p-0">
                                    <div class="col-12">
                                        <h4 style="font-weight: bold;">Ansiedad</h4>
                                        <p class="mt-3 mb-0" style="font-size: 13px;">
                                            La ansiedad es un sentimiento de miedo, temor e inquietud.
                                        </p>
                                        <a href="ansiedad.php">
                                            <button class="btn text-white mx-0 px-0">
                                                Ver más
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 p-1">
                        <div class="container1">
                            <img src="./assets/img/Alimenticios.jpg" alt="" class="img img-fluid">
                            <div class="overlay">
                                <div class="row text col-12 m-0 p-0">
                                    <div class="col-12">
                                        <h4 style="font-weight: bold;">Alimenticios</h4>
                                        <p class="mt-3 mb-0" style="font-size: 13px;">
                                            Afecciones graves de salud mental. Implican problemas serios sobre cómo se
                                            piensa sobre la comida y la conducta alimenticia.
                                        </p>
                                        <a href="transtornosAlimenticios.php">
                                            <button class="btn text-white mx-0 px-0">
                                                Ver más
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 p-1 mx-auto">
                        <div class="container1">
                            <img src="./assets/img/Depresion.jpg" alt="" class="img img-fluid">
                            <div class="overlay">
                                <div class="row text col-12 m-0 p-0">
                                    <div class="col-12">
                                        <h4 style="font-weight: bold;">Depresión</h4>
                                        <p class="mt-3 mb-0" style="font-size: 13px;">
                                            Trastorno que se puede diagnosticar de forma fiable y que puede ser tratado
                                            por no especialistas en el ámbito de la atención primaria.
                                        </p>
                                        <a href="depresion.php">
                                            <button class="btn text-white mx-0 px-0">
                                                Ver más
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="row col-12 mx-0 px-0 py-3" style="background-color: #e4e4e4;">
            <div class="col-12 col-md-6 mx-0 px-0 order-2 order-md-1">
                <img src="./assets/img/Tratamientos_03.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-12 col-md-6 mx-0 px-0 order-1 order-md-2">
                <div class="centered-md col-12 col-lg-9">
                    <h1 class="subtitle-blue">Ingresos voluntarios
                        e involuntarios
                        las 24 horas</h1>
                </div>
            </div>
        </div>
    </section>

<?php include "partials/footer.php"; ?>