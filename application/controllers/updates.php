<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Updates extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('user'); 
        $this->load->database(); 
		
    }
	
	public function getUpdates()
	{
		$url = "http://localhost/PerencoCanteenAdmin/index.php/account/newAccountsExternal";
		 $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		// Set so curl_exec returns the result instead of outputting it.
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// Get the response and close the channel.
		$response = curl_exec($ch);
		curl_close($ch);
		if($response){
			if($response != 'NO') {
				$json = json_decode($response, TRUE);
				foreach($json as $account) {
					var_dump($this->db->insert('user_account', array('PIN' => $account['PIN'], 
																	'date_exp' => $account['date_exp'], 
																	'id_user' => $account['id_user'],
																	'created' => $account['created'],
																	'blocked' => $account['blocked']
																	)));
										
					$this->db->insert('user_balance', array('starter' => $account['starter'], 
															'meal' => $account['meal'], 
															'dessert' => $account['dessert'], 
															'id_user' => $account['id_user']));
				}
			}
		}
		// Checker ensuite s'il y a eu des mises à jour directe sur les balances 
	}
}