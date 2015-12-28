<!-- File: /app/views/people/index.ctp -->
<h1>Family Members</h1>
<p>All family members are listed in the table here.  An updated version might include a family tree view rather than a table.</p>
<br/>
<ul>
	<li><?php echo $html->link('Add a family member', '/people/add'); ?></li>
</ul>
<br/>
<table style="width:600px;">
	<tr>
		<th>Name</th>
	</tr>
	<?php foreach ($people as $person): ?>
	<tr>
		<td>
			<?php $name = $person['Person']['first_name'] . ' ' . $person['Person']['last_name']; ?>
			<?php echo $html->link($name, '/people/view/' . $person['Person']['id']); ?>
		</td>
		<td>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<?php echo $paginator->numbers(); ?>