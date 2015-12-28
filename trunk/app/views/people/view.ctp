<!-- File: /app/views/people/view.ctp -->
<h1><?php echo join(" ", array($person['Person']['first_name'], $person['Person']['middle_name'], $person['Person']['last_name'])) ?></h1>
<p>All information about to a family member will be displayed here.</p>
<br/>
<ul>
	<li><?php echo $html->link("View all family members", '/people/'); ?></li>
	<li><?php echo $html->link("Edit " . $person['Person']['first_name'] . "'s information", '/people/edit/' . $person['Person']['id']); ?></li>
	<li><?php echo $html->link("Remove " . $person['Person']['first_name'] . " from the system", '/people/delete/' . $person['Person']['id'], null, 'Are you sure?'); ?></li>
</ul>
<br/>
<p>Personal Information</p>
<br/>
<div>
	<span class="label">Sex:</span>
	<span><?php echo $person['Person']['sex'] == "M" ? "Male" : "Female"; ?></span>
</div>
<?php if ($father) { ?>
<div>
	<span class="label">Father:</span>
	<span><?php echo $html->link($father['Person']['first_name'] . ' ' . $father['Person']['last_name'], '/people/view/' . $father['Person']['id']); ?></span>
</div>
<?php } ?>
<?php if ($mother) { ?>
<div>
	<span class="label">Mother:</span>
	<span><?php echo $html->link($mother['Person']['first_name'] . ' ' . $mother['Person']['last_name'], '/people/view/' . $mother['Person']['id']); ?></span>
</div>
<?php } ?>
<?php if ($spouse) { ?>
<div>
	<span class="label">Spouse:</span>
	<span><?php echo $html->link($spouse['Person']['first_name'] . ' ' . $spouse['Person']['last_name'], '/people/view/' . $spouse['Person']['id']); ?></span>
</div>
<?php } ?>