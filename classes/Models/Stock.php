<?php  

	/**
	 * 
	 */
	class Stock extends Admin
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function RegisterEntrance(Request $data)
		{
			$product_id = $data->get("product_id");
			$quantity = $data->get("quantity");
			$s = $this->query->select("*",self::TABLE_STOCK,"product_id = ".$product_id);
			$summ = $this->GetFirst($s);
			if ($summ==null){
				$s = $this->Insert(self::TABLE_STOCK,["product_id"=>$product_id,"quantity"=>$quantity]);
				$q = $quantity;
			}else{
				$q = $summ['quantity']+$quantity;
				$s = $this->Save(self::TABLE_STOCK,["quantity"=>$q],["product_id",$product_id]);
			}
			return ["quantity"=>$q];
		}
	}

?>