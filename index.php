<?php
require 'flight/Flight.php';
include "classes/LoadModels.php";
define('__ROOT__', "http://localhost/dermaonline");

Flight::route('/', function () {
    Flight::render('home', ['title' => 'Home', 'desc' => 'lll', "js" => null]);
});

Flight::route('/acerca', function () {
    Flight::render('acerca', ['title' => 'Nosotros', 'desc' => 'lll']);
});

Flight::route('/categorias', function () {
    Flight::render('categorias', ['title' => 'Nosotros', 'desc' => 'lll']);
});

Flight::route('/cuenta', function () {
    Flight::render('cuenta', ['title' => 'Nosotros', 'desc' => 'lll']);
});

Flight::route('/contacto', function () {
    Flight::render('contacto', ['title' => 'Nosotros', 'desc' => 'lll']);
});

Flight::route('/tienda(/@page)(/@price_range)(/@category)', function ($page, $price_range, $category) {
    $admin = new Model;
    Flight::render('shop/index', ['title' => 'Nosotros', 'desc' => 'lll', 'css' => ["shop"], "page" => $page, "price_range" => $price_range, "category" => $category, "admin" => $admin]);
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


Flight::route('/admin/', function () {
    $admin = new Model;
    Flight::set('flight.views.path', 'intranet');
    Flight::render('dashboard/index', ['title' => 'Nosotros', 'desc' => 'lll', "admin" => $admin]);
});


Flight::start();
