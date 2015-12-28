<ul style="margin-left:0px;">
	<?php foreach ($people as $person): ?>
	<li style="margin-left:0px;margin-top:5px;">
		<span style="color:#000;"><?=$name = $person['Person']['first_name'] . ' ' . $person['Person']['last_name']?></span>
		<?=$html->link('[select]', "javascript:selectLookupResult('" . $person['Person']['id'] . "','$name')")?>
	</li>
	<?php endforeach; ?>
</ul>