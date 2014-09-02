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
						echo $this->form_functions->populate_dropdown('booking_sources',$booking_sources='',$selected='',$class,$msg="Select Source");
						echo form_input(array('name'=>'source','class'=>'form-control row-source-50-percent-width-with-margin-8','id'=>'source','placeholder'=>'Source','value'=>'')); ?>
						</div>
					</fieldset>
				</div>
				<div class="booking-source">
					<fieldset class="body-border">
					<legend class="body-head">Passenger Informations</legend>
					<table>
						<tr>
							<td>
							<div class="div-with-90-percent-width-and-marigin-5">
								<div class="form-group">
								<?php 
								echo form_input(array('name'=>'passenger','class'=>'form-control','id'=>'passenger','placeholder'=>'Passenger','value'=>''));
								 ?>
								</div>
								<div class="form-group">
								<?php 
								echo form_input(array('name'=>'email','class'=>'form-control col-1-textbox-with-50-percent-width-and-float-left','id'=>'email','placeholder'=>'Email','value'=>''));
								echo form_input(array('name'=>'mobile','class'=>'form-control col-2-textbox-with-50-percent-width-and-float-left','id'=>'mobile','placeholder'=>'Mobile','value'=>''));
								 ?>
								</div>
							</div>
							</td>
							<td>
								<button class="btn btn-info btn-lg">ADD</button>
							</td>
						</tr>
						<tr>
							<td>
							<div class="form-group">
								<?php
								echo form_checkbox(array('name'=> 'advanced','class'=>'advanced-chek-box'));
								echo nbs(4).form_label('Advanced')
								?>
								
								<div class="group-toggle">
									<?php echo $this->form_functions->populate_dropdown('customer_groups',$customer_groups='',$selected='',$class ='groups form-control',$msg="Select Groups"); ?>
								</div>
							</div>
							</td>
							<td>
							<div class="form-group">
							
							</div>
							</td>
						</tr>
					</table>
					</fieldset>
				</div>
				<div class="booking-source">
					<fieldset class="body-border">
					<legend class="body-head">Booking Informations</legend>
						<div class="div-with-90-percent-width-and-marigin-5">
							<table>
							<tr>
							<td>
							<div class="form-group">
								<?php $class="form-control row-source-50-percent-width-with-margin-8";
								 echo $this->form_functions->populate_dropdown('trip_models',$trip_models='',$selected='',$class,$msg="Select Type"); 
								echo form_input(array('name'=>'no_of_passengers','class'=>'form-control row-source-50-percent-width-with-margin-8','id'=>'no_of_passengers','placeholder'=>'No of passengers','value'=>'')).br(2);?>
							</div>
							<div class="form-group">
							<?php 
							echo form_input(array('name'=>'pickupcity','class'=>'form-control width-96-percent-and-margin-8','id'=>'pickupcity','placeholder'=>'Pick up City','value'=>''));
						
							 ?>
							</div>
							<div class="form-group">
							<?php 
							echo form_input(array('name'=>'pickuparea','class'=>'form-control width-96-percent-and-margin-8','id'=>'pickuparea','placeholder'=>'Pick up Area','value'=>''));
						
							 ?>
							</div>
							<div class="form-group">
							<?php 
							echo form_input(array('name'=>'pickuplandmark','class'=>'form-control width-96-percent-and-margin-8','id'=>'pickuplandmark','placeholder'=>'Pickup Landmark','value'=>''));
							
							 ?>
							</div>
							<div class="toggle-via">
								<div class="form-group">
								<?php 
								echo form_input(array('name'=>'vialocation','class'=>'form-control width-96-percent-and-margin-8','id'=>'vialocation','placeholder'=>'Via Location','value'=>''));
						
								 ?>
								</div>
								<div class="form-group">
								<?php 
								echo form_input(array('name'=>'viaarea','class'=>'form-control width-96-percent-and-margin-8' ,'id'=>'viaarea','placeholder'=>'Via Area','value'=>''));
						
								 ?>
								</div>
								<div class="form-group">
								<?php 
								echo form_input(array('name'=>'vialandmark','class'=>'form-control width-96-percent-and-margin-8','id'=>'vialandmark','placeholder'=>'Via Landmark','value'=>''));
						
								 ?>
								</div>
							</div>
							<div class="form-group">
							<?php 
							echo form_input(array('name'=>'dropdownlocation','class'=>'form-control width-96-percent-and-margin-8','id'=>'dropdownlocation','placeholder'=>'Drop Down Location','value'=>''));
						
							 ?>
							</div>
							<div class="form-group">
							<?php 
							echo form_input(array('name'=>'dropdownarea','class'=>'form-control width-96-percent-and-margin-8' ,'id'=>'dropdownarea','placeholder'=>'Drop Down Area','value'=>''));
						
							 ?>
							</div>
							<div class="form-group">
							<?php 
							echo form_input(array('name'=>'dropdownlandmark','class'=>'form-control width-96-percent-and-margin-8','id'=>'dropdownlandmark','placeholder'=>'Drop Down Landmark','value'=>''));
						
							 ?>
							</div>
							<div class="form-group">
							<?php 
							echo form_input(array('name'=>'pickupdatetimepicker','class'=>'form-control width-96-percent-and-margin-8','id'=>'pickupdatetimepicker','placeholder'=>'Pick up Date and time ','value'=>''));
						
							 ?>
							</div>
							<div class="form-group">
							<?php 
							echo form_input(array('name'=>'dropdatetimepicker','class'=>'form-control width-96-percent-and-margin-8','id'=>'dropdatetimepicker','placeholder'=>'Drop Date and time ','value'=>''));
						
							 ?>
							</div>
							</td>
							<td>
							<?php echo anchor(base_url().$_SERVER['REQUEST_URI'].'#', 'Via','id="via"'); ?>
							</td>
							</tr>
							</table>
						</div>
					</fieldset>
				</div>
			</div>
			<div class="inner-second-column-trip-booking div-with-50-percent-width-with-margin-10">
				<div class="booking-source">
					<fieldset class="body-border">
					<legend class="body-head">Vehicle Information</legend>
						<div class="form-group">
						<?php $class="form-control row-source-50-percent-width-with-margin-8";
						echo $this->form_functions->populate_dropdown('vehicle_types',$vehicle_types='',$selected='',$class,$msg="Select Type");
						echo $this->form_functions->populate_dropdown('vehicle_ac_types',$vehicle_ac_types='',$selected='',$class,$msg="Select AC/Non AC");
						echo br(2);
						 ?>
						</div>
						<div class="form-group">
						<table class="radio-checkbox-vehicle-group">
						<tr>
							<td>
								<?php
									echo form_checkbox(array('name'=> 'beacon-light','class'=>'beacon-light-chek-box'));
								
									echo nbs(5).form_label('Beacon Light');
								?>	
							</td>
							<td>
								<?php
									echo nbs(25).form_radio(array('name' => 'beacon-light-radio','id' => 'beacon-light-radio1'));
								
								    echo nbs(5).form_label('Red').nbs(15);
								
								    echo form_radio(array('name' => 'beacon-light-radio','id' => 'beacon-light-radio2'));
								
								echo nbs(5).form_label('Blue');
								?>
							</td>
						</tr>

						<tr>
							<td>
								<?php
									echo form_checkbox(array('name'=> 'pluckcard','class'=>'pluckcard-chek-box'));
								
									echo nbs(5).form_label('Pluck Card');
								?>	
							</td>
							<td>
								<?php
									echo nbs(25).form_checkbox(array('name'=> 'uniform','class'=>'uniform-chek-box'));
								
									echo nbs(5).form_label('Uniform');
								?>
							</td>
						</tr>
						</table>
						</div>
						<div class="form-group">
						<?php $class="form-control row-source-50-percent-width-with-margin-8";
						echo $this->form_functions->populate_dropdown('vehicle_seating_capacity',$vehicle_seating_capacity='',$selected='',$class,$msg="Select Seats");
						echo $this->form_functions->populate_dropdown('languages',$languages='',$selected='',$class,$msg="Select Languages");
						echo br(2);
						 ?>
						</div>
						<div class="form-group">
						<?php $class="form-control row-source-50-percent-width-with-margin-8";
						echo $this->form_functions->populate_dropdown('tarrifs',$tarrifs='',$selected='',$class,$msg="Select tarrifs");
						echo $this->form_functions->populate_dropdown('available_vehicles',$available_vehicles='',$selected='',$class,$msg="Select Available Vehicles");
						echo br(2);
						 ?>
						</div>
					</fieldset>
				</div>
				<div class="booking-source">
					<fieldset class="body-border">
					<legend class="body-head">Recurrent</legend>
						<div class="form-group float-right recurrent-yes-container">
								<?php
									echo form_checkbox(array('name'=> 'recurrent-yes','class'=>'recurrent-yes-chek-box'));
								
									echo nbs(5).form_label('Yes');
								?>
						</div>
						<div class="recurrent-container">
							<div class="form-group">
							<?php 
							echo form_input(array('name'=>'pickupdatetimepicker','class'=>'form-control width-96-percent-and-margin-8','id'=>'pickupdatetimepicker','placeholder'=>'Pick up Date and time ','value'=>''));
						
							 ?>
							</div>
							<div class="form-group">
							<?php 
							echo form_input(array('name'=>'dropdatetimepicker','class'=>'form-control width-96-percent-and-margin-8','id'=>'dropdatetimepicker','placeholder'=>'Drop Date and time ','value'=>''));
						
							 ?>
							</div>
						</div>
					</fieldset>
				</div>
				<div class="booking-source">
					<fieldset class="body-border">
					<legend class="body-head">Rough Estimate</legend>
						<div class="box no-border-top">
                              <div class="box-body no-padding">
                                    <table class="table table-striped">
                                        <tbody>
		                                    <tr>
		                                        <td>Time Of Journey</td>
		                                        <td><div class="estimated-time-of-journey"></div></td>
		                                        
		                                    </tr>
		                                    <tr>
		                                        <td>Distance</td>
		                                        <td><div class="estimated-distance-of-journey"></div></td>
		                                        
		                                    </tr>
											<tr>
		                                        <td>Charge</td>
		                                        <td><div class="charge-per-km"></div></td>
		                                        
		                                    </tr>
											<tr>
		                                        <td>Service Tax</td>
		                                        <td><div class="service-tax"></div></td>
		                                        
		                                    </tr>
											<tr>
		                                        <td>Total Amount</td>
		                                        <td><div class="estimated-total-amount"></div></td>
		                                        
		                                    </tr>
                                   		</tbody>
									</table>
                                </div><!-- /.box-body -->
                            </div>
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
	

