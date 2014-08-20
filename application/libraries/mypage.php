<?php 
class  Mypage{
function paging($tbl,$condition,$per_page){
		//$this->load->library('database');
		$this->load->model('admin_model');
		$config['base_url'] = base_url().'admin/pagination/';
		$config['use_page_numbers'] = TRUE;
		$config['per_page']=$per_page;
		$count=$this->admin_model->getCount($tbl,$condition);
		
		$config['total_rows'] =$count;
		$data['values']=$this->admin_model->getDetails($tbl,$config['per_page'],$condition,$this->uri->segment(3));
		//echo "<pre>";print_r($data);echo "</pre>";exit();
		$this->pagination->initialize($config);
		$data['page_links']=$this->pagination->create_links();
		return $data;
}
}
?>