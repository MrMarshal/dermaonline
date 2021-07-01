<?php
	class Admin{

		const TABLE_PRODUCTS = "products";
		const TABLE_PRICES = "prices";
		const TABLE_PRODUCT_CATEGORY = "product_category";
		const TABLE_CATEGORIES = "categories";
		const TABLE_PRODUCT_IMAGES = "product_images";
		const TABLE_CARTS = "carts";
		const TABLE_ORDERS = "orders";
		
		const TABLE_MANUFACTURERS = "manufacturers";
		const TABLE_COLORS = "colors";
		const TABLE_TYPES = "types";
		const TABLE_CUSTOM_DATA = "custom_data";
		const TABLE_PRODUCT_CUSTOM_DATA = "product_custom_data";
		const TABLE_USERS = "users";
		const TABLE_STOCK = "stock";

		public $db;
		public $utils;
		public $query;

		function __construct()
		{
			require_once 'utils.php';
			require_once 'DB/connection.php';
			require_once 'DB/queryBuilder.php';
			require_once "session.php";
			$this->conn = new Connection;
			$this->utils = new Utils;
			$this->query = new QueryBuilder;
			$this->db = $this->conn->Connect();
		}

		public function GetLastId($table)
		{
			$query = $this->query->select("id",$table,"true","id DESC");
			$q = $this->db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
			$q->execute();
			$row = $q->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
			$ultimo_id = $row[0];
			return $ultimo_id;
		}

		public function RunQuery($query)
		{
			$q = null;
			try {
				$q = $this->db->prepare($query);
				$q->execute();
			} catch(PDOException $error) {
				throw new PDOException('Mysql Resource failed: ' . $error->getMessage());
			}

			return $q;
		}

		public function Insert($table,$values,$return = null)
		{
			$res = array();
			$res['query'] = $this->query->insert($table,$values);
			$this->RunQuery($res['query']);
			if ($return!=null){
				$res['id'] = $this->GetLastId($table);
				if ($return=="all"){
					$s = $this->query->select("*",$table,"id = ".$res['id']);
					$res['data'] = $this->GetFirst($s);
				}
			}
			return $res;
		}

		public function Save($table,$values,$cond,$return = null)
		{
			$res = array();
			if (is_array($cond)){
				$res['query'] = $this->query->update($table,$values,$cond[0]." = ".$cond[1]);
			}else{
				$res['query'] = $this->query->update($table,$values,"id = ".$cond);
			}
			$this->RunQuery($res['query']);
			return $res;
		}

		public function GetById($table,$id)
		{
			$select = $this->query->select("*",$table,"id = ".$id);
			return $this->GetFirst($select);
		}

		public function ListAll($table)
		{
			$res = $this->query->select("*",$table);
			$res = $this->GetAllRows($res);
			return $res;
		}

		public function GetList($table,$condition)
		{
			$res = $this->query->select("*",$table,$condition);
			$res = $this->GetAllRows($res);
			return $res;
		}

		public function GetFirst($select)
		{
			$res = $this->RunQuery($select);
			while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
				return $row;
			}
		}

		public function GetAllRows($select)
		{
			$r = array();
			$res = $this->RunQuery($select);
			while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
				$r[] = $row;
			}
			return $r;
		}

	}
?>
