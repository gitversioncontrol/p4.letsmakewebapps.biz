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
			
		# Using this query
	/*	$q='select uu.user_id_followed ,p.content,u.first_name ,u.last_name,p.created,p.modified
			from users u,posts p,users_users uu
			where uu.user_id_followed=u.user_id
			and p.user_id=u.user_id
			and uu.user_id='.$this->user->user_id;				*/
		
		$q='select txn_time,stock_symbol,txn_type,stocks_count,market_price,total_order from transactions
			where user_id='.$this->user->user_id.'
			order by txn_time DESC';
		# Run the query to get posts
		$transactions=DB::instance(DB_NAME)->select_rows($q);

		# Pass data to the View
		$this->template->content->txns = $transactions;

		# Render the View
		echo $this->template;
			
	}

}