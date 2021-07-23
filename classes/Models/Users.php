<?php  

	/**
	 * 
	 */
	class Users extends Admin
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function GetUserData(Request $data)
		{
			return $this->GetById(self::TABLE_USERS,$data->id);
		}

		public function Login(Request $data)
		{
			$user = $this->query->select("*",self::TABLE_USERS,"(email = '".$data->get('email')."' OR nickname = '".$data->get('nickname')."' ) AND password = '".md5($data->get("password"))."'");
			$user = $this->GetFirst($user);
			if ($user==null){
				return ["login"=>false,"message"=>"Datos incorrectos"];
			}else{
				if (session_status() !== PHP_SESSION_ACTIVE)
					session_start();
				$_SESSION['login'] = 1;
				$_SESSION['start'] = time();
				$user['pass'] = "Qué miras, puto";
				$user['password'] = $user['pass'];
				$_SESSION['user'] = $user;
				return ["login"=>true];
			}
		}

		public function RegisterNewUser(Request $data)
		{
			$user = $this->query->select("*",self::TABLE_USERS,"(email = '".$data->get('email')."')");
			if ($this->GetFirst($user)!=null){
				return ["register"=>false,"message"=>"Ya existe un usuario registrado con este correo electrónico"];
			}
			$_pass = $data->get("password");
			$pass = md5($_pass);
			$data->put("password",$pass);
			$data->put("type",3);
			$data->put("status",1);
			$d = $data->extract(["name","lastname","phone","email","password","nickname","type","satus"]);
			$user = $this->Insert(self::TABLE_USERS,$d,"id");
			$data->put("password",$_pass);
			$this->Login($data);
			return ["register"=>true];
		}

		public function RegisterNewAddress(Request $data)
		{
			$data->put("status",1);
			if ($data->get("principal")==null)
				$data->put("principal",false);
			else{
				$this->Save(self::TABLE_ADDRESSES,["principal"=>false],["user_id",$data->get("user_id")]);
			}
			$d = $data->extract(["user_id","address","state_id","townhall","zipcode","status","principal"]);
			return $this->Insert(self::TABLE_ADDRESSES,$d,"id");
		}
	}

?>