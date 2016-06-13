<?php

class Log_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function log($array)
	{
		if(isset($array['id_user']))
			$id_user = $array['id_user'];
		else if($this->session->userdata('iduser'))
			$id_user = $this->session->userdata('iduser');
		else	
			$id_user = 0;
		
		$actions = $array['actions'];
		$description = $array['description'];
		if($array['id_reservation'])
			$id_reservation = $array['id_reservation'];
		else	
			$id_reservation = '';
			
		$sql = "INSERT INTO `logs` (`id_reservation`, `date`, `id_user_staff`, `actions`, `description`) 
							VALUES ('$id_reservation', CURRENT_TIME(), '$id_user', '$actions', ".$this->db->escape($description).");";
		
		//var_dump($sql); die;
		
		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	
	public function getLogs($clause=null)
	{
		$query = $this->db->query('SELECT logs.*, user_info.firstname, user_info.lastname FROM logs LEFT JOIN user_info ON user_info.id_user = logs.id_user ;');
		$row = $query->result();
		if (isset($row))
		{
			return $row;
		}
		return false;
	}
	
	public function getUpdates()
	{
		$query = $this->db->query("SELECT `starter`, `meal`, `dessert`, `date`, `log_by`, `update_status` FROM `logs` WHERE update_status = '0'");
		
		if (!empty($query->result()))
		{
			return $query->result();
		}
	}
	
	public function getLastUpdate()
	{
		$query = $this->db->query("SELECT id, `starter`, `meal`, `dessert`, `date`, `log_by` FROM `logs` WHERE update_status = '0' ORDER BY id ASC LIMIT 1");
		$row = $query->result();
		if (isset($row))
		{
			return $row;
		}
		return false;
	}
	
	public function updated_user_log($id)
	{
		return $this->db->query("UPDATE logs SET `update_status` = '1' WHERE id = '".$id."'");
	}
	
	public function updateBalanceFromServer($balance)
	{
		unset ($balance['id']);
		$this->db->where('id_user', $balance['id_user']);
		return $this->db->update('user_balance', $balance);
			
	}
	
}

?>