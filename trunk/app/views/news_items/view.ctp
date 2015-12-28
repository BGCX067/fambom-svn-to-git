<h1><?=$news_item['NewsItem']['title']?></h1>
<p>Display the date here.</p>
<br/>
<ul>
	<li><?php echo $html->link("View all news items", '/news_items/'); ?></li>
	<li><?php echo $html->link("Edit this news item", '/news_items/edit/' . $news_item['NewsItem']['id']); ?></li>
	<li><?php echo $html->link("Delete this news item", '/news_items/delete/' . $news_item['NewsItem']['id'], null, 'Are you sure?'); ?></li>
</ul>
<br/>
<?=$news_item['NewsItem']['body']?>