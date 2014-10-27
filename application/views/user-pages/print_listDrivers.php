<?php
set_time_limit(0);
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=drivers.xls");
header("Cache-Control: cache, must-revalidate");
header("Pragma: public");
?>
	<table class="table table-hover table-bordered">
	<tbody>
		<tr>
		<td class="excel">Name</td>
		<td class="excel">Contact Info</td>
		<td class="excel">Address</td>
		</tr>
		<?php foreach ($values as $val): ?>
		<tr>
		<td><?php echo $val['name']; ?></td>
		<td><?php echo $val['phone'].br().$val['mobile']; ?></td>
		<td><?php echo $val['present_address'].br().$val['district'];?></td>
		</tr>
		<?php endforeach;?>
	</tbody>
	</table>
