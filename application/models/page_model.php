<?php
class Page_model extends CI_Model {
function getCount($tbl){
	
	$arry=$this->session->userdata('condition');
	$like_arry=$arry[0];
	$where_arry=$arry[1];
		if($like_arry==''&& $where_arry==''){
		$qry=$this->db->get($tbl);
		}
		elseif($like_arry!=''&& $where_arry==''){
		$this->db->like($like_arry);
		$qry=$this->db->get($tbl);
		}
		elseif($like_arry==''&& $where_arry!=''){
		$this->db->where($where_arry);
		$qry=$this->db->get($tbl);
		}
		else{
		$this->db->like($like_arry);
		$this->db->where($where_arry);
		$qry=$this->db->get($tbl);
		}
		
		return $qry->num_rows();
	
	}
	function getDetails($tbl,$num,$offset) {
		
	    $arry=$this->session->userdata('condition');
	    $like_arry=$arry[0];
	    $where_arry=$arry[1];
		if($like_arry==''&& $where_arry==''){
		$qry=$this->db->get($tbl,$num,$offset);
		//echo $this->db->get($tbl,$num,$offset); exit();
		}
		elseif($like_arry!=''&& $where_arry==''){
		$this->db->like($like_arry);
		$qry= $this->db->get($tbl,$num,$offset);
		}
		elseif($like_arry==''&& $where_arry!=''){
		$this->db->where($where_arry);
		$qry= $this->db->get($tbl,$num,$offset);
		}
		else{
		$this->db->like($like_arry);
		$this->db->where($where_arry);
		$qry= $this->db->get($tbl,$num,$offset);
		}
	   return $qry->result_array();
	}
}
?>
