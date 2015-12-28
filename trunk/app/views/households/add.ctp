<h1>Add a household</h1>
<?=$form->create('Household')?>
<?=$form->input('name')?>
<div>
	<input type="submit" value="Cancel" onclick="window.location='/households/';return false;" />
	<input type="submit" value="Save" />
</div>
<?=$form->end()?>