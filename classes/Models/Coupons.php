<?php

/**
 * 
 */
class Coupons extends Admin
{

	function __construct()
	{
		parent::__construct();
	}


	public function ValidateCoupon(Request $data)
	{
		switch ($data->get("code")) {
			case "valido":
				return ["valid" => true, "discount" => 100, "type" => "amount"];
			case "valido2":
				return ["valid" => true, "discount" => 10, "type" => "percent"];
			default:
				break;
		}

		return header("HTTP/1.0 400 Mensaje de error", true, 400);
		// return ["valid"=>false,"message"=>"Mensaje de error"];
	}
}
