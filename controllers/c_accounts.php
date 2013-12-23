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
			
		# JavaScript/CSS files
		$client_files_body = Array(
			'/css/bootstrap.css',
			'/js/jquery-1.10.2.min.js',
			'js/bootstrap.js');
			
		$this->template->client_files_body = Utils::load_client_files($client_files_body);
	
		
		
		$q1="select balance from users where user_id='".$this->user->user_id."' ";
		$balance=DB::instance(DB_NAME)->select_field($q1);	
		$this->template->content->balance=$balance;
		
		$q2="select sum(amount_invested) from performance where user_id='".$this->user->user_id."'  " ;
		$amount_invested=DB::instance(DB_NAME)->select_field($q2);
		$this->template->content->amount_invested=$amount_invested;
		
		$total=$balance+$amount_invested;
		$this->template->content->total=$total;
		
		
		
		$q3='select stock_symbol,count_bought,count_sold,cost_basis,amount_invested from performance
		where  user_id='.$this->user->user_id.' ';
			
		$transactions=DB::instance(DB_NAME)->select_rows($q3);

		# Pass data to the View
		$this->template->content->txns = $transactions;
		echo $this->template;
	}
	
	public function performance(){
		# Setup view
			$this->template->content = View::instance('v_accounts_performance');
			$this->template->title   = "Gain/Loss Center";
			
		# JavaScript/CSS files
		$client_files_body = Array(
			'/css/bootstrap.css',
			'/js/jquery-1.10.2.min.js',
			'js/bootstrap.js');
		$this->template->client_files_body = Utils::load_client_files($client_files_body);
		
		$q4='select stock_symbol,unrealized_gain,realized_gain from performance where user_id='.$this->user->user_id.' ';
		
		$transactions=DB::instance(DB_NAME)->select_rows($q4);
		
		$q5='select sum(realized_gain) from performance where user_id='.$this->user->user_id.' ';
		$total_realized=DB::instance(DB_NAME)->select_field($q5);
		$this->template->content->total_realized=$total_realized;
		
		$q6='select sum(unrealized_gain) from performance where user_id='.$this->user->user_id.' ';
		$total_unrealized=DB::instance(DB_NAME)->select_field($q6);
		$this->template->content->total_unrealized=$total_unrealized;
		
		# Pass data to the View
		$this->template->content->txns = $transactions;
		echo $this->template;
		
	}
}