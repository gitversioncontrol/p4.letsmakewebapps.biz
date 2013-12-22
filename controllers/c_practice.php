<?php
class practice_controller extends base_controller{
	public $tvalue;
	 public function getStock() {
			# Setup view
			$this->template->content = View::instance('v_practice');
			$this->template->title   = "Stock price";
			
			# Render template
			
			$quote='^DJI+^IXIC+^NYL+GOOG';
			$this->showStock($quote);
			$this->template->content->data=$this->tvalue;
			echo $this->template;
		}
		
	public function showStock($quote)
	{
		$file = "http://download.finance.yahoo.com/d/quotes.csv?s=$quote&f=snl1c1p2&e=.csv";
		$handle = fopen($file, "r");
		while($data = fgetcsv($handle, 4096, ',')){
			 print_r($data);
			//$this->tvalue= "<tr>";
				foreach($data as $key => $value){
							//echo $key." and ".$value."<br>";
							
						//	$this->tvalue=''<td>'.$value.'</td>'';
							
							}
			$this->tvalue= 'test';
		}
		fclose($handle);
		
			
	}
}

