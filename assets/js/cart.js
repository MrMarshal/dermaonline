$(document).ready(function () {
  
  if (false) {
    //localStorage.getItem("cart")) {
    let html = "";
    let subtotal = 0.0;
    let shipcost = 0.0;
    let total = 0.0;
    let array = JSON.parse(localStorage.getItem("cart"));
    array.forEach((x) => {
      subtotal = subtotal + parseFloat(x.price) * parseFloat(x.quantity);
      html += ` <div class="row mt-3">
                    <div class="col-1 col-sm-2 pt-5 text-right">
                        <button class="btn mx-3 px-0" onclick="removeFromCart(${
                          x.id
                        })">x
                        </button>

                    </div>
                    <div class="col-5 col-sm-2 p-0">
                        <img src="${x.main_image}" class="img-fluid">
                    </div>
                    <div class="col-6 col-sm-2 pt-5 text-center">
                        <strong class="d-block d-md-none">
                            PRODUCTO
                        </strong>
                        ${x.name}
                    </div>
                    <div class="col-6 col-sm-2 pt-5 text-center">
                        <strong class="d-block d-md-none">
                            PRECIO
                        </strong>
                        $${x.price}
                    </div>
                    <div class="col-6 col-sm-2 pt-5 text-center">
                        <strong class="d-block d-md-none">
                            CANTIDAD
                        </strong>
                        ${x.quantity}
                    </div>
                    <div class="col-6 col-sm-2 pt-5 text-center">
                        <strong class="d-block d-md-none">
                            SUBTOTAL
                        </strong>
                        $${parseFloat(x.price) * parseFloat(x.quantity)}
                    </div>
                </div>`;
    });
    total = subtotal + shipcost;
    $("#cart").html(`<div class="row text-left pt-5">
      <div class="col-12 col-md-8">
          <div class="row ">
              <div class="col-6 col-sm-2 d-none d-md-block">
                  &nbsp;
              </div>
              <div class="col-6 col-sm-2 d-none d-md-block">
                  &nbsp;
              </div>
              <div class="col-6 col-sm-2 d-none d-md-block text-center">
                  <strong>
                      PRODUCTO
                  </strong>
              </div>
              <div class="col-6 col-sm-2 d-none d-md-block text-center">
                  <strong>
                      PRECIO
                  </strong>
              </div>
              <div class="col-6 col-sm-2 d-none d-md-block text-center">
                  <strong>
                      CANTIDAD
                  </strong>
              </div>
              <div class="col-6 col-sm-2 d-none d-md-block text-center">
                  <strong>
                      SUBTOTAL
                  </strong>
              </div>
          </div>
          ${html}
          <div class="row col-12 col-md-9 mx-auto p-0 mt-3">
              <div class="col-12">
                  <input class="b-tags p-2 text-center" type="text" placeholder="CÓDIGO DE CUPÓN" />
                  <button class="btn btn-bor-bottom mx-3 px-0">Aplicar cupón</button>
                  <button class="btn btn-bor-bottom mx-3 px-0" onclick="window.location.reload()">Actualizar carrito</button>
              </div>
          </div>
      </div>
      <div class="col-12 col-md-4 px-5">
          <div class="row h-100" style="background-color: #F2F2F0 !important;">
              <div class="col-12 py-3 px-4">
                  <h1 class="mt-2">TOTAL</h1>
                  <p class="mt-2 mb-1"><strong>SUBTOTAL &nbsp;&nbsp;&nbsp;<span>$${subtotal}</span></strong></p>
                  <p class="mt-2 mb-1"><strong>ENVÍO &nbsp;&nbsp;&nbsp;<span>$${shipcost}</span></strong></p>
                  <p class="mt-4 mb-1"><strong>TOTAL &nbsp;&nbsp;&nbsp;<span>$${total}</span></strong></p>
                  <button class="btn b-tags col-12 mt-3" onclick="window.location.href='tienda.php?page=1'">Volver a la tienda</button>
              </div>
          </div>
      </div>
  </div>`);
  }
});



const errorHandle = (error)=>{
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
}

const addToCart = (id) => {
  $.ajax({
    type: "post",
    url: "../bridge/routes.php?action=addToCart",
    data: {
      id: id,
      quantity: 1,
    },
    success: function (res) {
      console.log(res)
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
    title: '¿Deseas eliminar esta orden del carrito?',
    showDenyButton: true,
    showCancelButton: true,
    icon:"warning",
    confirmButtonText: `Eliminar`,
    denyButtonText: `Cancelar`,
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "get",
        url: "./bridge/routes.php?action=deleteOrder",
        data: {
          id:id
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
          errorHandle(error)
        },
      }); 
    } else if (result.isDenied) {}
  });
};

const getCart = (container = "draw_cart") => {
  $.ajax({
    type: "get",
    url: "./bridge/routes.php?action=getCart",
    data: {},
    success: function (res) {
      let data = JSON.parse(res);
      if (data.orders.length==0)
        window.location.reload();
      draw(container, data.orders);
    },
    error: (error) => {
      errorHandle(error);
    },
  });
};



const draw = (container, list = []) => {
  let aux = "";
  let total = 0.0;
  let subtotal = 0.0;
  let ship = 0.0;
  console.log(list);
  list.forEach((x) => {
    subtotal = subtotal + parseFloat(x.cost);
    aux += `
    <div class='row mt-3'>
		<div class='col-1 col-sm-2 pt-5 text-right'>
			<button class='btn mx-3 px-0' onclick="removeFromCart(${x.id})"><i class="fas fa-times"></i></button>
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
			</strong>${x.cost/x.quantity}</div>
		<div class='col-6 col-sm-2 pt-5 text-center'>
			<strong class='d-block d-md-none'>
				CANTIDAD
			</strong>
			${x.quantity}
		</div>
		<div class='col-6 col-sm-2 pt-5 text-center'>
			<strong class='d-block d-md-none'>
				SUBTOTAL
			</strong>
			${x.cost}
		</div>
	</div>`;
  });
  $("#"+container).html(aux);
  $("#total").html(subtotal + ship);
  $("#ship").html(ship);
  $("#subtotal").html(subtotal);
};
