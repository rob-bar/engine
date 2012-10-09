<h2>Listing Tours</h2>
<br>
<?php if ($tours): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Tourguide</th>
			<th>#visitors in tour</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($tours as $tour): ?>		<tr>

			<td><?php echo $tour->name; ?></td>
			<td><?php echo $tour->tourguide->name; ?></td>
			<td><?php echo $tour->count; ?></td>
			<td>
				<?php echo Html::anchor('tour/view/'.$tour->id, 'View'); ?> |
				<?php echo Html::anchor('tour/delete/'.$tour->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Tours.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('tour/create', 'Add new Tour', array('class' => 'btn btn-success')); ?>

</p>
