<h2>Viewing #<?php echo $tour->id; ?></h2>
<style type="text/css">
p{
	margin:10px 0;
}
</style>
<br />
<p>
	<h4>Name:</h4>
	<?php echo $tour->name; ?>
</p>
<br />
<p>
	<h4>Tourguide:</h4>
	<?php echo $tour->tourguide->name; ?>
</p>
<br />
<p>
	<h4>These are the visitors for this tour:</h4>
	<?php foreach ($visitors as $visitor): ?>
		<p> 
			<?php echo($visitor->name);?>
			<strong><?php echo($visitor->email);?></strong>
		</p>
	<?php endforeach; ?>
</p>
<br /><br />
<p>
	<h4>Will visit these enclosures:</h4>
	<?php foreach ($tour->enclosures as $enclosure): ?>
		<p> 
			<?php echo($enclosure->name);?>
			<strong><?php echo($enclosure->size);?>m<sup>2</sup> </strong>
			<small><?php echo($enclosure->extra);?> </small>
			<h6>Animals</h6>
			<table>
				<th>name</th>
				<th>kind</th>
				<th>specie</th>
				<?php foreach ($enclosure->animals as $animal): ?>
					<tr>
						<td><?php echo($animal->name);?></td>
						<td><?php echo($animal->kind);?></td>
						<td><?php echo($animal->specie->name);?></td>
					</tr>
				<?php endforeach; ?>
			</table>
		</p>
	<?php endforeach; ?>
</p>
<br /><br />
<?php echo Html::anchor('tour/edit/'.$tour->id, 'Edit'); ?> |
<?php echo Html::anchor('tour', 'Back'); ?>