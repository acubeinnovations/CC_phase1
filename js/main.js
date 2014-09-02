
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
