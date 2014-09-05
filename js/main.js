$(document).ready(function(){
$('.settings-add').click(function(){
var trigger = $(this).parent().prev().prev().find('#editbox').attr('trigger');
if(trigger=='true'){
$(this).siblings().find(':submit').trigger('click');
}
});
$('.settings-edit').click(function(){

$(this).siblings().find(':submit').trigger('click');
});
$('.settings-delete').click(function(){
$(this).siblings().find(':submit').trigger('click');
});
});





function Trim(strInput) {
    while (true) {
        if (strInput.substring(0, 1) != " ")
            break;
        strInput = strInput.substring(1, strInput.length);
    }
    while (true) {
        if (strInput.substring(strInput.length - 1, strInput.length) != " ")
            break;
        strInput = strInput.substring(0, strInput.length - 1);
    }
   return strInput;
}

$(document).ready(function(){

var base_url=window.location.origin;

//trip_bookig page-js start

$('#pickupdatetimepicker').datetimepicker();
$('#dropdatetimepicker').datetimepicker();
$('#via').click(function(event){
	event.preventDefault();
$('.toggle-via').toggle();


});

$('.advanced-container > .icheckbox_minimal > .iCheck-helper').on('click',function(){

$('.group-toggle').toggle();


});
$('.recurrent-radio-container > .icheckbox_minimal > .iCheck-helper').on('click',function(){


})
$('.recurrent-yes-container > .icheckbox_minimal > .iCheck-helper').on('click',function(){

$('.recurrent-radio-container').toggle();


});

$('.recurrent-radio-container > .div-continues > .iradio_minimal > .iCheck-helper').on('click',function(){

$('.recurrent-container-continues').show();
 $('#reccurent_continues_pickupdatetimepicker').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
$('#reccurent_continues_dropdatetimepicker').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});

$('.recurrent-container-alternatives').hide();
});


$('.recurrent-radio-container > .div-alternatives > .iradio_minimal > .iCheck-helper').on('click',function(){

$('.recurrent-container-continues').hide();

$('.recurrent-container-alternatives').show();
$('#reccurent_alternatives_pickupdatetimepicker').datetimepicker();
$('#reccurent_alternatives_dropdatetimepicker').datetimepicker();
});

$('.add-reccurent-dates').click(function(){
var count = $('.add-reccurent-dates').attr('count');
var new_content='<div class="form-group"><input name="reccurent_alternatives_pickupdatetimepicker[]" value="" class="form-control width-80-percent-and-margin-8" id="reccurent_alternatives_pickupdatetimepicker'+count+'" placeholder="Pick up Date and time " type="text"></div><div class="form-group"><input name="reccurent_alternatives_dropdatetimepicker[]" value="" class="form-control width-80-percent-and-margin-8" id="reccurent_alternatives_dropdatetimepicker'+count+'" placeholder="Drop Date and time " type="text"></div>';
$('.new-reccurent-date-textbox').append(new_content);
$('#reccurent_alternatives_pickupdatetimepicker'+count).datetimepicker();
$('#reccurent_alternatives_dropdatetimepicker'+count).datetimepicker();
$('.add-reccurent-dates').attr('count',Number(count)+1);
});

//for checking user in db
$('#email,#mobile').on('keyup focus focusout click blur',function(){
var email=$('#email').val();
var mobile=$('#mobile').val();
	if(Trim(email)=="" && Trim(mobile)==""){
		$('.add-customer').hide();
	}
    if(Trim(email)==""){
        
    }else{
	    
	    pattern = /^[a-zA-Z0-9]\w+(\.)?\w+@\w+\.\w{2,5}(\.\w{2,5})?$/;
	    result = pattern.test(email);
	    if( result== false) {
	     email='';
	    }
	}
 
    if(Trim(mobile)==""){
       
    }else{
   var regEx = /^(\+91|\+91|0)?\d{10}$/;
   
	if (!mobile.match(regEx)) {
 		 mobile='';
     }
	}
	if(Trim(mobile)!="" || Trim(email)!=""){
	$.post(base_url+'/trip_booking/customer-check',{
	email:email,
	mobile:mobile
	},function(data){
	if(data!=false){
		data=jQuery.parseJSON(data);
		$('#passenger').val(data[0].name);
		$('#email').val(data[0].email);	
		$('#mobile').val(data[0].mobile);
		$('.clear-customer').show();
		$('.add-customer').hide();
      }else{
		$('.clear-customer').hide();
		$('.add-customer').show();
	}
	});
	}
	});
	//clear passenger information fields
	$('.clear-customer').click(function(){
		$('#passenger').val('');
		$('#email').val('');	
		$('#mobile').val('');
		$('.clear-customer').hide();
		$(".passenger-basic-info > .form-group > label[for=name_error]").text('');
		$(".passenger-basic-info > .form-group > label[for=email_error]").text('');
		$(".passenger-basic-info > .form-group > label[for=mobile_error]").text('');

	});

	//add pasenger informations
	$('.add-customer').click(function(){
		var name =$('#passenger').val();
		var email=$('#email').val();
		var mobile=$('#mobile').val();
		var error_email ="";
		var error_mobile ="";
		var error_name='';
	if(Trim(name)==""){
		error_name ="Name is mandatory";
	}
    if(Trim(email)==""){
        error_email ="Email id is mandatory";
    }else{
	    
	    pattern = /^[a-zA-Z0-9]\w+(\.)?\w+@\w+\.\w{2,5}(\.\w{2,5})?$/;
	    result = pattern.test(email);
	    if( result== false) {
	      error_email ="Entered email is is not valid";
	    }
	}
 
    if(Trim(mobile)==""){
       error_mobile ="Mobile is mandatory";
    }else{
   var regEx = /^(\+91|\+91|0)?\d{10}$/;
   
	if (!mobile.match(regEx)) {
 		error_mobile ="Mobile is not valid";
     }
	}
	if(error_mobile!='' || error_email!='' || error_name!='')
	{
	$(".passenger-basic-info > .form-group > label[for=name_error]").text(error_name);
	$(".passenger-basic-info > .form-group > label[for=email_error]").text(error_email);
	$(".passenger-basic-info > .form-group > label[for=mobile_error]").text(error_mobile);
	}

	});

$("#pickupcity,#pickuparea,#dropdownlocation,#dropdownarea,#viacity,#viaarea").on('keyup',function(){

var pickupcity=$("#pickupcity").val();//alert(pickupcity);
var pickuparea=$("#pickuparea").val();
var viacity=$("#viacity").val();
var viaarea=$("#viaarea").val();
var dropdownlocation=$("#dropdownlocation").val();
var dropdownarea=$("#dropdownarea").val();
var origin='';
var destination='';
if(pickupcity!=''){
pickupcity=pickupcity.replace(/\s/g,"");
origin=pickupcity;

}
if(pickuparea!='' && pickupcity!=''){
pickuparea=pickuparea.replace(/\s/g,"");
origin=origin+'+'+pickuparea;

}

if(viacity!=''){
viacity=viacity.replace(/\s/g,"");
origin=origin+'|'+viacity;
destination=viacity;
}
if(viaarea!='' && viacity!=''){
viaarea=viaarea.replace(/\s/g,"");
origin=origin+'+'+viaarea;
destination=destination+'+'+viaarea;
}

if(dropdownlocation!=''){
if(viacity!=''){
destination=destination+'|';
}
dropdownlocation=dropdownlocation.replace(/\s/g,"");
if(destination==''){
destination=dropdownlocation;
}else{
destination=destination+dropdownlocation;
}

}
if(dropdownarea!='' && dropdownlocation!=''){
dropdownarea=dropdownarea.replace(/\s/g,"");
destination=destination+'+'+dropdownarea;

}
if(viacity!=''){
var via='YES';
}else{
var via='NO';
}
if(origin!='' && destination!=''){
getDistance(origin,destination,via);
}
});


function getDistance(origin,destination,via){
var url='https://maps.googleapis.com/maps/api/distancematrix/json?origins='+origin+'&destinations='+destination+'&mode=driving&language=	en&key=AIzaSyBy-tN2uOTP10IsJtJn8v5WvKh5uMYigq8';

$.post(base_url+'/trip_booking/get-distance',{
	url:url,
	via:via
	},function(data){
data=jQuery.parseJSON(data);
if(data.No_Data=='false'){
if(data.via=='NO'){
$('.estimated-distance-of-journey').html(data.distance);
$('.estimated-time-of-journey').html(data.duration);
}else if(data.via=='YES'){
first_duration=data.first_duration.replace(/\hour\b/g, 'h');
first_duration=first_duration.replace(/\hours\b/g, 'h');
first_duration=first_duration.replace(/\mins\b/g, 'm');
second_duration=data.second_duration.replace(/\hours\b/g, 'h');
second_duration=second_duration.replace(/\hour\b/g, 'h');
second_duration=second_duration.replace(/\mins\b/g, 'm');
var distance_estimation='<div class="via-distance-estimation">Pick up to Via Loc : '+data.first_distance+' Via to Drop Loc : '+data.second_distance+'</div>';
var duration_estimation='<div class="via-duration-estimation">Pick up to Via Loc : '+first_duration+' Via to Drop Loc : '+second_duration+'</div>';

$('.estimated-distance-of-journey').html(distance_estimation);
$('.estimated-time-of-journey').html(duration_estimation);
}
}else{
$('.estimated-distance-of-journey').html('');
$('.estimated-time-of-journey').html('');
}
});



}

//trip_bookig page-js end
 
	$('select').change(function(){ 
	 var edit=$('.edit').attr('for_edit');
	  if(edit=='false'){
		    $id=$(this).val();
			$tbl=$(this).attr('tblname');
			$obj=$(this);
	//$(this).attr('trigger',false);
	
	  $(this).next().attr('trigger',false);
	  $('.edit').attr('for_edit',true);
	  
	
	  $.post(base_url+"/vehicle/getDescription",
		  {
			id:$id,
			tbl:$tbl
		  },function(data){
		  
				var values=data.split(" ",3);//alert($(this).parent().find('#id').attr('id'));
				  $obj.parent().find('#id').val(values[0]);
				  $obj.parent().find('#editbox').val(values[2]);
				  $obj.parent().next().find('#description').val(values[1]);
				
				$obj.hide();
				$obj.parent().find('#editbox').show();
		});
		}	
			
	});
	
	


 });

