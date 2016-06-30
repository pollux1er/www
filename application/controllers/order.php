<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
    {
        parent::__construct();
        $this->load->model('user'); 
        $this->load->model('log_model', 'logs'); 
		$this->load->helper('url');
        $this->load->database(); 
    }
	
	public function index()
	{
		$user_infos = $this->user->getUserBalanceFromPIN($this->input->get('pin'));
		$data['user_balance'] = $user_infos;
		$this->load->view('order', $data);
	}
	
	public function get_orders()
	{
		$updates = $this->logs->getUpdates();
		if(count($updates) > 0) {
			echo json_encode($this->logs->getLastUpdate());
		}
		else
			echo 0;
	}
	
	public function update_log()
	{
		if($this->logs->updated_user_log($this->input->get('id')))
		{
			if($this->logs->updateBalanceFromServer($this->input->get()))
				echo "OK";
		}
	}
}