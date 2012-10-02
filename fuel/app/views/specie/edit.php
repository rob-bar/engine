<h2>Editing Specie</h2>
<br>

<?php echo render('specie/_form'); ?>
<p>
	<?php echo Html::anchor('specie/view/'.$specie->id, 'View'); ?> |
	<?php echo Html::anchor('specie', 'Back'); ?></p>
