<?php
class transactions_controller extends base_controller{

	 public function __construct() {
		parent::__construct();
		# Make sure user is logged in if they want to use anything in this controller
		if(!$this->user) {
		die("Members only Page. <a href='/users/login'>Login</a>");
		}
	}

	public function index (){
		# Setup view
		$this->template->content = View::instance('v_transactions_index');
		$this->template->title   = "Transactions";
			
			# JavaScript/CSS files
		$client_files_body = Array(
			'/css/bootstrap.css',
			'/js/jquery-1.10.2.min.js',
			'js/bootstrap.js');
		$this->template->client_files_body = Utils::load_client_files($client_files_body);
			
		
		$q='select txn_time,stock_symbol,txn_type,stocks_count,market_price,total_order from transactions
			where user_id='.$this->user->user_id.'
			order by txn_time DESC';
		# Run the query to get transactions
		$transactions=DB::instance(DB_NAME)->select_rows($q);

		# Pass data to the View
		$this->template->content->txns = $transactions;

		# Render the View
		echo $this->template;
			
	}

}