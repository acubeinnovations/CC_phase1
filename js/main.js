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

//for tarrif trigger
$(document).ready(function(){

$('.tarrif-add').click(function(){
$('#tarrif-add-id').trigger('click');
});
$('.tarrif-edit').click(function(){

$(this).siblings().find(':submit').trigger('click');

});
$('.tarrif-delete').click(function(){

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

if($('.advanced-chek-box').attr('checked')=='checked'){

$('.group-toggle').toggle();

}

if($('.guest-chek-box').attr('checked')=='checked'){

$('.guest-toggle').toggle();

}
if($('.beacon-light-chek-box').attr('checked')=='checked'){
var radio_button_to_be_checked = $('.beacon-light-chek-box').attr('radio_to_be_selected');alert(radio_button_to_be_checked);
if(radio_button_to_be_checked=='red'){

$('.beacon-radio1-container > .iradio_minimal > .iCheck-helper').trigger('click');

	

}else if(radio_button_to_be_checked=='blue'){

$('.beacon-radio1-container > .iradio_minimal > .iCheck-helper').trigger('click');

	

}
}

if($('.recurrent-yes-chek-box').attr('checked')=='checked'){

var radio_button_to_be_checked = $('.recurrent-yes-chek-box').attr('radio_button_to_be_checked');

$('.recurrent-radio-container').toggle();

if(radio_button_to_be_checked=='continues'){


$('.recurrent-container-continues').show();
$('#reccurent_continues_pickupdatepicker').daterangepicker({format: 'MM/DD/YYYY'});
$('#reccurent_continues_dropdatepicker').daterangepicker({format: 'MM/DD/YYYY'});

$('#reccurent_continues_pickuptimepicker').datetimepicker({datepicker:false,
	format:'H:i',
	step:5
});
$('#reccurent_continues_droptimepicker').datetimepicker({datepicker:false,
	format:'H:i',
	step:5
});


$('.recurrent-container-alternatives').hide();

}else if(radio_button_to_be_checked=='alternatives'){


$('.recurrent-container-continues').hide();

$('.recurrent-container-alternatives').show();

var count = $('.add-reccurent-dates').attr('count');
var slider=$('.reccurent-container').attr('slider');
if(slider>='2'){
$('.reccurent-slider').css('overflow-y','scroll');
$('.reccurent-slider').css('height','300px');
}else{
$('.reccurent-container').attr('slider',Number(slider)+1);
}
for(var i=0;i<count;i++){
$('#reccurent_alternatives_pickupdatepicker'+i).datetimepicker({timepicker:false,format:'Y-m-d',formatDate:'Y-m-d'});
$('#reccurent_alternatives_dropdatepicker'+i).datetimepicker({timepicker:false,format:'Y-m-d',formatDate:'Y-m-d'});

$('#reccurent_alternatives_pickuptimepicker'+i).datetimepicker({datepicker:false,
	format:'H:i',
	step:5
});
$('#reccurent_alternatives_droptimepicker'+i).datetimepicker({datepicker:false,
	format:'H:i',
	step:5
});
}
}


}



$('#pickupdatepicker').datetimepicker({timepicker:false,format:'d/m/Y',formatDate:'d/m/Y'});
$('#dropdatepicker').datetimepicker({timepicker:false,format:'d/m/Y',formatDate:'d/m/Y'});
$('#pickuptimepicker').datetimepicker({datepicker:false,
	format:'H:i',
	step:5
});
$('#droptimepicker').datetimepicker({datepicker:false,
	format:'H:i',
	step:5
});


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
$('.recurrent-radio-container > .div-continues > .iradio_minimal > .iCheck-helper').trigger('click');
if($('.recurrent-yes-chek-box').attr('checked')!='checked'){
if(Trim($('.recurrent-container-continues').css('display'))=='block' || Trim($('.recurrent-container-alternatives').css('display'))=='block' ){
$('.recurrent-container-continues').hide();
$('.recurrent-container-alternatives').hide();
}
}
});

$('.recurrent-radio-container > .div-continues > .iradio_minimal > .iCheck-helper').on('click',function(){

$('.recurrent-container-continues').show();
$('#reccurent_continues_pickupdatepicker').daterangepicker({format: 'MM/DD/YYYY'});
$('#reccurent_continues_dropdatepicker').daterangepicker({format: 'MM/DD/YYYY'});

$('#reccurent_continues_pickuptimepicker').datetimepicker({datepicker:false,
	format:'H:i',
	step:5
});
$('#reccurent_continues_droptimepicker').datetimepicker({datepicker:false,
	format:'H:i',
	step:5
});


$('.recurrent-container-alternatives').hide();


});


$('.recurrent-radio-container > .div-alternatives > .iradio_minimal > .iCheck-helper').on('click',function(){

$('.recurrent-container-continues').hide();

$('.recurrent-container-alternatives').show();
$('#reccurent_alternatives_pickupdatepicker').datetimepicker({timepicker:false,format:'d/m/Y',formatDate:'d/m/Y'});
$('#reccurent_alternatives_dropdatepicker').datetimepicker({timepicker:false,format:'d/m/Y',formatDate:'d/m/Y'});


$('#reccurent_alternatives_pickuptimepicker').datetimepicker({datepicker:false,
	format:'H:i',
	step:5
});
$('#reccurent_alternatives_droptimepicker').datetimepicker({datepicker:false,
	format:'H:i',
	step:5
});

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
var new_content='<div class="form-group"><input name="reccurent_alternatives_pickupdatepicker[]" value="" class="form-control width-60-percent-with-margin-10" id="reccurent_alternatives_pickupdatepicker'+count+'" placeholder="Pick up Date" type="text"><input name="reccurent_alternatives_pickuptimepicker[]" value="" class="form-control width-30-percent-with-margin-left-20" id="reccurent_alternatives_pickuptimepicker'+count+'" placeholder="Pick up Time" type="text"></div><div class="form-group"><input name="reccurent_alternatives_dropdatepicker[]" value="" class="form-control width-60-percent-with-margin-10" id="reccurent_alternatives_dropdatepicker'+count+'" placeholder="Drop Date" type="text"><input name="reccurent_alternatives_droptimepicker[]" value="" class="form-control width-30-percent-with-margin-left-20" id="reccurent_alternatives_droptimepicker'+count+'" placeholder="Drop time " type="text"></div>';
$('.new-reccurent-date-textbox').append(new_content);
$('#reccurent_alternatives_pickupdatepicker'+count).datetimepicker({timepicker:false,format:'d/m/Y',formatDate:'d/m/Y'});
$('#reccurent_alternatives_dropdatepicker'+count).datetimepicker({timepicker:false,format:'d/m/Y',formatDate:'d/m/Y'});

$('#reccurent_alternatives_pickuptimepicker'+count).datetimepicker({datepicker:false,
	format:'H:i',
	step:5
});
$('#reccurent_alternatives_droptimepicker'+count).datetimepicker({datepicker:false,
	format:'H:i',
	step:5
});

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
	
	//add tarrif page js start
	$('#fromdatepicker').datetimepicker({timepicker:false,format:'Y-m-d'});
	
	
	


 });

