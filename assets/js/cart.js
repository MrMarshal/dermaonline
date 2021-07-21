$(document).ready(function () {});

const hostname = "/deskrive/dermaonline";
let aux = "";
let total = 0.0;
let subtotal = 0.0;
let ship = 0.0;
let discount = 0;

const errorHandle = (error) => {
  console.log(error);
  switch (error.status) {
    case 400:
      alert("Algo salió mal, intenta más tarde X001BR");
      break;
    case 404:
      alert("El recurso no se ha encontrado");
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

const addToCart = (id) => {
  $.ajax({
    type: "post",
    url: hostname + "/bridge/routes.php?action=addToCart",
    data: {
      id: id,
      quantity: 1,
    },
    success: function (res) {
      console.log(res);
      alert({
        title: "Listo",
        text: "Producto añadido con éxito",
        icon: "success",
        button: "Listo",
        time: 2000,
      });
    },
    error: (error) => {
      errorHandle(error);
    },
  });
};

const removeFromCart = (id) => {
  Swal.fire({
    title: "¿Deseas eliminar esta orden del carrito?",
    showDenyButton: true,
    showCancelButton: true,
    icon: "warning",
    confirmButtonText: `Eliminar`,
    denyButtonText: `Cancelar`,
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "get",
        url: "./bridge/routes.php?action=deleteOrder",
        data: {
          id: id,
        },
        success: function (res) {
          console.log(res);
          let data = JSON.parse(res);
          getCart();
          alert({
            title: "Listo",
            text: "Orden eliminada con éxito",
            icon: "success",
            button: "Listo",
            time: 2000,
          });
        },
        error: (error) => {
          errorHandle(error);
        },
      });
    } else if (result.isDenied) {
    }
  });
};

const getCart = (container = "draw_cart") => {
  $.ajax({
    type: "get",
    url: "./bridge/routes.php?action=getCart",
    data: {},
    success: function (res) {
      let data = JSON.parse(res);
      console.log(data)
      if (data.orders.length == 0) window.location.reload();
      console.log(data)
      ship = Number(data.shipping);
      discount = Number(data.discount);
      draw(container, data.orders);
    },
    error: (error) => {
      errorHandle(error);
    },
  });
};

const updateCart = (order_id, quantity) => {
  $.ajax({
    type: "post",
    url: "./bridge/routes.php?action=updateOrder",
    data: {
      order_id: order_id,
      quantity: quantity,
    },
    success: function (res) {
      getCart();
    },
    error: (error) => {
      errorHandle(error);
    },
  });
};

const draw = (container, list = []) => {
  aux = "";
  list.forEach((x) => {
    subtotal = subtotal + parseFloat(x.cost);
    aux += `
    <div class='row mt-3'>
		<div class='col-1 col-sm-2 pt-5 text-right'>
			<button class='btn mx-3 px-0' onclick="removeFromCart(${
        x.id
      })"><i class="fas fa-times"></i></button>
		</div>
		<div class='col-5 col-sm-2 p-0'>
			<img src='${x.product_img.url}' class='img-fluid'>
		</div>
		<div class='col-6 col-sm-2 pt-5 text-center'>
			<strong class='d-block d-md-none'>
				PRODUCTO
			</strong>
      ${x.product.name}
		</div>
		<div class='col-6 col-sm-2 pt-5 text-center'>
			<strong class='d-block d-md-none'>
				PRECIO
			</strong>${toMoney(x.cost / x.quantity)}</div>
		<div class='col-6 col-sm-2 pt-5 text-center'>
			<strong class='d-block d-md-none'>
				CANTIDAD
			</strong>
			<button class="btn" onclick="changeQuantity(${Number(x.quantity) - 1},${
      x.id
    })"><</button>${x.quantity}<button class="btn"onclick="changeQuantity(${
      Number(x.quantity) + 1
    },${x.id})">></button>
		</div>
		<div class='col-6 col-sm-2 pt-5 text-center'>
			<strong class='d-block d-md-none'>
				SUBTOTAL
			</strong>
			${toMoney(x.cost)}
		</div>
	</div>`;
  });
  $("#" + container).html(aux);
  $("#total").html(toMoney(subtotal + ship - discount));
  $("#ship").html(toMoney(ship));
  $("#discount").html(toMoney(discount));
  $("#subtotal").html(toMoney(subtotal));
  total = subtotal + ship - discount;
};

const changeQuantity = (value, id) => {
  updateCart(id, value);
};

const checkCoupon = (code = "") => {
  $.ajax({
    type: "post",
    url: "./bridge/routes.php?action=verifyCoupon",
    data: {
      code,
      amount:total
    },
    success: function (data) {
      console.log(data)
      let resp = JSON.parse(data);
      if (resp.valid==true){
        switch (resp.type) {
          case "percent":
            discount = (resp.discount * subtotal + ship) / 100;
            break;
          case "amount":
            discount = resp.discount;
            break;
          default:
            break;
        }
        $("#total").html(toMoney(subtotal + ship - discount));
        $("#ship").html(toMoney(ship));
        $("#discount").html("-"+toMoney(discount)+(resp.type=='percent'?(" ("+resp.discount+"%)"):""));
        $("#subtotal").html(toMoney(subtotal));
        alert("Descuento aplicado con éxito");
      }else{
        alert({
          title:"Error",
          text:resp.message
        })
      }
    },
    error: (error) => {
      errorHandle(error);
    },
  });
};

const finishBuying = () => {
    let code = $('#coupon').val();
    let cart_id = $("#cart_id").val();
    $.ajax({
      url:"./bridge/routes.php?action=finishBuying",
      type:"post",
      data:{
        cart_id:cart_id,
        code:code||null
      },
      success:function(res){
        window.location.href = 'finalizar-compra';
      }
    });
  }