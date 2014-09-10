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
$('.guest-container > .icheckbox_minimal > .iCheck-helper').on('click',function(){

$('.guest-toggle').toggle();


});

$('.recurrent-yes-container > .icheckbox_minimal > .iCheck-helper').on('click',function(){

$('.recurrent-radio-container').toggle();

if(Trim($('.recurrent-container-continues').css('display'))=='block' || Trim($('.recurrent-container-alternatives').css('display'))=='block' ){
$('.recurrent-container-continues').hide();
$('.recurrent-container-alternatives').hide();
}
});

$('.recurrent-radio-container > .div-continues > .iradio_minimal > .iCheck-helper').on('click',function(){

$('.recurrent-container-continues').show();
$('#reccurent_continues_pickupdatetimepicker').daterangepicker({format: 'MM/DD/YYYY'});
$('#reccurent_continues_dropdatetimepicker').daterangepicker({format: 'MM/DD/YYYY'});


$('.recurrent-container-alternatives').hide();
});


$('.recurrent-radio-container > .div-alternatives > .iradio_minimal > .iCheck-helper').on('click',function(){

$('.recurrent-container-continues').hide();

$('.recurrent-container-alternatives').show();
$('#reccurent_alternatives_pickupdatetimepicker').datetimepicker();
$('#reccurent_alternatives_dropdatetimepicker').datetimepicker();
});

$('.add-reccurent-dates').click(function(){
var slider=$('.reccurent-container').attr('slider');
if(slider=='2'){
$('.reccurent-slider').css('overflow-y','scroll');
$('.reccurent-slider').css('height','300px');
}else{
$('.reccurent-container').attr('slider',Number(slider)+1);
}
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
	$.post(base_url+'/customers/customer-check',{
	email:email,
	mobile:mobile
	},function(data){
	if(data!=false){
		data=jQuery.parseJSON(data);
		$('#customer').val(data[0].name);
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
//guest passengerchecking in db

	$('#guestemail,#guestmobile').on('keyup focus focusout click blur',function(){
var email=$('#guestemail').val();
var mobile=$('#guestmobile').val();
	
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
	$.post(base_url+'/customers/customer-check',{
	email:email,
	mobile:mobile
	},function(data){
	if(data!=false){
		data=jQuery.parseJSON(data);
		$('#guestname').val(data[0].name);
		$('#guestemail').val(data[0].email);	
		$('#guestmobile').val(data[0].mobile);
		$('.clear-guest').show();
		
      }
	});
	}
	});
	//clear customer information fields
	$('.clear-customer').click(function(){
		$('#customer').val('');
		$('#email').val('');	
		$('#mobile').val('');
		$('.clear-customer').hide();
		$(".passenger-basic-info > .form-group > label[for=name_error]").text('');
		$(".passenger-basic-info > .form-group > label[for=email_error]").text('');
		$(".passenger-basic-info > .form-group > label[for=mobile_error]").text('');

	});
	//clear guest information fields
	$('.clear-guest').click(function(){
		$('#guestname').val('');
		$('#guestemail').val('');	
		$('#guestmobile').val('');
		$('.clear-guest').hide();
		
	});

	//add pasenger informations
	$('.add-customer').click(function(){
		var name =$('#customer').val();
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
	}else{
	$.post(base_url+'/customers/add-customer',{
	name:name,
	email:email,
	mobile:mobile
	},function(data){
	if(data!=true){
	$('#email').trigger('click');
	}

	});

	}


	});

$("#pickupcity").on('keyup',function(){
var pickupcity=$("#pickupcity").val();
if(pickupcity!=''){

placeAutofillGenerator(pickupcity,'autofill-pickupcity','pickupcity');

}
});

$("#dropdownlocation").on('keyup',function(){

var dropdownlocation=$("#dropdownlocation").val();
if(dropdownlocation!=''){

placeAutofillGenerator(dropdownlocation,'autofill-dropdownlocation','dropdownlocation');

}
});

$("#viacity").on('keyup',function(){
var viacity=$("#viacity").val();
if(viacity!=''){

placeAutofillGenerator(viacity,'autofill-viacity','viacity');

}
});



$("#pickupcity,#pickuparea,#dropdownlocation,#dropdownarea,#viacity,#viaarea").on('keyup click',function(){

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

$.post(base_url+'/maps/get-distance',{
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
var distance_estimation='<div class="via-distance-estimation">Pick up to Via Loc : '+data.first_distance+'<br/> Via to Drop Loc : '+data.second_distance+'</div>';
var duration_estimation='<div class="via-duration-estimation">Pick up to Via Loc : '+first_duration+'<br/>  Via to Drop Loc : '+second_duration+'</div>';

$('.estimated-distance-of-journey').html(distance_estimation);
$('.estimated-time-of-journey').html(duration_estimation);
}
}else{
$('.estimated-distance-of-journey').html('');
$('.estimated-time-of-journey').html('');
}
});



}

function placeAutofillGenerator(city,ul_class,insert_to){

var 
url='https://maps.googleapis.com/maps/api/place/autocomplete/json?input='+city+'&types=(cities)&language=en&key=AIzaSyBy-tN2uOTP10IsJtJn8v5WvKh5uMYigq8';

$.post(base_url+'/maps/get-places',{
	url:url,
	insert_to:insert_to
	},function(data){
if(data!='false'){
$('.'+ul_class).html(data);
$('.'+ul_class).parent().addClass('open');
}

});

}
$('html').click(function(){
$('.input-group-btn').removeClass('open');
});

$('.drop-down-places').live('click',function(e){

var insert_to=$(this).attr('insert_to');
var place=$(this).attr('place');
$('#'+insert_to).val(place);
$('#'+insert_to).trigger('click');
$(this).parent().parent().parent().removeClass('open');

});

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

