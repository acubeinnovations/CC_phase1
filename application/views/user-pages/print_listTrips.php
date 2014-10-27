<?php
set_time_limit(0);
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Fee_Details.xls");
header("Cache-Control: cache, must-revalidate");
header("Pragma: public");
?>
			<table class="table table-hover table-bordered">
				<tbody>
					<tr>	
						
					    <th style="width:2%">Trip ID </th>
					    <th style="width:4%">Booking Date</th>
					    <th style="width:4%">Pickup Date</th>
					    <th style="width:11%">Vehicle</th>
					    <th  style="width:11%">Pickup Loc</th>
					    <th  style="width:11%">Guest</th>
					    <th style="width:11%">Visit To</th>
					    <th style="width:11%">Called By</th>						
					    <th style="width:11%">Driver</th>
					    <th style="width:11%">Status</th>
					    <th style="width:13%">Action</th>
					</tr>
					<?php
					
					
					for($trip_index=0;$trip_index<count($trips);$trip_index++){
						$pickdate=$trips[$trip_index]['pick_up_date'].' '.$trips[$trip_index]['pick_up_time'];
						$dropdate=$trips[$trip_index]['drop_date']." ".$trips[$trip_index]['drop_time'];

						$date1 = date_create($pickdate);
						$date2 = date_create($dropdate);
						
						$diff= date_diff($date1, $date2);
						if($diff->d > 0 && $diff->h >= 0 && $diff->i >=1 ){
							$no_of_days=$diff->d+1;
						}else{
							$no_of_days=$diff->d;
						}
					?>
					<tr>
						
						<td><?php echo $trips[$trip_index]['trip_id'];?></td>
						<td><?php echo $trips[$trip_index]['booking_date'];?></td>
					   <!-- <td><?php echo $customers[$trips[$trip_index]['customer_id']].br();
						if($trips[$trip_index]['customer_group_id']==gINVALID || $trips[$trip_index]['customer_group_id']==0){echo '';}else{ echo $customer_groups[$trips[$trip_index]['customer_group_id']];}?></td>-->
					    <td><?php echo $pickdate; ?></td>
					    <td><?php 
					    if($trips[$trip_index]['vehicle_id']==gINVALID || $trips[$trip_index]['vehicle_id']==0){echo 'Vehicle Not Allocated';}else{ echo $trips[$trip_index]['registration_number'].br();
					    }
					    if($trips[$trip_index]['vehicle_model_id']==gINVALID || $trips[$trip_index]['vehicle_model_id']==0){echo '';}else{ echo $trips[$trip_index]['model'].br();
					    }
					    if($trips[$trip_index]['vehicle_ownership_types_id']==gINVALID || $trips[$trip_index]['vehicle_ownership_types_id']==0){echo '';}else{ echo $trips[$trip_index]['ownership'].br();
					    }
					    ?></td>
						 <td><?php echo $trips[$trip_index]['pick_up_city'].br();
									 echo $trips[$trip_index]['pick_up_area'];
						 ?></td>
					  <td>
					  <?php if($trips[$trip_index]['guest_id']==gINVALID || $trips[$trip_index]['guest_id']==0){echo '';}else{ echo $trips[$trip_index]['guest_name'].br().$trips[$trip_index]['guest_info'];
					    } ?>
					  </td>
						 <td><?php echo $trips[$trip_index]['drop_city'].br();
									echo $trips[$trip_index]['drop_area'];
						 ?></td>
					 <td><?php if($trips[$trip_index]['customer_id']==gINVALID || $trips[$trip_index]['customer_id']==0){echo '';}else{ echo $trips[$trip_index]['customer_name'].br();
					    }
					    if($trips[$trip_index]['customer_group_id']==gINVALID || $trips[$trip_index]['customer_group_id']==0){echo '';}else{ echo $trips[$trip_index]['customer_group'].br();
					    }
					    if($trips[$trip_index]['customer_id']==gINVALID || $trips[$trip_index]['customer_id']==0){echo '';}else{ echo $trips[$trip_index]['customer_mobile'];
					    }
					    ?></td>
					    
					  <td><?php
						if($trips[$trip_index]['driver_id']==gINVALID || $trips[$trip_index]['driver_id']==0){echo 'Driver Not Allocated';}else{ echo $trips[$trip_index]['driver'].br().$trips[$trip_index]['driver_info'];
					    }
						?></td>
					    <td>
							<!--<span class="label --><?php echo $status_class[$trips[$trip_index]['trip_status_id']]; ?>"><?php echo $trip_statuses[$trips[$trip_index]['trip_status_id']];?><!--</span>--> 
						
						</td>	
						
						
					
					</tr>
					<?php 
						$trip_sl_no++;
						}
					?>
				</tbody>
			</table>
		
