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
			if ($data->get("code")=='valido'){
				if ($data->get("code")=='valido2')
					return ["valid"=>true,"discount"=>10,"type"=>"percent"];
				return ["valid"=>true,"discount"=>100,"type"=>"amount"];
			}else{
				return ["valid"=>false,"message"=>"Mensaje de error"];
			}
		}
	}

?>