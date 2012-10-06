<h2>Editing Tourguide</h2>
<br>

<?php echo render('tourguide/_form'); ?>
<p>
	<?php echo Html::anchor('tourguide/view/'.$tourguide->id, 'View'); ?> |
	<?php echo Html::anchor('tourguide', 'Back'); ?></p>
