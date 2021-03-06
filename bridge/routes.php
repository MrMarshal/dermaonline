<?php
require "../classes/utils.php";
$router = new Router;

//$router->Crud("users","User"); //Genera las rutas: newUser, getUser, saveUser, deleteUser
//$router->Crud("clients","Client"); //Genera las rutas: newClient, getClient, saveClient, deleteClient
//$router->Crud("consumptions","Consumption"); //Genera las rutas: newConsumption, getConsumption, saveConsumption, deleteConsumption
//$router->Crud("apartments","Apartment"); //Genera las rutas: newApartment, getApartment, saveApartment, deleteApartment
//$router->Crud("buildings","Building"); //Genera las rutas: newBuildings, getBuildings, saveBuildings, deleteBuildings
//$router->Crud("addresses","Address"); //Genera las rutas: newAddress, getAddress, saveAddress, deleteAddress
//$router->Crud("payments","Payment"); //Genera las rutas: newPayment, getPayment, savePayment, deletePayment


/*$router->Group("buildings",
		[
			["getAllBuildings","List"] //Genera la ruta "getAllBuildings" y ejecuta la función "List" del controlador "buildings" 
		]
	);

	$router->Group("apartments",
		[
			["getBuildingApartments","GetByBuilding"],
			["getAparmentByMesurer","GetByMesurer"]
		]
	);

	$router->Group("clients",
		[
			["getClientByAparment","GetByApartment"],
			["updateClient","UpdateInfo"]
		]
	);*/

$router->New("login", "users/Login");
// $router->New("getProduct","products/View");
// $router->New("saveProduct","products/SaveProduct");
// $router->New("saveProductData","products/SaveProductData");
// $router->New("registerEntrance","stock/RegisterEntrance");
// $router->New("getProductsByFilter","products/GetByFilters");
$router->New("getProducts", "products/GetProductsList2");
$router->New("addToCart", "shop/AddProductToCart");
$router->New("getCart", "shop/GetCurrentCart");
$router->New("verifyCoupon", "coupons/ValidateCoupon");
$router->New("deleteOrder", "shop/DeleteOrder");
$router->New("updateOrder", "shop/UpdateOrder");
$router->New("finishBuying", "shop/FinishBuying");
$router->New("registerNewUser", "users/RegisterNewUser");
$router->New("registerNewAddress", "users/RegisterNewAddress");
$router->New("GetAddressPrefired", "users/GetAddressPrefired");
$router->New("getUserDetail", "users/getUserDetail");
$router->New("updateUserDetail", "users/updateUserDetail");
$router->New("updateEmailDetail", "users/updateEmailDetail");
$router->New("updatePasswordDetail", "users/updatePasswordDetail");
$router->New("CreateMpPreference", "mercadopago/CreatePreference");





// $router->New("getProductDetails","products/GetProductDetails");
// $router->New("getProductCustomData","products/GetProductCustomData");


$router->RUN();
