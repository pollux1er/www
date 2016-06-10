<?php
Class Log extends CI_Model
{
	public function __construct()
	{
		$this->load->model('log');
	}
	
	public function login($username, $password)
	{
		$this -> db -> select('id, username, password');
		$this -> db -> from('users');
		$this -> db -> where('username', $username);
		$this -> db -> where('password', MD5($password));
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	public function getPins()
	{
		$this -> db -> select('id, username, password');
		$this -> db -> from('users');
		$this -> db -> where('username', $username);
		
		$query = $this -> db -> get();
	}
	
	public function getAllNoDashboard()
	{
		$users = array();
		$this -> db -> select('PIN');
		$this -> db -> from('plat_seulement');
		
		$query = $this -> db -> get();
		
		foreach ($query->result() as $row)
		{
			$users[] = $row->PIN;
		}
		return $users;
	}
	
	public function getAllDashboard()
	{
		$users = array();
		$this -> db -> select('PIN');
		$this -> db -> from('tout_compris');
		
		$query = $this -> db -> get();
		
		foreach ($query->result() as $row)
		{
			$users[] = $row->PIN;
		}
		return $users;
	}
	
	public function getAllPerenco()
	{
		$perenco = array();
		$this -> db -> select('PIN');
		$this -> db -> from('info_user');
		$this -> db -> where('status', 'Perenco Rio del Rey');
		
		$query = $this -> db -> get();
		
		foreach ($query->result() as $row)
		{
			$perenco[] = $row->PIN;
		}
		return $perenco;
	}
	
	public function getAllContracted()
	{
		$contracted = array();
		$this -> db -> select('PIN');
		$this -> db -> from('info_user');
		$this -> db -> where_not_in('status', 'Perenco Rio del Rey');
		
		$query = $this -> db -> get();
		
		foreach ($query->result() as $row)
		{
			$contracted[] = $row->PIN;
		}
		return $contracted;
	}
	
	public function getUserBalanceFromPIN($pin)
	{
		$query = $this->db->query("SELECT `PIN`, `starter`, `meal`, `dessert` FROM `user_account` LEFT JOIN `user_balance` ON `user_balance`.`id_user` = `user_account`.`id_user` WHERE `PIN` = $pin LIMIT 1");
		
		return $query->row();
		
		die;
		$this -> db -> select('PIN');
		$this -> db -> from('plat_seulement');
		var_dump($this->db->last_query()); die;
		$this -> db -> select('`PIN`, `starter`, `meal`, `dessert`');
		$this -> db -> from('`user_account`');
		
		$this -> db -> join('`user_balance`', '`user_balance`.`id_user` = `user_account`.`id_user`');
		$this -> db -> where('`PIN`', $pin);
		$this -> db -> limit(1);
		
		$query = $this -> db -> get();
		
		return $query->row();
		
	}
	
	public function updateBalanceFromServer($balance)
	{
		unset ($balance['id']);
		$this->db->where('id_user', $balance['id_user']);
		return $this->db->update('user_balance', $balance);
			
	}
}
?>
