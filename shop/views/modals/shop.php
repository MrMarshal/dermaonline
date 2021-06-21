<div class="modal fade" id="productDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="product_detail_name">Name</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="selected_product_id" value="0">
                <img src="" id="product_detail_img" class="img-fluid" />
                <h5>Descripción:</h5>
                <p id="product_detail_description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis quas accusamus voluptatum, voluptas
                    minima odit doloremque optio explicabo similique nostrum distinctio, porro expedita obcaecati, error
                    sequi. Aliquid quia blanditiis vero!</p>
                <div class="row">
                    <div class="col-6">
                        <h5>Precio</h5>
                        <strong>$<span id="product_detail_price">00.00</span> mxn</strong>
                    </div>
                    <div class="col-6 text-center pt-2">
                        <button class="btn btn-primary" onclick="addToCart()">Añadir al carrito</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    function showProduct(id) {
        $("#selected_product_id").val(id);
        $.ajax({
            type:"get",
            url:"../bridge/routes.php?action=getProduct",
            data:{
                id:id
            },
            success:function(res) {
                let prod = JSON.parse(res);
                let im = prod.image_1;
                if (im.includes("https://drive.google.com/open")){
                    im = "https://drive.google.com/uc?export=view&id="+pr.image_1.split("id=")[1];
                }
                $("#product_detail_name").html(prod.name);
                $("#product_detail_img").attr("src",im);
                $("#product_detail_description").html(prod.description);
                $("#product_detail_price").html(prod.price);
                $("#productDetailModal").modal("show");
            }
        });
    };


    function addToCart() {
        $.ajax({
            type:"post",
            url:"../bridge/routes.php?action=addToCart",
            data:{
                id:$("#selected_product_id").val(),
                quantity:1
            },
            success:function(res) {
                alert("Producto añadido con éxito");
                $("#productDetailModal").modal("hide");
            }
        })
    }
</script>