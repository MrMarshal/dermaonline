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

		public function Login(Request $data)
		{
			$user = $this->query->select("*",self::TABLE_USERS,"nickname = '".$data->get('nickname')."' AND password = '".md5($data->get("password"))."'");
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
			$pass = md5($data->get("password"));
			$data->put("password",$pass);
			$data->put("type",3);
			$data->put("status",1);
			$d = $data->extract(["name","lastname","phone","email","password","type","satus"]);
			return $this->Insert(self::TABLE_USERS,$d,"id");
		}

		public function RegisterNewAddress(Request $data)
		{
			$d = $data->extract(["user_id","address","state_id","townhall","zipcode"]);
			return $this->Insert(self::TABLE_ADDRESSES,$d,"id");
		}
	}

?>