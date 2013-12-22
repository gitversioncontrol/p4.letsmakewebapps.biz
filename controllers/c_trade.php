<?php
class trade_controller extends base_controller {
	public $accountBalance;
	public $countBought;
	public $countSold;
	public $cost_basis;
	
	 public function __construct() {
		parent::__construct();
		# Make sure user is logged in if they want to use anything in this controller
		if(!$this->user) {
		die("Members only Page. <a href='/users/login'>Login</a>");
		}
	}
	
	public function index(){
	 # Setup view
        $this->template->content = View::instance('v_trade_index');
        $this->template->title   = "Trade";
		
	# JavaScript files
	$client_files_body = Array(
		'/js/jquery-1.10.2.min.js',
		'/js/jquery.form.js', 
		'/js/trade_index.js');
	$this->template->client_files_body = Utils::load_client_files($client_files_body);
	# Render template
	echo $this->template;
	}
	
	public function stockInfo(){
	$stockData=($_POST['result']);
	//print_r(($_POST['result']));
	//print_r($stockData);
	$symbol=$stockData[0];
	$txntype=$stockData[1];
	$stock_count=$stockData[2];
	$last_price=$stockData[3];
	$total_order=$stockData[4];
	
	//Fetch data from database and assign to variables
			$q="select balance from users where email='".$this->user->email."'";
			$this->accountBalance=DB::instance(DB_NAME)->select_field($q);
		//echo $q. " ".$this->accountBalance;
			
			$q1="select count_bought from performance where user_id='".$this->user->user_id."' and stock_symbol='".$symbol."' ";
			$this->countBought=DB::instance(DB_NAME)->select_field($q1);
			
			$q2="select count_sold from performance where user_id='".$this->user->user_id."' and stock_symbol='".$symbol."' ";
			$this->countSold=DB::instance(DB_NAME)->select_field($q2);
			
			$remaining_count=$this->countBought - $this->countSold;
			
		//	echo $this->accountBalance." " .$this->countBought. " " .$this->countSold;
			
		 if ($txntype == 'Buy'){
			//echo $this->accountBalance ." " .$this->countBought. " " .$this->countSold;
			if($total_order > $this->accountBalance){
			echo "Account doesn't have sufficient funds to place this buy order. Account balance is: ".$this->accountBalance;
			}
			else {
			echo 'success';
			}
		}
		else{
			if ($stock_count > $remaining_count ){
			echo "You can't sell more number of stocks than you have in your portfolio". $remaining_count;
			}
			else{
			echo 'success';
			}
		}
			
	}  
	
	//echo $symbol." ".$txntype." ".$stock_count." " .$last_price. " ".$total_order;
	//echo 'success';
	//echo "hello from stockInfo php function "+$data[0];
	
	
	public function placeOrder(){
	 $stockData=($_POST['result']);
	//print_r(($_POST['result']));
	//print_r($stockData);
	$symbol=$stockData[0];
	$txntype=$stockData[1];
	$stock_count=$stockData[2];
	$last_price=$stockData[3];
	$total_order=$stockData[4];
	
	//$symbol='f';
	//Fetch data from database and assign to variables
			$q="select balance from users where email='".$this->user->email."'";
			$accountBalance=DB::instance(DB_NAME)->select_field($q);
		//echo $q. " ".$this->accountBalance;
			
			$q1="select count_bought from performance where user_id='".$this->user->user_id."' and stock_symbol='".$symbol."' ";
			$countBought=DB::instance(DB_NAME)->select_field($q1);
			
			$q2="select count_sold from performance where user_id='".$this->user->user_id."' and stock_symbol='".$symbol."' ";
			$countSold=DB::instance(DB_NAME)->select_field($q2);
			
	$q4="select cost_basis from performance where user_id='".$this->user->user_id."' and stock_symbol='".$symbol."' " ;
	$cost_basis=DB::instance(DB_NAME)->select_field($q4);
	
	
	$q5="select realized_gain from performance where user_id='".$this->user->user_id."' and stock_symbol='".$symbol."' " ;
	$realized_gain=DB::instance(DB_NAME)->select_field($q5);
	
	$q6="select unrealized_gain from performance where user_id='".$this->user->user_id."' and stock_symbol='".$symbol."' " ;
	$unrealized_gain=DB::instance(DB_NAME)->select_field($q6);
	
	$q7="select amount_invested from performance where user_id='".$this->user->user_id."' and stock_symbol='".$symbol."' " ;
	$amount_invested=DB::instance(DB_NAME)->select_field($q7);
	
	$q8="select balance from users where user_id='".$this->user->user_id."' ";
	$balance=DB::instance(DB_NAME)->select_field($q8);
	//$last_price=20;
	echo $balance;
	if ($txntype == 'Buy'){
			//echo $this->accountBalance ." " .$this->countBought. " " .$this->countSold;
			
			//echo "Account doesn't have sufficient funds to place this buy order. Account balance is: ".$this->accountBalance;
			//$last_price=54.27;
			$amount_invested=$amount_invested + $total_order;
			
			$remaining_count=$countBought - $countSold;
			//$cost_basis=( ($countBought * $cost_basis) + ($stock_count * $last_price) )/($countBought + $stock_count) ;
			$cost_basis=( ($remaining_count * $cost_basis) + ($stock_count * $last_price) )/($remaining_count + $stock_count) ;
			$unrealized_gain= $remaining_count *( $last_price - $cost_basis ) ;
			$countBought=$countBought+$stock_count;
			$balance=$balance-$total_order;
		}
		else{
			
			//$last_price=53.27;
			$amount_invested=$amount_invested - $total_order;
			$countSold=$countSold+$stock_count;
			$realized_gain=$realized_gain+( $stock_count *( $last_price - $cost_basis ) );
			$remaining_count=$countBought - $countSold;
			$unrealized_gain= $remaining_count *( $last_price - $cost_basis ) ;
			echo $countSold ." " . $realized_gain . " " . $unrealized_gain. " " .$cost_basis;
			$balance=$balance+$total_order;
		}
	
	
	
	#Insert the order data in performance table
	//This query will update if keys:user_id and stock_symbol are already  present,otherwise insert for new entries
	$q3="insert into performance (user_id,stock_symbol,count_bought,count_sold,cost_basis,realized_gain,unrealized_gain,amount_invested) values('".$this->user->user_id."','$symbol','$countBought','$countSold','$cost_basis','$realized_gain','$unrealized_gain','$amount_invested')
			on duplicate key update count_sold='$countSold',count_bought='$countBought',cost_basis='$cost_basis',realized_gain='$realized_gain',unrealized_gain='$unrealized_gain',amount_invested='$amount_invested' ";
		DB::instance(DB_NAME)->query($q3);
		
		
		echo  $q3." " ."count bought : ". $countBought ." and cost_basis". $cost_basis. "realized_gain ,realized_gain , amount_invested " .$realized_gain ." ". $unrealized_gain . " " .$amount_invested ;
		//echo  and q4 : ".$q4." and cost_basis". $this->cost_basis;
		//insert('users',$_POST);
		 
		//Insert data in transaction table	
		
		$txn_time = Time::now();
		
	$t1="insert into transactions (user_id,txn_time,stock_symbol,txn_type,stocks_count,market_price,total_order) 
			values ('".$this->user->user_id."','$txn_time','$symbol','$txntype','$stock_count','$last_price','$total_order')";
	DB::instance(DB_NAME)->query($t1);	
	
	//$balance=5000;
	$data=Array("balance" => $balance );
	DB::instance(DB_NAME)->update('users', $data, "WHERE user_id = '".$this->user->user_id."' ");
	}



}
