<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Name', 'name'); ?>

			<div class="input">
				<?php echo Form::input('name', Input::post('name', isset($animal) ? $animal->name : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Kind', 'kind'); ?>

			<div class="input">
				<?php echo Form::input('kind', Input::post('kind', isset($animal) ? $animal->kind : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Specie', 'specie_id'); ?>
			<?php echo Form::select('specie_id', isset($animal) ? $animal->specie_id : 'none', $species);?>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Enclosure', 'enclosure_id'); ?>
			<?php echo Form::select('enclosure_id', isset($animal) ? $animal->enclosure_id : 'none', $enclosures);?>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>