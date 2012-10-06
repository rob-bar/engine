<h2>Viewing #<?php echo $visitor->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $visitor->name; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $visitor->email; ?></p>
<p>
	<strong>Tour guide id:</strong>
	<?php echo $visitor->tour_guide_id; ?></p>

<?php echo Html::anchor('visitor/edit/'.$visitor->id, 'Edit'); ?> |
<?php echo Html::anchor('visitor', 'Back'); ?>