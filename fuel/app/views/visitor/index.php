<h2>Listing Visitors</h2>
<br>
<?php if ($visitors): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Tour guide id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($visitors as $visitor): ?>		<tr>

			<td><?php echo $visitor->name; ?></td>
			<td><?php echo $visitor->email; ?></td>
			<td><?php echo $visitor->tour_guide_id; ?></td>
			<td>
				<?php echo Html::anchor('visitor/view/'.$visitor->id, 'View'); ?> |
				<?php echo Html::anchor('visitor/edit/'.$visitor->id, 'Edit'); ?> |
				<?php echo Html::anchor('visitor/delete/'.$visitor->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Visitors.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('visitor/create', 'Add new Visitor', array('class' => 'btn btn-success')); ?>

</p>
