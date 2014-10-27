<div class="page-outer">    
	<fieldset class="body-border">
		<legend class="body-head">Driver List</legend>
		
		<table>
		<tr>
		<td>Name</td>
		<td>Contact Info</td>
		<td>Address</td>
		</tr>
		<?php foreach ($values as $val): ?>
		<tr>
		<td><?php echo $val['']; ?></td>
		<td><?php echo $val['']; ?></td>
		<td><?php echo $val[''];?></td>
		</tr>
		<?php endforeach;?>
		</table>
		
	</fieldset>
</div>