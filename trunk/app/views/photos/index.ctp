<style type="text/css">
.thumbnail {
	border: 1px solid black;
	margin: 5px;
	float: left;
	clear: none;
}
</style>
<script type="text/javascript">
$(document).ready(function() {
	$("#PhotoImageFile").change(function() {
		$("#PhotoForm").ajaxSubmit({
			url: "/photos/upload",
			dataType: 'json',
			success: function(responseText) {
				var data = responseText;
				if (data.Photo) {
					$("#thumbnails").prepend(
						"<div class='thumbnail'>" + 
							"<a href='" + data.Photo.original_url  + "'>" + 
								"<img src='" + data.Photo.thumbnail_url + "' />" + 
							"</a>" + 
						"</div>");
				} else {
					alert(data);
				}
			}
		});
	});
});
</script>
<h1>Photos</h1>
<p>Upload your family photos here.</p><br/>
<?=$javascript->link('jquery/jquery.form')?>
<?=$form->create('Photo', array('id' => 'PhotoForm', 'type' => 'file'))?>
<?=$form->input('image_file', array('type' => 'file'))?>
<?=$form->end()?>
<div id="thumbnails">
	<?php foreach ($photos as $photo): ?>
	<div class="thumbnail">
		<a href="<?=$photo['Photo']['original_url']?>"><img src="<?=$photo['Photo']['thumbnail_url']?>" /></a>
	</div>
	<?php endforeach; ?>
</div>
<?php echo $paginator->numbers(); ?>