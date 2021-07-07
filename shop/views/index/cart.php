<?php
$cart = $data['cart'];
var_dump($cart);
/*var_dump($cart);
    foreach ($cart['orders'] as $order) {
        echo "Orden: ";
        var_dump($order);
        echo "<br>";
        echo "<br>";
    }*/
echo "Hola";
?>
<section>
    <div class="col-11 mx-auto my-5">
        <div class="row">
            <div class="col-lg-8 col-xl-9 order-12 order-lg-1">
                <div class="row">
                    <div class="d-none d-md-block col-md-2">
                    </div>
                    <div class="d-none d-md-block col-md-4 p-0 text-center">
                        <small><strong>Nombre del producto</strong></small>
                    </div>
                    <div class="d-none d-md-block col-md-2 p-0 text-center">
                        <small><strong>Precio unitario</strong></small>
                    </div>
                    <div class="d-none d-md-block col-md-1 p-0 text-center">
                        <small><strong>Cantidad</strong></small>
                    </div>
                    <div class="d-none d-md-block col-md-2 p-0 text-center">
                        <small><strong>Subtotal</strong></small>
                    </div>
                    <div class="d-none d-md-block col-md-1">
                        <small><strong>Eliminar</strong></small>
                    </div>
                    <div class="d-none d-md-block col-12">
                        <hr>
                    </div>
                    <!-- TARJETA DEL PRODUCTO x1 -->

                    <?php
                    foreach ($cart['orders'] as $order) {
                        $product = $order['product'];
                        $img = $product['image_1'];
                        if (strpos($img, "https://drive.google.com/open")) {
                            $img = "https://drive.google.com/uc?export=view&id=" . explode('id=', $product['image_1'])[1];
                        }
                    ?>
                        <div class="row" id="order_<?php echo $order['id']; ?>_container">
                            <div class="col-md-2 text-center">
                                <img class="img-fluid" src="<?php echo $img; ?>" />
                            </div>
                            <div class="col-md-4 text-center">
                                <p>
                                    <!-- Esto es solo para movil para que se vea bien -->
                                    <span class="d-block d-md-none">
                                        <small>
                                            <strong><?php echo $product['name']; ?></strong>
                                        </small>
                                    </span>
                                    <!-- Esto es solo para movil para que se vea bien -->
                                    <strong><?php echo $product['name']; ?></strong>
                                </p>
                                <small class="text-muted text-justify"><?php echo $product['description']; ?> </small>
                            </div>
                            <div class="col-3 mx-auto col-md-2 p-0 text-center">
                                <span class="d-block d-md-none">
                                    <!-- Esto es solo para movil para que se vea bien -->
                                    <span class="d-block d-md-none">
                                        <small>
                                            <strong>Precio unitario
                                            </strong>
                                        </small>
                                    </span>
                                    <!-- Esto es solo para movil para que se vea bien -->
                                </span> $ <?php echo $product['price']; ?>
                            </div>
                            <div class="col-3 mx-auto col-md-1 p-0 text-center">
                                <!-- Esto es solo para movil para que se vea bien -->
                                <span class="d-block d-md-none">
                                    <small>
                                        <strong>Cantidad
                                        </strong>
                                    </small>
                                </span>
                                <!-- Esto es solo para movil para que se vea bien -->
                                <input type="number" class="form-control p-0 text-center col-md-12 col-6 mx-auto" value="<?php echo $order['quantity']; ?>" min="0" max="10" onchange="selectQuantity(this,<?php echo $order['id']; ?>);" />
                            </div>
                            <div class="col-3 mx-auto col-md-2 p-0 text-center">
                                <!-- Esto es solo para movil para que se vea bien -->
                                <span class="d-block d-md-none">
                                    <small>
                                        <strong>Subtotal
                                        </strong>
                                    </small>
                                </span>
                                <!-- Esto es solo para movil para que se vea bien -->
                                $ <span id="order_<?php echo $order['id']; ?>_cost"><?php echo $order['cost']; ?></span>
                            </div>
                            <div class="col-1 mx-auto col-md-1 p-0 text-center">
                                <!-- Esto es solo para movil para que se vea bien -->
                                <span class="d-block d-md-none text-left">
                                    <small>
                                        <strong>Eliminar
                                        </strong>
                                    </small>
                                </span>
                                <!-- Esto es solo para movil para que se vea bien -->
                                <div class="close-btn" onclick="deleteOrder(<?php echo $order['id']; ?>)">
                                    <img src="../assets/icons/cross.png" width="20" class="mt-1" />
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                        </div>

                    <?php } ?>
                    <!-- FIN DE TARJETA DEL PRODUCTO -->

                </div>
            </div>
            <div class="col-lg-4 col-xl-3 my-5 order-1 order-lg-12">
                <div class="card text-center py-5 px-4">
                    <div class="row">
                        <div class="col-12">
                            <h4>Tu carrito</h4>
                        </div>
                        <div class="col-4 my-2 text-left"><strong>Envio:</strong></div>
                        <div class="col-8 my-2 text-right"><strong>$ <span id="cart_shipping"><?php echo $cart['shipping']; ?></span></strong></div>
                        <div class="col-5 my-2 text-left"><strong>Subtotal:</strong></div>
                        <div class="col-7 my-2 text-right"><strong>$ <span id="cart_subtotal"><?php echo $cart['total'] - $cart['shipping']; ?></span></strong></div>
                        <!--<div class="col-5 my-2 text-left"><strong>Descuento:</strong></div>
                        <div class="col-7 my-2 text-right"><strong>$ 112.20</strong></div>-->
                        <div class="col-4 my-2 text-left"><strong>
                                <h5>Total:</h5>
                            </strong></div>
                        <div class="col-8 text-right">
                            <strong>
                                <span class="ml-5">$ <span id="cart_total"><?php echo $cart['total']; ?></span></span>
                            </strong>
                        </div>
                        <div class="col-12">
                            <?php define("PaypalTotalInvoice", $cart['total']); ?>
                            <?php include 'paypalCheckout.php'; ?>

                            <!--<button class="btn btn-primary w-100 text-uppercase py-2">Pagar</button>-->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<style type="text/css">
    .close-btn {
        cursor: pointer;
    }
</style>

<script type="text/javascript">



</script>


<script type="text/javascript">
    function deleteOrder(id) {
        if (confirm("¿Deseas quitar este producto?")) {
            $.ajax({
                type: "post",
                url: "../bridge/routes.php?action=deleteOrder",
                data: {
                    id: id
                },
                success: function(res) {
                    res = JSON.parse(res);
                    $("#cart_total").html(res.total);
                    $("#cart_subtotal").html(res.subtotal);
                    $("#order_" + id + "_container").hide();
                }
            })
            return true;
        }
        return false;
    }

    function selectQuantity(ele, id) {
        let q = $(ele).val();
        if (q == 0) {
            if (!deleteOrder(id)) {
                $(ele).val(1);
            }
        } else {
            $.ajax({
                type: "post",
                url: "../bridge/routes.php?action=updateOrder",
                data: {
                    order_id: id,
                    quantity: q
                },
                success: function(res) {
                    res = JSON.parse(res);
                    let cost = res.cost;
                    $("#cart_total").html(res.total);
                    $("#cart_subtotal").html(res.subtotal);
                    $("#order_" + id + "_cost").html(cost);
                }
            });
        }
    }
</script>