<h1>Editing photo details</h1>
<?php echo $form->create('Photo'); ?>
<div>
	<input type="submit" value="Cancel" onclick="window.location='/photos/view/<?=$photo['Photo']['id']?>';return false;" />
	<input type="submit" value="Save" />
</div>
<?php echo $form->end(); ?>