<h1>Editing news item</h1>
<?=$form->create('NewsItem')?>
<?=$form->input('title')?>
<script type="text/javascript" src="/js/jquery/jquery.rte.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".rte-zone").rte("/css/rte.css", "/img/");
});
</script>
<textarea name="data[NewsItem][body]" class="rte-zone" ols="30" rows="12" id="NewsItemBody"><?=$news_item['NewsItem']['body']?></textarea>
<div>
	<input type="submit" value="Cancel" onclick="window.location='/news_items/view/<?=$news_item['NewsItem']['id']?>';return false;" />
	<input type="submit" value="Save" />
</div>
<?=$form->end()?>