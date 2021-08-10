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
		return $this->GetById(self::TABLE_USERS, $data->id);
	}

	public function Login(Request $data)
	{
		$user = $this->query->select("*", self::TABLE_USERS, "(email = '" . $data->get('email') . "' OR (nickname != '' AND nickname = '" . $data->get('nickname') . "') ) AND password = '" . md5($data->get("password")) . "'");
		$user = $this->GetFirst($user);
		if ($user == null) {
			return ["login" => false, "message" => "Datos incorrectos"];
		} else {
			if (session_status() !== PHP_SESSION_ACTIVE)
				session_start();
			$_SESSION['login'] = 1;
			$_SESSION['start'] = time();
			$user['pass'] = "Qué miras, puto";
			$user['password'] = $user['pass'];
			$_SESSION['user'] = $user;
			return ["login" => true];
		}
	}

	public function RegisterNewUser(Request $data)
	{
		$user = $this->query->select("*", self::TABLE_USERS, "(email = '" . $data->get('email') . "')");
		if ($this->GetFirst($user) != null) {
			return ["register" => false, "message" => "Ya existe un usuario registrado con este correo electrónico"];
		}
		$_pass = $data->get("password");
		$pass = md5($_pass);
		$data->put("password", $pass);
		$data->put("type", 3);
		$data->put("status", 1);
		$d = $data->extract(["name", "lastname", "phone", "email", "password", "nickname", "type", "satus"]);
		$user = $this->Insert(self::TABLE_USERS, $d, "id");
		$data->put("password", $_pass);
		$this->Login($data);
		return ["register" => true];
	}

	public function RegisterNewAddress(Request $data)
	{
		$d = $data->extract([
			"user_id", "address", "state_id", "townhall", "zipcode", "status", "principal",
			"name_address",
			"name",
			"second_name",
			"phone",
			"phone_mobile",
			"exterior",
			"interior",
			"reference"
		]);


		return $this->Insert(self::TABLE_ADDRESSES, $d, "id");
	}
	/**
	 * Obtiene la dirección preferida de la persona logueada
	 */
	public function GetAddressPrefired()
	{
		session_start();
		$userId = $_SESSION["user"]["id"];
		$query = $this->query->select("*", self::TABLE_ADDRESSES, "user_id = $userId AND principal=true", "id desc");
		$address = $this->GetFirst($query);
		if ($address == null) {
			header("HTTP/1.0 404 Not Found");
			return;
		}
		return $address;
	}
	/**
	 * Setea la dirección preferida
	 */
	public function SetAddressPrefired(Request $data)
	{
		session_start();
		$id = $data->get('id');
		$query = $this->query->update(self::TABLE_ADDRESSES, ["principal" => "1"], " id = $id");
		return $this->RunQuery($query);
	}
	/**
	 * elimina la dirección
	 */
	public function deleteAddress(Request $data)
	{
		session_start();
		$id = $data->get('id');
		$table = self::TABLE_ADDRESSES;
		$query = "DELETE FROM $table where id=$id ";
		return $this->RunQuery($query);
	}


	/**
	 * Obtiene las direcciones de la persona logueada
	 */
	public function GetAddressesUser(Request $data)
	{
		session_start();
		$userId = $data->get("user_id") ? $data->get("user_id") : $_SESSION["user"]["id"];
		$query = $this->query->select("*", self::TABLE_ADDRESSES, "user_id = $userId");
		$addresses = $this->GetAllRows($query);
		return $addresses;
	}
	/**
	 * Setea la direcciones no preferidas
	 */
	public function SetAddressNoPrefired(Request $data)
	{
		session_start();
		$userId = $data->get('user_id') ? $data->get('user_id') : $_SESSION["user"]["id"];

		$query = $this->query->update(self::TABLE_ADDRESSES, ["principal" => "0"], " user_id=$userId");

		return $this->RunQuery($query);
	}
	/**
	 * Obtiene los detalles del usuario logueado
	 */
	public function getUserDetail(Request $data)
	{
		session_start();
		$userId = $data->get("user_id") ? $data->get("user_id") : $_SESSION['user']['id'];
		$query = $this->query->select("*", self::TABLE_USERS, " id = $userId ");
		$user = $this->GetFirst($query);
		if ($user == null) {
			return header("HTTP/1.0 404 Not Found");
		}
		return $user;
	}
	/**
	 * Actualiza los detalles del usuario
	 */
	public function updateUserDetail(Request $data)
	{
		session_start();
		$userId = $data->get("user_id") ? $data->get("user_id") : $_SESSION['user']['id'];
		$query = $this->query->select("*", self::TABLE_USERS, " id = $userId ");
		$user = $this->GetFirst($query);
		if ($user == null) {
			return header("HTTP/1.0 404 Not Found");
		}
		$resp = $this->Save(self::TABLE_USERS,$data->extract(["name","lastname","phone","gender"]),$userId);
		//$query = "UPDATE " . self::TABLE_USERS . " set name='" . $data->get('name') . "', lastname='" . $data->get('lastname') . "', phone='" . $data->get('phone') . "' where id=$userId";
		//$resp = $this->RunQuery($query);
		return $resp;
	}
	/**
	 * Actualiza el email del usuario
	 */
	public function updateEmailDetail(Request $data)
	{
		session_start();
		$userId = $data->get("user_id") ? $data->get("user_id") : $_SESSION['user']['id'];
		$query = $this->query->select("*", self::TABLE_USERS, " id = $userId ");
		$user = $this->GetFirst($query);
		if ($user == null) {
			return header("HTTP/1.0 404 Not Found");
		}
		$query = "UPDATE " . self::TABLE_USERS . " set email='" . $data->get('email') . "' where id=$userId";

		$resp = $this->RunQuery($query);
		return $resp;
	}
	/**
	 * Actualiza la contraseña del usuario
	 */
	public function updatePasswordDetail(Request $data)
	{
		session_start();
		$userId = $data->get("user_id") ? $data->get("user_id") : $_SESSION['user']['id'];
		$query = $this->query->select("*", self::TABLE_USERS, " id = $userId ");
		$user = $this->GetFirst($query);
		if ($user == null) {
			return header("HTTP/1.0 404 Not Found");
		}
		$query = "UPDATE " . self::TABLE_USERS . " set password='" . md5($data->get('password')) . "' where id=$userId";
		$resp = $this->RunQuery($query);
		return $resp;
	}
}
