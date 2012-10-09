<h2>Viewing #<?php echo $tour->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $tour->name; ?></p>
<p>
	<strong>Tourguide:</strong>
	<?php echo $tour->tourguide->name; ?></p>

<?php echo Html::anchor('tour/edit/'.$tour->id, 'Edit'); ?> |
<?php echo Html::anchor('tour', 'Back'); ?>