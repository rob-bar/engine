<h2>Viewing #<?php echo $specie->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $specie->name; ?></p>

<?php echo Html::anchor('specie/edit/'.$specie->id, 'Edit'); ?> |
<?php echo Html::anchor('specie', 'Back'); ?>