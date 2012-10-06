<h2>Editing Visitor</h2>
<br>

<?php echo render('visitor/_form'); ?>
<p>
	<?php echo Html::anchor('visitor/view/'.$visitor->id, 'View'); ?> |
	<?php echo Html::anchor('visitor', 'Back'); ?></p>
