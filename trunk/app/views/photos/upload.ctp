<? if (!empty($error)): ?>
	<?=$javascript->value($error)?>
<? else: ?>
	<?=$javascript->value($data)?>
<? endif; ?>