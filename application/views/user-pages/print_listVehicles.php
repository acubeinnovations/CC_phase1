<div class="page-outer">    
	<fieldset class="body-border">
		<legend class="body-head">Vehicle List</legend>
		
		<table>
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
		</table>
		
	</fieldset>
</div>