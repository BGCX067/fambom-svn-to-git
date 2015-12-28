<!-- File: /app/views/households/view.ctp -->
<h1><?php echo $household['Household']['name']; ?></h1>
<p>All information about a household will be displayed here.  This will include the current list of family members that belong to the household.</p>
<br/>
<ul>
	<li><?php echo $html->link("View all households", '/households/'); ?></li>
	<li><?php echo $html->link("Edit " . $household['Household']['name'], '/households/edit/' . $household['Household']['id']); ?></li>
	<li><?php echo $html->link("Remove " . $household['Household']['name'] . " from the system", '/households/delete/' . $household['Household']['id'], null, 'Are you sure?'); ?></li>
</ul>