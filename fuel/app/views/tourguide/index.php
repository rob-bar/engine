<h2>Listing Tourguides</h2>
<br>
<?php if ($tourguides): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Rank</th>
			<th>Max visitors</th>
			<th>Visitors in group</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($tourguides as $tourguide): ?>		<tr>

			<td><?php echo $tourguide->name; ?></td>
			<td><?php echo $tourguide->rank; ?></td>
			<td><?php echo $tourguide->max_visitors; ?></td>
			<td>
				<?php foreach ($tourguide->visitors as $visitor): ?>
					<?php echo($visitor->name);?>, 
				<?php endforeach; ?>
			</td>
			<td>
				<?php echo Html::anchor('tourguide/view/'.$tourguide->id, 'View'); ?> |
				<?php echo Html::anchor('tourguide/edit/'.$tourguide->id, 'Edit'); ?> |
				<?php echo Html::anchor('tourguide/delete/'.$tourguide->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Tourguides.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('tourguide/create', 'Add new Tourguide', array('class' => 'btn btn-success')); ?>

</p>
