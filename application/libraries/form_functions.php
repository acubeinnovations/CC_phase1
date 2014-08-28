<?php class Form_functions{
function populate_dropdown($name = '', $options = array(), $selected = array(),$class='',$msg='select'){
$CI = & get_instance();
$form = '<select name="'.$name.'" class="'.$class.'"/>';
if($selected==''){
$form.='<option value="-1" selected="selected" >--'.$msg.'--</option></br>';
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

function populate_editable_dropdown($name = '', $options = array(),$class=''){
$CI = & get_instance();

$form = '<select name='.$name.' id="lstDropDown_A" class="'.$class.'" onKeyDown="fnKeyDownHandler_A(this, event);" onKeyUp="fnKeyUpHandler_A(this, event); return false;" onKeyPress = "return fnKeyPressHandler_A(this, event);"  onChange="fnChangeHandler_A(this);" onFocus="fnFocusHandler_A(this);">';
$form.='<option selected="selected"></option></br>';

foreach ($options as $key => $val)
		{
			$key = (string) $key;

			
					$form .= '<option value="'.$key.'">'.(string) $val."</option>\n";
					
		}
		$form .= '</select>';

		return $form;
}



}
?>
