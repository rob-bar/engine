<h2>Editing Enclosure</h2>
<br>

<?php echo render('enclosure/_form'); ?>
<p>
	<?php echo Html::anchor('enclosure/view/'.$enclosure->id, 'View'); ?> |
	<?php echo Html::anchor('enclosure', 'Back'); ?></p>
