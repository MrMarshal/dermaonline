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
		$s = $this->query->select("*",self::TABLE_COUPONS,"code = '".$data->get("code")."'");
		$coupon = $this->GetFirst($s);
		if ($coupon!=null){
			$user_id = 1;
			if (date("Y-m-d")>$coupon['valid_date']){
				return ["valid"=>false,"message"=>"El cupón ha expirado"];
			}
			if ($coupon['used']>=$coupon['uses']){
				return ["valid"=>false,"message"=>"Este cupón ya no es válido"];
			}
			if ($coupon['minimum_amount']>$data->get("amount")){
				return ["valid"=>false,"message"=>"Este cupón aplica para compras mayores a $".$coupon['minimum_amount']];
			}
			if ($coupon['user_id']!=0){
				if ($coupon['user_id']!=$user_id){
					return ["valid"=>false,"message"=>"No puedes hacer uso de este cupón"];
				}
			}
			return ["valid" => true, "discount" => $coupon['amount'], "type" => $coupon['type'],"id"=>$coupon['id']];
		}else{
			return ["valid"=>false,"message"=>"Este cupón no existe"];
		}
	}

	public function ApplyCouponToCart($cart_id,$coupon_id,$discount)
	{
		$this->Save(self::TABLE_COUPONS, ["used" => "used + 1"], $coupon_id);
		$this->Save(self::TABLE_CARTS, ["coupon_id" => $coupon_id,"discount"=>$discount], $cart_id);
	}
}
