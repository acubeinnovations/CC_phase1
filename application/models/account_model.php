<?php
/*	
	Model provide fa table of corresponding organisation.
	Organisation id from session used for fetching data from fa tables.
	If organisation id not set no tables acces from fa
*/

class account_model extends CI_Model {
	
	public function check_fa_user_exists($userid)	
	{
		$fa_user_table = $this->session->userdata('organisation_id')."_users";
		
		if($this->check_fa_table_exists($fa_user_table))
		{
			//get username and password from cnc user table			
			$this->db->from('users');
			$this->db->where('id',$userid );
			$this->db->where('user_type_id',FRONT_DESK );
			$this->db->where('organisation_id',$this->session->userdata('organisation_id'));	
			$cnc_user = $this->db->get()->row();

			if($cnc_user){
				//check in fa user table
				$this->db->from($fa_user_table);
				$this->db->where('user_id',@$cnc_user->username);
				$this->db->where( 'password',@$cnc_user->password);
	
				if($this->db->get()->num_rows() == 0){
					return false;//account exists
				}else{
					return true;//account not exists in fa
				}
			}else{
				return true;// invalid front desk users for session organisation
			}
			
		}else{
			return true;//table not exists for this organisation
		}
		
	}

	function check_fa_table_exists($table='')
	{
		if($this->db->query("SHOW TABLES LIKE ".$this->db->escape($table))->num_rows() == 1){
			return true;
		}else{
			 return false;
		}	    
		
	}

	function get_cnc_cust_or_group($id,$type='')
	{
		if($type == "CG"){
				$this->db->from('customer_groups');
		}else{
			$this->db->from('customers');
		}
		$this->db->where('id',$id );
		$this->db->where('organisation_id',$this->session->userdata('organisation_id'));	
		return $this->db->get()->row_array();
	}

	function add_fa_customer($id,$type='')
	{
		$fa_customer_table = $this->session->userdata('organisation_id')."_debtors_master";

		if($this->check_fa_table_exists($fa_customer_table))
		{
				
			$cnc_cust = $this->get_cnc_cust_or_group($id,$type);
			$ref = $type.$cnc_cust['id'];

			$prefs = $this->get_company_prefs();
			$data = array(
				'name'=>$cnc_cust['name'],
				'debtor_ref'=>$ref,
				'curr_code'=>@$prefs['curr_default'],
				'payment_terms'=>@$prefs['default_payment_terms'],
				'credit_limit'=>@$prefs['default_credit_limit'],
				'sales_type'=>@$prefs['base_sales'],
				);
			if(isset($cnc_cust['address']))
				$data['address'] = $cnc_cust['address'];
			//print_r($data);exit;
			$this->db->insert($fa_customer_table,$data);
		
			//insert branch
			if($this->db->insert_id()){
				$fa_branch_table = $this->session->userdata('organisation_id')."_cust_branch";

				if($this->check_fa_table_exists($fa_branch_table))
				{
					$data = array(
						'debtor_no'=>$this->db->insert_id(),
						'branch_ref'=>$ref,
						'br_name'=>$cnc_cust['name'],
						'tax_group_id' =>1,
						'default_location' =>'DEF'
						);
					$this->db->insert($fa_branch_table,$data);
				}	
			}
			return true;

		}else{
			return false;//could not insert in fa , customer table not set for this organisation
		}
	}
	
	function edit_fa_customer($id,$type='')
	{
		$fa_customer_table = $this->session->userdata('organisation_id')."_debtors_master";

		if($this->check_fa_table_exists($fa_customer_table))
		{
			if($this->fa_customer_exists($id,$type,$fa_customer_table)){
				//edit customer
				$cnc_cust = $this->get_cnc_cust_or_group($id,$type);
				$data = array('name'=>$cnc_cust['name']);
				if(isset($cnc_cust['address']))
					$data['address'] = $cnc_cust['address'];

				$this->db->where('debtor_ref',$type.$id );
				$this->db->update($fa_customer_table,$data);
				return true;
			}else{
				$this->add_fa_customer($id,$type);
			}
		}else{
			return false;//could not insert in fa , customer table not set for this organisation
		}
	}
	
	function delete_fa_customer($ref='')
	{
		$fa_customer_table = $this->session->userdata('organisation_id')."_debtors_master";

		if($this->check_fa_table_exists($fa_customer_table))
		{
			$this->db->where('debtor_ref',$ref);
			$this->db->delete($fa_customer_table);

			return true;
		}else{
			return false;//could not insert in fa , customer table not set for this organisation
		}
	}

	//check cnc customer exists in fa
	function fa_customer_exists($id,$type,$table)
	{
		$ref = $type.$id;
		$this->db->from($table);
		$this->db->where('debtor_ref',$ref);
		if($this->db->get()->num_rows() == 1){
			return true;//customer exists in fa
		}else{
			return false;//customer not exists in fa
		}
	}

	function get_company_prefs($name = false)
	{
		$fa_pref_table = $this->session->userdata('organisation_id')."_sys_prefs";

		if($this->check_fa_table_exists($fa_pref_table))
		{
			$this->db->from($fa_pref_table);
	
			$result = $this->db->get()->result_array();
			$prefs = array();
			foreach($result as $row){
				$prefs[$row['name']] = $row['value'];
			}
			
			if($name)
				return $prefs[$name];
			else
				return $prefs;
		}else{
			return false;
		}
	}


}
?>
