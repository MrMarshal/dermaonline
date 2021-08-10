<?php
require 'flight/Flight.php';
include "classes/LoadModels.php";
define('__ROOT__', "http://localhost/dermaonline");

Flight::route('/', function () {
    Flight::render('landings/home', ['title' => 'Home', 'desc' => 'lll', "js" => null]);
});

Flight::route('/acerca', function () {
    Flight::render('landings/acerca', ['title' => 'Nosotros', 'desc' => 'lll']);
});

Flight::route('/categorias', function () {
    $admin = new Model;
    Flight::render('landings/categorias', ['title' => 'Nosotros', 'desc' => 'lll', "admin" => $admin]);
});

Flight::route('/contacto', function () {
    Flight::render('landings/contacto', ['title' => 'Nosotros', 'desc' => 'lll']);
});

Flight::route('/tienda(/@page)(/@price_range)(/@category)', function ($page, $price_range, $category) {
    $admin = new Model;
    Flight::render('shop/index', ['title' => 'Nosotros', 'desc' => 'lll', 'css' => ["shop"], "page" => $page, "price_range" => $price_range, "category" => $category, "admin" => $admin]);
});

Flight::route('/result/@code', function ($code) {
    Flight::render('shop/results/' . $code, ['title' => 'Nosotros', 'desc' => 'lll']);
});

Flight::route('/producto/@product', function ($product) {
    $admin = new Model;
    Flight::render('shop/product_detail', ['title' => 'Nosotros', 'desc' => 'lll', "product" => $product, "admin" => $admin]);
});

Flight::route('/carrito', function () {
    $admin = new Model;
    Flight::render('shop/cart', ['title' => 'Nosotros', 'desc' => 'lll', "admin" => $admin]);
});

Flight::route('/finalizar-compra', function () {
    $admin = new Model;
    Flight::render('shop/end_purchase', ['title' => 'Nosotros', 'desc' => 'lll', "admin" => $admin]);
});

Flight::route('/login', function () {
    session_start();
    if (isset($_SESSION['login']) && $_SESSION['login'] == 1) Flight::redirect("cuenta");
    Flight::render('account/login', ['title' => 'Iniciar sesión', 'desc' => 'lll']);
});

Flight::route('/logout', function () {
    session_start();
    session_destroy();
    Flight::redirect("/");
});

Flight::route('/register', function () {
    session_start();
    if (isset($_SESSION['login']) && $_SESSION['login'] == 1) Flight::redirect("cuenta");
    Flight::render('account/register', ['title' => 'Registro', 'desc' => 'lll']);
});
Flight::route('/cuenta', function () {
    session_start();
    if (!isset($_SESSION['login']) || $_SESSION['login'] != 1) return Flight::redirect("login");
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : "";
    Flight::render('account/cuenta', ['title' => 'Mi cuenta', 'desc' => 'lll', "user" => $user]);
});
Flight::route('/personal-detail', function () {
    session_start();
    if (!isset($_SESSION['login']) || $_SESSION['login'] != 1) return Flight::redirect("login");
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : "";
    Flight::render('account/detail', ['title' => 'Detalles personales', 'desc' => 'lll', "user" => $user]);
});


Flight::route('/admin/', function () {
    $admin = new Model;
    Flight::set('flight.views.path', 'intranet');
    Flight::render('dashboard/index', ['title' => 'Nosotros', 'desc' => 'lll', "admin" => $admin]);
});


Flight::start();
