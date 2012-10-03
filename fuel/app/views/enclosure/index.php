<h2>Listing Enclosures</h2>
<br>
<?php if ($enclosures): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Size</th>
			<th>Residents</th>
			<th>Animals</th>
			<th>Extra</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($enclosures as $enclosure): ?>		<tr>

			<td><?php echo $enclosure->name; ?></td>
			<td><?php echo $enclosure->size; ?></td>
			<td> <?php echo(count($enclosure->animals));?> </td>
			<td>
				<?php foreach ($enclosure->animals as $animal): ?>
					<?php echo($animal->name);?>, 
				<?php endforeach; ?>
			</td>
			<td><?php echo $enclosure->extra; ?></td>
			<td>
				<?php echo Html::anchor('enclosure/view/'.$enclosure->id, 'View'); ?> |
				<?php echo Html::anchor('enclosure/edit/'.$enclosure->id, 'Edit'); ?> |
				<?php echo Html::anchor('enclosure/delete/'.$enclosure->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Enclosures.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('enclosure/create', 'Add new Enclosure', array('class' => 'btn btn-success')); ?>

</p>
