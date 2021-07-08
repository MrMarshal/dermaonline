<?php  

	class Products extends Admin
	{

		public $no_of_records_per_page = 8;

		function __construct()
		{
			parent::__construct();
		}

		public function GetProductsList(Request $data)
		{
			$filter = new Request($data->get("filter"));
			$category = $filter->get("category");
			$min = $filter->get("min_price");
			$max = $filter->get("max_price");
			$f = "true ";

			$page = $data->get("page",0);
			
			if ($category!=null){
				$f.="AND (cate.id = ".$category.")";
			}
			if ($min!=null){
				$f.="AND (pric.normal >= ".$min." AND pric.normal <= ".$max.")";
			}

			$total_pages_sql = $this->query->select_join("COUNT(*)",
				self::TABLE_PRODUCTS,
				[
					self::TABLE_STOCK=>"stoc.product_id = p.id",
					self::TABLE_PRICES=>"p.id = pric.product_id",
					self::TABLE_PRODUCT_CATEGORY=>"prod.product_id = p.id",
					self::TABLE_CATEGORIES=>"cate.id = prod.category_id"
				],
				$f,"Order BY p.id"
			);
			$result = $this->GetFirst($total_pages_sql);
			$total_rows = $result['COUNT(*)'];
			$total_pages = ceil($total_rows / $this->no_of_records_per_page);
			$offset = ($page-1) * $this->no_of_records_per_page;
			$s = $this->query->select_join("p.id, p.sku as code,p.description,p.tags, p.name, stoc.quantity as existence, pric.normal as price",
				self::TABLE_PRODUCTS,
				[
					self::TABLE_STOCK=>"stoc.product_id = p.id",
					self::TABLE_PRICES=>"p.id = pric.product_id",
					self::TABLE_PRODUCT_CATEGORY=>"prod.product_id = p.id",
					self::TABLE_CATEGORIES=>"cate.id = prod.category_id"
				],
				$f,"GROUP BY p.id ORDER BY p.id LIMIT ".$offset.",".$this->no_of_records_per_page
			);
			$prods = $this->GetAllRows($s);
			$res = array();
			foreach ($prods as $p) {
				$p['images'] = $this->GetList(self::TABLE_PRODUCT_IMAGES,"product_id = ".$p['id']);
				foreach ($p['images'] as $img) {
					if ($img['type']==1){
						$p['main_image'] = $img['url'];
						break;
					}
				}
				$p['categories'] = $this->GetAllRows($s);
				$res[] = $p;
			}
			return ["products"=>$res,"total_pages"=>$total_pages,"total_results"=>$total_rows];
		}

		public function GetProductDetails($data)
		{
			if (!$data instanceof Request){
				$data = new Request($data);
			}
			$s = $this->query->select_join("p.id, p.sku as sku,p.description, p.short_description, p.name, p.advantages, pric.normal as price, stoc.quantity as existence",
				self::TABLE_PRODUCTS,
				[
					self::TABLE_STOCK=>"stoc.product_id = p.id",
					self::TABLE_PRICES=>"pric.product_id = p.id"
				],
				"p.id = ".$data->id
			);
			$p = $this->GetFirst($s);
			$p['images'] = $this->GetList(self::TABLE_PRODUCT_IMAGES,"product_id = ".$p['id']);
			return $p;
		}

		public function GetPopularProducts()
		{
			$s = $this->query->select_join("p.id, p.sku as code,p.description,p.tags, p.name, stoc.quantity as existence, pric.normal as price",
				self::TABLE_PRODUCTS,
				[
					self::TABLE_STOCK=>"stoc.product_id = p.id",
					self::TABLE_PRICES=>"p.id = pric.product_id"
				],
				"true","ORDER BY p.id LIMIT 6"
			);
			$prods = $this->GetAllRows($s);
			$res = array();
			foreach ($prods as $p) {
				$img = $this->GetFirst($this->query->select("*",self::TABLE_PRODUCT_IMAGES,"product_id = ".$p['id']." AND type = 1"));
				$p['image'] = $img['url'];
				$res[] = $p;
			}
			return $res;
		}

		public function GetCategoriesList()
		{
			$catego = $this->ListAll(self::TABLE_CATEGORIES);
			return $catego;
		}



		public function SaveProduct(Request $request){
			$color = $this->query->select("*",self::TABLE_COLORS,"name = '".$request->get('color')."'");
			$c = $this->GetFirst($color);
			if ($c == null){
				$c = $this->Insert(self::TABLE_COLORS,["name"=>$request->get("color")],"id");
			}
			$request->put('color_id',$c['id']);
			$data = $request->extract(["name","description","sku","price","manufacturer_id","color_id","tags","product_category","product_type","image_1","image_2","image_3"]);
			if ($request->id!=0){
				$product = $this->Save(self::TABLE_PRODUCTS,$data,$request->id);
				$this->Save(self::TABLE_STOCK,["quantity"=>$request->get("quantity")],"product_id = ".$request->id);
			}else{
				$product = $this->Insert(self::TABLE_PRODUCTS,$data,"id");
				$this->Insert(self::TABLE_STOCK,["quantity"=>$request->get("quantity"),"product_id = ".$request->id]);
			}
			return $product;
		}
		
		public function View(Request $request)
		{
			$pr = $this->GetById(self::TABLE_PRODUCTS,$request->id);
			$pr['price'] = $this->GetPrice($request);
			return $pr;
		}

		public function GetPrice(Request $data)
		{
			return $this->GetById(self::TABLE_PRICES,$data->id);
		}

		public function GetByFilters(Request $request)
		{
			$categories = json_decode($request->get("categories"));
			$manufacturers = json_decode($request->get("manufacturers"));
			$types = json_decode($request->get("types"));
			$filter = "status = 1 ";

			$c=1;
			$c_n = sizeof($categories);
			if ($c_n!=0){
				$filter .= "AND (";
				foreach ($categories as $cat) {
					$filter.=" product_category = ".$cat.($c==$c_n?"":" OR");
					$c++;
				}
				$filter.=") ";
			}

			$c=1;
			$m_n = sizeof($manufacturers);
			if ($m_n!=0){
				$filter .= "AND (";
				foreach ($manufacturers as $cat) {
					$filter.=" manufacturer_id = ".$cat.($c==$m_n?"":" OR");
					$c++;
				}
				$filter.=") ";
			}

			$c=1;
			$t_n = sizeof($types);
			if ($t_n!=0){
				$filter .= "AND (";
				foreach ($types as $cat) {
					$filter.=" manufacturer_id = ".$cat.($c==$t_n?"":" OR");
					$c++;
				}
				$filter.=") ";
			}

			$s = $this->query->select("*",self::TABLE_PRODUCTS,$filter);
			return $this->GetAllRows($s);
		}

		public function GetManufacturersList()
		{
			$catego = $this->ListAll(self::TABLE_MANUFACTURERS);
			return $catego;
		}

		public function GetTypesList()
		{
			$types = $this->ListAll(self::TABLE_TYPES);
			return $types;
		}

		public function GetCustomDataList()
		{
			$cars = $this->ListAll(self::TABLE_CUSTOM_DATA);
			return $cars;
		}


		public function GetManufacturerByName(Request $request){
			$s = $this->query->select("*",self::TABLE_MANUFACTURERS,"name = '".$request->get("name")."'");
			$res = $this->GetFirst($s);
			if ($res!=null)
				return $res['id'];
			return null;
		}

		public function CreateManufacturer(Request $request){
			$id = $this->Insert(self::TABLE_MANUFACTURERS,["name"=>$request->get("name")],"id")['id'];
			return $id;
		}

		public function GetCategoryByName(Request $request){
			$s = $this->query->select("*",self::TABLE_CATEGORIES,"name = '".$request->get("name")."'");
			$res = $this->GetFirst($s);
			if ($res!=null)
				return $res['id'];
			return null;
		}

		public function CreateCategory(Request $request){
			$id = $this->Insert(self::TABLE_CATEGORIES,["name"=>$request->get("name")],"id")['id'];
			return $id;
		}

		public function GetTypeByName(Request $request){
			$s = $this->query->select("*",self::TABLE_TYPES,"name = '".$request->get("name")."'");
			$res = $this->GetFirst($s);
			if ($res!=null)
				return $res['id'];
			return null;
		}

		public function CreateType(Request $request){
			$id = $this->Insert(self::TABLE_TYPES,["name"=>$request->get("name")],"id")['id'];
			return $id;
		}

		public function GetColorByName(Request $request){
			$s = $this->query->select("*",self::TABLE_COLORS,"name = '".$request->get("name")."'");
			$res = $this->GetFirst($s);
			if ($res!=null)
				return $res['id'];
			return null;
		}

		public function CreateColor(Request $request){
			$id = $this->Insert(self::TABLE_COLORS,["name"=>$request->get("name")],"id")['id'];
			return $id;
		}

		public function GetProductCustomData(Request $request)
		{
			$s = $this->query->select_join(
				"p.custom_data_id as data, p.value, cust.name",
				self::TABLE_PRODUCT_CUSTOM_DATA,
				[
					self::TABLE_CUSTOM_DATA=>"cust.id = p.custom_data_id"
				],
				"p.product_id = ".$request->get("product_id"),"p.id"
			);
			return $this->GetAllRows($s);
		}

		public function SaveProductData(Request $request)
		{
			$data = json_decode($request->get("data"));
			$res = "";
			foreach ($data as $d) {
				if ($d->data_id!=-1){
					$res.="Ya tenía id, sólo agregar el: ".$d->data_id."\n\n";
					$n = $d->data_id;
				}else{
					$res.="No venía el id, buscar: ".$d->data_name."\n\n";
					$n = $this->GetCustomDataByName(new Request(["name"=>$d->data_name]));
					if ($n==null){
						$res.="No existe, agregar: ".$d->data_name."\n\n";
						$n = $this->CreateCustomData(new Request(["name"=>$d->data_name]));
						$res.="Ya se creó, agregar: ".$n."\n\n";
					}else{
						$res.="Ya existía, agregar: ".$n."\n\n";
					}
				}
				$this->AddCustomDataToProduct(new Request(["product_id"=>$request->get("product_id"),"custom_data_id"=>$n,"value"=>$d->value]));
			}
			//return $res;
		}

		public function get_numerics ($str) {
		    preg_match_all('/\d+/', $str, $matches);
		    if ($matches[0]!=null)
		        return $matches[0][0];
		    else
		        return null;
		}

		public function GetCustomDataByName(Request $request)
		{
			$s = $this->query->select("*",self::TABLE_CUSTOM_DATA,"name = '".$request->get("name")."'");
			$res = $this->GetFirst($s);
			if ($res!=null)
				return $res['id'];
			return null;
		}

		public function CreateCustomData(Request $request){
			$id = $this->Insert(self::TABLE_CUSTOM_DATA,["name"=>$request->get("name"),"type_id"=>0],"id")['id'];
			return $id;
		}

		public function AddCustomDataToProduct(Request $request)
		{
			$data = $request->extract(["product_id","custom_data_id","value"]);
			$data['number'] = $this->get_numerics($request->get("value"));

			$s = $this->query->select("*", self::TABLE_PRODUCT_CUSTOM_DATA," product_id = ".$request->get("product_id")." AND custom_data_id = ".$request->get("custom_data_id"));
			$c = $this->GetFirst($s);
			if ($c!=null){
				$id = $c['id'];
				if ($c['value']!=$request->get("value")){
					$this->Save(self::TABLE_PRODUCT_CUSTOM_DATA,$data,$id);
				}
			}else{
				$id = $this->Insert(self::TABLE_PRODUCT_CUSTOM_DATA,$data,"id")['id'];
			}
			return $id;
		}

	}

?>