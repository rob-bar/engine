<h2>Editing Animal</h2>
<br>

<?php echo render('animal/_form'); ?>
<p>
	<?php echo Html::anchor('animal/view/'.$animal->id, 'View'); ?> |
	<?php echo Html::anchor('animal', 'Back'); ?></p>
