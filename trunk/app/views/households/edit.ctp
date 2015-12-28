<!-- File: /app/views/households/edit.ctp -->
<h1>Editing household information</h1>
<?php echo $form->create('Household'); ?>
<?php echo $form->input('name'); ?>
<div>
	<input type="submit" value="Cancel" onclick="window.location='/households/view/<?=$household['Household']['id']?>';return false;" />
	<input type="submit" value="Save" />
</div>
<?php echo $form->end(); ?>