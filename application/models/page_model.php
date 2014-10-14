<?php
class Page_model extends CI_Model {
function getCount($tbl){
	$arry=$this->mysession->get('condition'); 
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
	if(isset($arry['order_by'])){
	if($arry['order_by']!='' && count($arry['order_by']) > 0){
	$order_arry=$arry['order_by'];
	}
	}
		
		if(!empty($like_arry) && count($like_arry) > 0){
		$this->db->like($like_arry);
		}
		if(!empty($where_arry) && count($where_arry) > 0){
		$this->db->where($where_arry);
		}
		if(!empty($order_arry) && count($order_arry) > 0){
		$this->db->order_by($order_arry);
		}
		$qry=$this->db->get($tbl);
		
		return $qry->num_rows();
	}
	
	function getDetails($tbl,$num,$offset) {
		
	    $arry=$this->mysession->get('condition');
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
		if(isset($arry['order_by'])){
		if($arry['order_by']!='' && count($arry['order_by'] > 0)){
		$order_arry=$arry['order_by'];
		}
		}
		if(!empty($like_arry) && count($like_arry) > 0){
		$this->db->like($like_arry);
		}
		if(!empty($where_arry) && count($where_arry) > 0){
		$this->db->where($where_arry);
		}	
		if(!empty($order_arry) && count($order_arry) > 0){
		$this->db->order_by($order_arry);
		}
		$qry= $this->db->get($tbl,$num,$offset);
	   return $qry->result_array();
	}
}
?>
