<table border="1">
	<tbody>
		<?php for($i = 1; $i <= 9; $i++): ?>
		<tr>
			<?php for($j = 1; $j <= 9; $j++): ?>
				<?php if($i == 1 || $j == 1):?>
					<th align="center"><?php echo $i * $j;?></th>
				<?php else: ?>
					<td align="center"><?php echo $i * $j;?></td>
				<?php endif; ?>
			<?php endfor; ?>
		</tr>	
		<?php endfor; ?>
	</tbody>
</table>