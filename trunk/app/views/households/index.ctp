<!-- File: /app/views/household/index.ctp -->
<h1>Households</h1>
<p>A household is a means for organizing family units in the system.  Each family member can belong to only one household at a time.</p>
<br/>
<ul>
	<li><?php echo $html->link('Add a household', '/households/add'); ?></li>
</ul>
<br/>
<table style="width:600px;">
	<tr>
		<th>Name</th>
	</tr>
	<?php foreach ($households as $household): ?>
	<tr>
		<td>
			<?php $name = $household['Household']['name']; ?>
			<?php echo $html->link($name, '/households/view/' . $household['Household']['id']); ?>
		</td>
		<td>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<?php echo $paginator->numbers(); ?>