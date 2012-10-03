<h2>Viewing #<?php echo $animal->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $animal->name; ?></p>
<p>
	<strong>Kind:</strong>
	<?php echo $animal->kind; ?></p>
<p>
	<strong>Specie:</strong>
	<?php echo $animal->specie->name; ?></p>
<p>
	<strong>Enclosed in:</strong>
	<?php echo $animal->enclosure->name; ?></p>

<?php echo Html::anchor('animal/edit/'.$animal->id, 'Edit'); ?> |
<?php echo Html::anchor('animal', 'Back'); ?>