<h2>Listing Animals</h2>
<br>
<?php if ($animals): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Kind</th>
			<th>Specie</th>
			<th>Enclosure</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($animals as $animal): ?>		<tr>

			<td><?php echo $animal->name; ?></td>
			<td><?php echo $animal->kind; ?></td>
			<td><?php echo $animal->specie->name; ?></td>
			<td><?php echo $animal->enclosure->name; ?></td>
			<td>
				<?php echo Html::anchor('animal/view/'.$animal->id, 'View'); ?> |
				<?php echo Html::anchor('animal/edit/'.$animal->id, 'Edit'); ?> |
				<?php echo Html::anchor('animal/delete/'.$animal->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Animals.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('animal/create', 'Add new Animal', array('class' => 'btn btn-success')); ?>

</p>
