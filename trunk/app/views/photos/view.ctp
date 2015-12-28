<p>All sizes rendered for each photo will appear here.</p>
<br/>
<ul>
	<li><?php echo $html->link("View all photos", '/photos/'); ?></li>
	<li><?php echo $html->link("Edit photo", '/photos/edit/' . $photo['Photo']['id']); ?></li>
	<li><?php echo $html->link("Remove photo from the system", '/photos/delete/' . $photo['Photo']['id'], null, 'Are you sure?'); ?></li>
</ul>