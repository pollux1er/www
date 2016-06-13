<?php
Class Update extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('log_model', 'logs');
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
	
	public function getUserBalanceFromPIN($pin)
	{
		$query = $this->db->query("SELECT `PIN`, `starter`, `meal`, `dessert` FROM `user_account` LEFT JOIN `user_balance` ON `user_balance`.`id_user` = `user_account`.`id_user` WHERE `PIN` = $pin LIMIT 1");
		
		return $query->row();
		
		// die;
		// $this -> db -> select('PIN');
		// $this -> db -> from('plat_seulement');
		// var_dump($this->db->last_query()); die;
		// $this -> db -> select('`PIN`, `starter`, `meal`, `dessert`');
		// $this -> db -> from('`user_account`');
		
		// $this -> db -> join('`user_balance`', '`user_balance`.`id_user` = `user_account`.`id_user`');
		// $this -> db -> where('`PIN`', $pin);
		// $this -> db -> limit(1);
		
		// $query = $this -> db -> get();
		// return $query->row();
	}
}
?>