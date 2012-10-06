<h2>Viewing #<?php echo $tourguide->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $tourguide->name; ?></p>
<p>
	<strong>Rank:</strong>
	<?php echo $tourguide->rank; ?></p>
<p>
	<strong>Max visitors:</strong>
	<?php echo $tourguide->max_visitors; ?></p>

<?php echo Html::anchor('tourguide/edit/'.$tourguide->id, 'Edit'); ?> |
<?php echo Html::anchor('tourguide', 'Back'); ?>