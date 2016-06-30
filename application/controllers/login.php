<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('user'); 
        $this->load->database(); 
		
    }
	
	public function index()
	{
		// Ceux n'ayant qu'accès au plat de resistances
		$nodash = $this->user->getAllNoDashboard();
		
		// Ceux qui auront acces au tableau de bord de choix
		$dash = $this->user->getAllDashboard();
		
		// 
		$data['nodash'] = $nodash;
		$data['dash'] = $dash;
		$this->load->view('login', $data);
	}
}
