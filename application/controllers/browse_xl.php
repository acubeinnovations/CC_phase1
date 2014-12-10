<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Browse_xl extends CI_Controller {

	public function __construct()
	{
   		 parent::__construct();

	}

	public function Trips()
	{
		$data['title']='FILES | '.PRODUCT_NAME;
		if($this->session_check()==true) {
			

			if(isset($_REQUEST['submit'])){

				$this->load->model('trip_booking_model');
				$csvfile_name=$_FILES["csv"]["name"]; 
				$csvfile=$_FILES["csv"]["tmp_name"];

				$handle = fopen($csvfile,"r");
				$delimiter = ',';
				$row = 0;
				$db_data=array();$index=0;
				while ($line= fgets ($handle)) {

					$data = explode($delimiter, $line);
					//head;
					if($row == 0){
						$cols = $data;
					}else{
						if(count($cols) == count($data)){
							for($i=0; $i<count($data); $i++){
								$db_data[$index][$cols[$i]] = $data[$i];
							}
							$db_data[$index]['created']= 'NOW()';
							$index++;
						}
					}
					$row++;
				}

				//echo "<pre>";print_r($db_data);echo "</pre>";exit;
				$this->db->insert_batch('trips',$db_data);
				echo $this->db->affected_rows()."inserted";
	
			}else{
				
			}
			$this->load->view('upload_file',$data);
		}else{
			echo "user not logged in";exit;
		}
	}

	public function session_check() {
		if(($this->session->userdata('isLoggedIn')==true )) {
			return true;
		} else {
			return false;
		}
	}
}
