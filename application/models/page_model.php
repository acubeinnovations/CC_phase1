<?php
class Page_model extends CI_Model {
function getCount($tbl){
	$arry=$this->session->userdata('condition'); 
	if(isset($arry['like'])){
	if($arry['like']!=''&& count($arry['like']) > 0){
	$like_arry=$arry['like'];
	}
	}
	if(isset($arry['where'])){
	if($arry['where']!='' && count($arry['where']) > 0){
	$where_arry=$arry['where'];
	}
	}
		
		if(!empty($like_arry) && count($like_arry) > 0){
		$this->db->like($like_arry);
		}
		if(!empty($where_arry) && count($where_arry) > 0){
		$this->db->where($where_arry);
		}
	
		$qry=$this->db->get($tbl);
		
		return $qry->num_rows();
	}
	
	function getDetails($tbl,$num,$offset) {
		
	    $arry=$this->session->userdata('condition');
		if(isset($arry['like'])){
	    if($arry['like']!='' && count($arry['like'] > 0)){
		$like_arry=$arry['like'];
		}
		}
		if(isset($arry['where'])){
		if($arry['where']!='' && count($arry['where'] > 0)){
		$where_arry=$arry['where'];
		}
		}
		if(!empty($like_arry) && count($like_arry) > 0){
		$this->db->like($like_arry);
		}
		if(!empty($where_arry) && count($where_arry) > 0){
		$this->db->where($where_arry);
		}
		$qry= $this->db->get($tbl,$num,$offset);
		//echo $this->db->last_query();
	   return $qry->result_array();
	}
}
?>
