<?php
/*set_time_limit(0);
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=tariff_masters.xls");
header("Cache-Control: cache, must-revalidate");
header("Pragma: public");*/
?>
			<table class="table table-hover table-bordered">
				<tbody>
					<tr>
						<th>Type</th>
						<?php for ($i=1;$i<count($vehicle_models);$i++){?>
						<th colspan="2"><?php echo $vehicle_models[$i] ; ?></th>
						<?php } ?>
					</tr>
					<tr>
						<th> </th>
						<?php for ($i=1;$i<count($vehicle_models);$i++){?>
						<td> AC</td>
						<td> Non-AC</td>
						<?php } ?>
				</tr>
				<?php foreach($tariffs as $key_tariff):// print_r($key_tariff);exit;  ?> 
					<tr>
					
					<td><?php echo $key_tariff['title'] ; ?></td>
								<?php /*foreach ($vehicle_models as $key_model): //print_r($key_model);exit;
								$rt= $key_tariff[1][$key_tariff['model']]['rate'] ;
								$min= $key_tariff[1][$key_tariff['model']]['minimum_kilometers'] ;
								$rate=$rt*$min;  
								
								
									
					
					endforeach;*/
					?>
					</tr><?php endforeach;?>
				</tbody>
			</table>