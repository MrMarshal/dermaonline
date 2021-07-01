$(document).ready(function () {
  console.log("ready!");
  if (localStorage.getItem("cart") === "true") {
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
          <div class="row mt-3">
              <div class="col-1 col-sm-2 pt-5 text-right">
                  <button class="btn mx-3 px-0" onclick="removeFromCart()">x
                  </button>

              </div>
              <div class="col-5 col-sm-2 p-0">
                  <img src="https://via.placeholder.com/150" class="img-fluid">
              </div>
              <div class="col-6 col-sm-2 pt-5 text-center">
                  <strong class="d-block d-md-none">
                      PRODUCTO
                  </strong>
                  ASDFG
              </div>
              <div class="col-6 col-sm-2 pt-5 text-center">
                  <strong class="d-block d-md-none">
                      PRECIO
                  </strong>
                  $0.11
              </div>
              <div class="col-6 col-sm-2 pt-5 text-center">
                  <strong class="d-block d-md-none">
                      CANTIDAD
                  </strong>
                  1
              </div>
              <div class="col-6 col-sm-2 pt-5 text-center">
                  <strong class="d-block d-md-none">
                      SUBTOTAL
                  </strong>
                  $100.00
              </div>
          </div>
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
                  <p class="mt-2 mb-1"><strong>SUBTOTAL &nbsp;&nbsp;&nbsp;<span>$0.00</span></strong></p>
                  <p class="mt-2 mb-1"><strong>ENVÍO &nbsp;&nbsp;&nbsp;<span>$0.00</span></strong></p>
                  <p class="mt-4 mb-1"><strong>TOTAL &nbsp;&nbsp;&nbsp;<span>$0.00</span></strong></p>
                  <button class="btn b-tags col-12 mt-3" onclick="window.location.href='tienda.php?page=1'">Volver a la tienda</button>
              </div>
          </div>
      </div>
  </div>`);
  }
});

const addToCart = (
  id,
  name = "",
  price = 0,
  main_image = "",
  description = "",
  existence = ""
) => {
  debugger;
  let product = {
    id: id,
    name: name,
    price: price,
    main_image: main_image,
    description: description,
    existence: existence,
    quantity: 1,
  };
  let array = localStorage.getItem("cart")
    ? JSON.parse(localStorage.getItem("cart"))
    : [];
  let index = array.findIndex((x) => x.id);
  if (index > -1) {
    let __product = array.find((x) => x.id);
    product.quantity = product.quantity + __product.quantity;
    array.splice(index, 1);
  }
  array.push(product);
  alert("Producto " + name + " añadido al carrito");
  localStorage.setItem("cart", JSON.stringify(array));
};
const removeFromCart = () => {
  localStorage.removeItem("cart");
  window.location.reload();
};
