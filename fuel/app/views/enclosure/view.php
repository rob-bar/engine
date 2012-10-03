<h2>Viewing #<?php echo $enclosure->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $enclosure->name; ?></p>
<p>
	<strong>Size:</strong>
	<?php echo $enclosure->size; ?></p>
<p>
	<strong>Extra:</strong>
	<?php echo $enclosure->extra; ?></p>

<?php echo Html::anchor('enclosure/edit/'.$enclosure->id, 'Edit'); ?> |
<?php echo Html::anchor('enclosure', 'Back'); ?>