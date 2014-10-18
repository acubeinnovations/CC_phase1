    <div class="page-outer">
	   <fieldset class="body-border">
		<legend class="body-head">Trip Vouchers</legend><div class="form-group">
		<div class="box-body table-responsive no-padding">
			<table class="table table-hover table-bordered">
				<tbody>
					<tr>
						<th>SlNo</th>
						<th>Trip Id</th>
					    <th>Date</th>
					    <th>Route</th>
						<th>Start Km and End Km</th>
						<th>Kilometers</th>
						<th>No Of Days</th>
						<!--<th>Releasing Place</th>-->
						<th>Parking</th>
						<th>Toll</th>
						<th>State Tax</th>
						<th>Night Halt</th>
						<th>Fuel extra</th>
						<th>Trip Amount</th>
					    
					</tr>
					<?php	
						$full_tot_km=$tot_parking=$tot_toll=$tot_state_tax=$tot_night_halt=$tot_fuel_extra=$tot_trip_amount=0;
					if(isset($trips) && $trips!=false){
						for($trip_index=0;$trip_index<count($trips);$trip_index++){
						$tot_km=$trips[$trip_index]['end_km_reading']-$trips[$trip_index]['start_km_reading'];
						$full_tot_km=$full_tot_km+$tot_km;
						$tot_parking=$tot_parking+$trips[$trip_index]['parking_fees'];
						$tot_toll=$tot_toll+$trips[$trip_index]['toll_fees'];
						$tot_state_tax=$tot_state_tax+$trips[$trip_index]['state_tax'];
						$tot_night_halt=$tot_night_halt+$trips[$trip_index]['night_halt_charges'];
						$tot_fuel_extra=$tot_fuel_extra+$trips[$trip_index]['fuel_extra_charges'];
						$tot_trip_amount=$tot_trip_amount+$trips[$trip_index]['total_trip_amount'];
						
						
						$date1 = date_create($trips[$trip_index]['pick_up_date'].' '.$trips[$trip_index]['pick_up_time']);
						$date2 = date_create($trips[$trip_index]['drop_date'].' '.$trips[$trip_index]['drop_time']);
						
						$diff= date_diff($date1, $date2);
						$no_of_days=$diff->d;
						if($no_of_days==0){
							$no_of_days='1 Day';
							$day=1;
						}else{
							$no_of_days.=' Days';
							$day=$diff->d;
						}

						?>
						<tr>
							<td><?php echo $trip_index+1; ?></td>
							<td><?php echo $trips[$trip_index]['id']; ?></td>
							<td><?php echo $trips[$trip_index]['pick_up_date']; ?></td>
							<td><?php echo $trips[$trip_index]['pick_up_city'].' to '.$trips[$trip_index]['drop_city']; ?></td>
							<td><?php echo $trips[$trip_index]['start_km_reading'].'-'.$trips[$trip_index]['end_km_reading']; ?></td>
							<td><?php echo $tot_km; ?></td>
							<td><?php echo $no_of_days; ?></td>
							<!--<td><?php //echo $trips[$trip_index]['releasing_place'];?></td>-->
							<td><?php echo $trips[$trip_index]['parking_fees']; ?></td>
							<td><?php echo $trips[$trip_index]['toll_fees']; ?></td>
							<td><?php echo $trips[$trip_index]['state_tax']; ?></td>
							<td><?php echo $trips[$trip_index]['night_halt_charges']; ?></td>
							<td><?php echo $trips[$trip_index]['fuel_extra_charges']; ?></td>
							<td><?php echo $trips[$trip_index]['total_trip_amount']; ?></td>
						
						</tr>
						<?php } 
						}					
					?>
					<tr>
					<td>Total</td>
					<td></td>
					<td></td>	
					<td></td>
					<td></td>
					<td><?php echo $full_tot_km; ?></td>
					<td></td>
					<td><?php echo $tot_parking; ?></td>
					<td><?php echo $tot_toll; ?></td>
					<td><?php echo $tot_state_tax; ?></td>
					<td><?php echo $tot_night_halt; ?></td>
					<td><?php echo $tot_fuel_extra; ?></td>
					<td><?php echo $tot_trip_amount; ?></td>
					</tr>
					<?php //endforeach;
					//}
					?>
				</tbody>
			</table><?php //echo $page_links;?>
		</div>
</div>
</fieldset>
</div>
       
