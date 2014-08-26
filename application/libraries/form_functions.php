<?php class Form_functions{
function populated_dropdown($name = '', $options = array(), $selected = array(),$class=''){
$CI = & get_instance();
$form = '<select name="'.$name.'" class="'.$class.'"/>';
if($selected==''){
$form.='<option value="-1" selected="selected" >--select--</option></br>';
}
foreach ($options as $key => $val)
		{
			$key = (string) $key;

			if($key==$selected){
						$sel=' selected="selected"';
						}
						else{
						$sel='';
						}

					$form .= '<option value="'.$key.'"'.$sel.'>'.(string) $val."</option>\n";
					
		}
		$form .= '</select>';

		return $form;
}
}
?>