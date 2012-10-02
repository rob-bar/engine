<h2>Listing Species</h2>
<br>
<?php if ($species): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($species as $specie): ?>		<tr>

			<td><?php echo $specie->name; ?></td>
			<td>
				<?php echo Html::anchor('specie/view/'.$specie->id, 'View'); ?> |
				<?php echo Html::anchor('specie/edit/'.$specie->id, 'Edit'); ?> |
				<?php echo Html::anchor('specie/delete/'.$specie->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Species.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('specie/create', 'Add new Specie', array('class' => 'btn btn-success')); ?>

</p>
