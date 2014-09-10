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
					<legend class="body-head">Customer Informations</legend>
					<table>
						<tr>
							<td>
							<div class="div-with-90-percent-width-and-marigin-5 passenger-basic-info">
								<div class="form-group">
								<?php 
								echo form_input(array('name'=>'customer','class'=>'form-control','id'=>'customer','placeholder'=>'Customer','value'=>'')).form_label('','name_error');
								 ?>
								</div>
								<div class="form-group margin-top-less-10">
								<?php 
								echo form_input(array('name'=>'email','class'=>'form-control col-1-textbox-with-50-percent-width-and-float-left','id'=>'email','placeholder'=>'Email','value'=>''));
								echo form_input(array('name'=>'mobile','class'=>'form-control col-2-textbox-with-50-percent-width-and-float-left','id'=>'mobile','placeholder'=>'Mobile','value'=>'')).br().form_label('','email_error').nbs(61).form_label('','mobile_error');
								 ?>
								</div>
							</div>
							</td>
							<td>
								<button class="btn btn-info btn-lg add-customer">ADD</button>
								<button class="btn btn-danger btn-lg clear-customer">CLEAR</button>
							</td>
						</tr>
						<tr>
							<td>
								<div class="form-group advanced-container margin-top-less-20">
									<?php
									echo form_checkbox(array('name'=> 'advanced','class'=>'advanced-chek-box flat-red'));
									echo nbs(4).form_label('Advanced')
									?>
								</div>
								<div class="form-group guest-container margin-top-less-40 float-right">
									<?php
									echo form_checkbox(array('name'=> 'guest','class'=>'guest-chek-box flat-red'));
									echo nbs(4).form_label('Guest')
									?>
								</div>
								
															
							</td>
							
						</tr>
						<tr>
							<td>
								<div class="group-toggle div-with-90-percent-width-and-marigin-5">
										<?php echo $this->form_functions->populate_dropdown('customer_groups',$customer_groups,$selected='',$class ='groups form-control',$msg="Select Groups"); ?>
								</div>
							
							</td>
						</tr>
						<tr>
							<td>
								<div class="guest-toggle div-with-90-percent-width-and-marigin-5">
									<div class="form-group">
										<?php 
										echo form_input(array('name'=>'guestname','class'=>'form-control','id'=>'guestname','placeholder'=>'Guest','value'=>''));
										 ?>
										</div>
										<div class="form-group margin-top-less-10">
										<?php 
										echo form_input(array('name'=>'guestemail','class'=>'form-control col-1-textbox-with-50-percent-width-and-float-left','id'=>'guestemail','placeholder'=>'Email','value'=>''));
										echo form_input(array('name'=>'guestmobile','class'=>'form-control col-2-textbox-with-50-percent-width-and-float-left','id'=>'guestmobile','placeholder'=>'Mobile','value'=>''));
										 ?>
									</div>
								</div>
							</td>
							<td>
								<button class="btn btn-danger btn-lg clear-guest">CLEAR</button>
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
										 echo $this->form_functions->populate_dropdown('trip_models',$trip_models,$selected='',$class,$msg="Select Type"); 
										echo form_input(array('name'=>'no_of_passengers','class'=>'form-control row-source-50-percent-width-with-margin-8','id'=>'no_of_passengers','placeholder'=>'No of passengers','value'=>'')).br(2);?>
									</div>
									<div class="form-group">
								
                                        <div class="input-group-btn ">
                                            <?php 
									echo form_input(array('name'=>'pickupcity','class'=>'form-control width-96-percent-and-margin-8 dropdown-toggle','id'=>'pickupcity','placeholder'=>'Pick up City','value'=>''));
						
									 ?>
                                            <ul class="dropdown-menu dropdown-menu-on-key-press autofill-pickupcity">
                                                
                                            </ul>
                                        </div>
                                       
                                   
								 </div>
									
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
											  <div class="input-group-btn ">
										<?php 
										echo form_input(array('name'=>'viacity','class'=>'form-control width-96-percent-and-margin-8','id'=>'viacity','placeholder'=>'Via City','value'=>''));
						
										 ?>
												 <ul class="dropdown-menu dropdown-menu-on-key-press autofill-viacity">
                                                
                                          		  </ul>
                                        </div>
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
										  <div class="input-group-btn ">
									<?php 
									echo form_input(array('name'=>'dropdownlocation','class'=>'form-control width-96-percent-and-margin-8','id'=>'dropdownlocation','placeholder'=>'Drop Down City','value'=>''));
						
									 ?>
											 <ul class="dropdown-menu dropdown-menu-on-key-press autofill-dropdownlocation">
                                                
                                            </ul>
                                        </div>
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
						echo $this->form_functions->populate_dropdown('vehicle_types',$vehicle_types,$selected='',$class,$msg="Select Type");
						echo $this->form_functions->populate_dropdown('vehicle_ac_types',$vehicle_ac_types,$selected='',$class,$msg="Select AC/Non AC");
						echo br(2);
						 ?>
						</div>
						<div class="form-group">
						<table class="radio-checkbox-vehicle-group">
						<tr>
							<td>
								<?php
									echo form_checkbox(array('name'=> 'beacon-light','class'=>'beacon-light-chek-box flat-red'));
								
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
									echo form_checkbox(array('name'=> 'pluckcard','class'=>'pluckcard-chek-box flat-red'));
								
									echo nbs(5).form_label('Pluck Card');
								?>	
							</td>
							<td>
								<?php
									echo nbs(25).form_checkbox(array('name'=> 'uniform','class'=>'uniform-chek-box flat-red'));
								
									echo nbs(5).form_label('Uniform');
								?>
							</td>
						</tr>
						</table>
						</div>
						<div class="form-group">
						<?php $class="form-control row-source-50-percent-width-with-margin-8";
						echo $this->form_functions->populate_dropdown('vehicle_seating_capacity',$vehicle_seating_capacity,$selected='',$class,$msg="Select Seats");
						echo $this->form_functions->populate_dropdown('languages',$languages,$selected='',$class,$msg="Select Languages");
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
									echo form_checkbox(array('name'=> 'recurrent-yes','class'=>'recurrent-yes-chek-box flat-red'));
								
									echo nbs(5).form_label('Yes');
								?>
						</div>
						<div class="form-group float-right recurrent-radio-container">
						<div class="div-continues">
						<?php
									echo nbs(1).form_radio(array('name' => 'recurrent','id' => 'continues-recurrent','value'=>'continues'));
								
								    echo nbs(5).form_label('Continues').nbs(5);
									?></div> <div class="div-alternatives"><?php
								    echo form_radio(array('name' => 'recurrent','id' => 'alternative-recurrent','value'=>'alternative'));
								
								echo nbs(5).form_label('Alternatives');
								?>
						</div>
						</div>
						<div class="recurrent-container-continues">
							<div class="form-group">
									
									<?php 
								
									echo form_input(array('name'=>'reccurent_continues_pickupdatetimepicker','class'=>'form-control width-96-percent-and-margin-8','id'=>'reccurent_continues_pickupdatetimepicker','placeholder'=>'Pick up Date and time ','value'=>''));
						
									 ?>
									
								</div>
								<div class="form-group">
								<?php 
								echo form_input(array('name'=>'reccurent_continues_dropdatetimepicker','class'=>'form-control width-96-percent-and-margin-8','id'=>'reccurent_continues_dropdatetimepicker','placeholder'=>'Drop Date and time ','value'=>''));
						
								 ?>
								</div>
							</div>
							<div class="recurrent-container-alternatives">
								<table class="alternative-table">
									<tr>
										<td class="width-80-percent">
											<div class="form-group">
											<?php 
											echo form_input(array('name'=>'reccurent_alternatives_pickupdatetimepicker[]','class'=>'form-control  margin-8','id'=>'reccurent_alternatives_pickupdatetimepicker','placeholder'=>'Pick up Date and time ','value'=>''));
						
											 ?>
											</div>
								
											<div class="form-group">
											<?php 
											echo form_input(array('name'=>'reccurent_alternatives_dropdatetimepicker[]','class'=>'form-control margin-8','id'=>'reccurent_alternatives_dropdatetimepicker','placeholder'=>'Drop Date and time ','value'=>''));
						
											 ?>
											</div>
										</td>
										<td>
											<div class="float-left margin-15"><button class="btn btn-info btn-lg add-reccurent-dates" count="0">ADD</button></div>
										</td>
									</tr>
								</table>
								<div class="new-reccurent-date-textbox">
								
								</div>
							</div>
							
					</fieldset>
				</div>
				<div class="booking-source">
					<fieldset class="body-border">
					<legend class="body-head">Rough Estimate</legend>
						<div class="box no-border-top rough-estimate-body">
                              <div class="box-body no-padding">
                                    <table class="table table-striped">
                                        <tbody>
		                                    <tr>
		                                        <td class="wdith-30-percent">Time Of Journey<span class="float-right"> : </span></td>
		                                        <td><div class="estimated-time-of-journey"></div></td>
		                                        
		                                    </tr>
		                                    <tr>
		                                        <td>Distance<span class="float-right"> : </span></td>
		                                        <td><div class="estimated-distance-of-journey"></div></td>
		                                        
		                                    </tr>
											<tr>
		                                        <td>Charge<span class="float-right"> : </span></td>
		                                        <td><div class="charge-per-km"></div></td>
		                                        
		                                    </tr>
											<tr>
		                                        <td>Service Tax<span class="float-right"> : </span></td>
		                                        <td><div class="service-tax"></div></td>
		                                        
		                                    </tr>
											<tr>
		                                        <td>Total Amount<span class="float-right"> : </span></td>
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

	

