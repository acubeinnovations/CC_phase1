<?php
set_time_limit(0);
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=trips.xls");
header("Cache-Control: cache, must-revalidate");
header("Pragma: public");
?>
	<table class="table table-hover table-bordered">
	<tbody>
		<tr>
		<td>Registration Number</td>
		<td>Model/Made</td>
		<td>Owner Info</td>
		</tr>
		<?php foreach ($values as $val): ?>
		<tr>
		<td><?php echo $val['']; ?></td>
		<td><?php echo $val[''];?></td>
		<td><?php echo $val[''];?></td>
		</tr>
		<?php endforeach;?>
	</tbody>
	</table>
