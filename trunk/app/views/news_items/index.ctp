<h1>News Items</h1>
<p>News items can be associated with family members and households.</p>
<br/>
<ul>
	<li><?php echo $html->link('Post a news item', '/news_items/add'); ?></li>
</ul>
<br/>
<?php foreach ($news_items as $news_item): ?>
	<h1><?=$html->link($news_item['NewsItem']['title'], '/news_items/view/' . $news_item['NewsItem']['id'])?></h1>
	<?=$news_item['NewsItem']['body']?>
	<br/>
<?php endforeach; ?>
<?php echo $paginator->numbers(); ?>