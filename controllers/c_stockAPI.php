<?php
class stockAPI_controller extends base_controller {
	
	public function getStock($quote)
	{
		$file = "http://download.finance.yahoo.com/d/quotes.csv?s=$quote&f=snl1c1p2&e=.csv";
		$handle = fopen($file, "r");
		while($data = fgetcsv($handle, 4096, ',')){
			//price=$data[2];
			 //print_r($data);	
			// console.log(price);
				if	($data[2] != 0){
				 echo json_encode($data);
				 }
				 else{
				 echo 'false';
				 }
				 
			 
			 }
		fclose($handle);
		
	}
	 # Send back json results to the JS, formatted in json
    
}