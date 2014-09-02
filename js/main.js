
function TriggerClckAdd(){
var trigger = $("#lstDropDown_A").attr("trigger");
if(trigger=='true'){
document.getElementById("settings-add-id").click();
}
}

function TriggerClckEdit(){

document.getElementById("settings-edit-id").click();

}


function TriggerClckDelete(){

document.getElementById("settings-delete-id").click();

}

$(document).ready(function(){

$('#pickupdatetimepicker').datetimepicker();
$('#dropdatetimepicker').datetimepicker();
$('#via').click(function(event){
event.preventDefault();
$('.toggle-via').toggle();


});

$('.advanced-chek-box').click(function(){

$('.group-toggle').toggle();


});

$('.recurrent-yes-chek-box').click(function(){

$('.recurrent-container').toggle();


});
 
	$('select').change(function(){ 
		    $id=$('#lstDropDown_A').val();
			$tbl=$(this).attr('tblname');
		base_url="<?php echo base_url(); ?>";
	$(this).attr('trigger',false);
	  $.post(base_url+"vehicle/getDescription",
		  {
			id:$id,
			tbl:$tbl
		  },function(data){
		  var str=data;
		  var values=str.split(" ",3);
			$('#id').val(values[0]);
			$('#description').val(values[1]);
			$('#editbox').val(values[2]);
		}
	
			); 
		
		$('#lstDropDown_A').hide();
		$('#editbox').show();
	
	
	
	});
 });

