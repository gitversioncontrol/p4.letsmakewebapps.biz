<?php
class accounts_controller extends base_controller{

	 public function __construct() {
		parent::__construct();
		# Make sure user is logged in if they want to use anything in this controller
		if(!$this->user) {
		die("Members only Page. <a href='/users/login'>Login</a>");
		}
	}

	public function index(){
	 # Setup view
			$this->template->content = View::instance('v_accounts_index');
			$this->template->title   = "Account";
			
		# JavaScript files
		/*$client_files_body = Array(
			'/js/jquery-1.10.2.min.js',
			'/js/jquery.form.js', 
			'/js/trade_index.js'); */
		//$this->template->client_files_body = Utils::load_client_files($client_files_body);
		# Render template
		
		
		$q1="select balance from users where user_id='".$this->user->user_id."' ";
		$balance=DB::instance(DB_NAME)->select_field($q1);	
		$this->template->content->balance=$balance;
		
		$q2="select sum(amount_invested) from performance where user_id='".$this->user->user_id."'  " ;
		$amount_invested=DB::instance(DB_NAME)->select_field($q2);
		$this->template->content->amount_invested=$amount_invested;
		
		$total=$balance+$amount_invested;
		$this->template->content->total=$total;
		echo $this->template;
	}
}