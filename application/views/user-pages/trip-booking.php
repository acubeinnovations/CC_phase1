<div class="trip-booking-body">
	<div class="first-column-trip-booking">
		<fieldset class="body-border">
		<legend class="body-head">Trip Booking</legend>
			<div class="inner-first-column-trip-booking div-with-50-percent-width-with-margin-10">
				<div class="booking-source">
					<fieldset class="body-border">
					<legend class="body-head">Booking Source</legend>
						<div class="form-group">
						<?php $class="form-control row-source-50-percent-width-with-margin-8";
						echo $this->form_functions->populate_dropdown('status',$user_status='',$selected='',$class,$msg="Select Source");
						echo form_input(array('name'=>'source','class'=>'form-control row-source-50-percent-width-with-margin-8','id'=>'source','placeholder'=>'Source','value'=>'')); ?>
						</div>
					</fieldset>
				</div>
				<div class="booking-source">
					<fieldset class="body-border">
					<legend class="body-head">Passenger Informations</legend>
						<div class="form-group">
						<?php $class="form-control row-source-50-percent-width-with-margin-8";
						echo form_input(array('name'=>'passenger','class'=>'form-control','id'=>'passenger','placeholder'=>'Passenger','value'=>'')); ?>
						</div>
					</fieldset>
				</div>
				<div class="booking-source">
					<fieldset class="body-border">
					<legend class="body-head">Booking Informations</legend>

					</fieldset>
				</div>
			</div>
			<div class="inner-second-column-trip-booking div-with-50-percent-width-with-margin-10">
				<div class="booking-source">
					<fieldset class="body-border">
					<legend class="body-head">Booking Source</legend>
						<div class="form-group">
						<?php $class="form-control row-source-50-percent-width-with-margin-8";
						echo $this->form_functions->populate_dropdown('status',$user_status='',$selected='',$class,$msg="Select Source");
						echo form_input(array('name'=>'Source','class'=>'form-control row-source-50-percent-width-with-margin-8','id'=>'description','placeholder'=>'Source','value'=>'')); ?>
						</div>
					</fieldset>
				</div>
				<div class="booking-source">
					<fieldset class="body-border">
					<legend class="body-head">Passenger Informations</legend>

					</fieldset>
				</div>
				<div class="booking-source">
					<fieldset class="body-border">
					<legend class="body-head">Booking Informations</legend>

					</fieldset>
				</div>
			</div>
		</fieldset>
	</div>
	<div class="second-column-trip-booking">
		<fieldset class="body-border">
		<legend class="body-head">Notification</legend>

		</fieldset>
	</div>
</div>
