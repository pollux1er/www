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
        $this->load->database(); 
    }
	
	public function index()
	{
		$contracted = $this->user->getAllContracted();
		$perenco = $this->user->getAllPerenco();
		$data['contracted'] = $contracted;
		$data['perenco'] = $perenco;
		$this->load->view('order', $data);
	}
}
