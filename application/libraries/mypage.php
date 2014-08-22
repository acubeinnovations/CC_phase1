<?php 
class  Mypage{
function paging($tbl,$per_page,$offset=''){
		$CI = & get_instance();
		$CI->load->model('page_model');
		$config['base_url'] = base_url().'admin/organization/list/';
		//$config['use_page_numbers'] = TRUE;
		$config['per_page']=$per_page;
		$count=$CI->page_model->getCount($tbl);
		$config['total_rows'] =$count;
		$data['values']=$CI->page_model->getDetails($tbl,$config['per_page'],$offset);
		$CI->pagination->initialize($config);
		$data['page_links']=$CI->pagination->create_links();
		return $data;
}
}
?>
