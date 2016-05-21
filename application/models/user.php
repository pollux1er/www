<?php
Class User extends CI_Model
{
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
}
?>
