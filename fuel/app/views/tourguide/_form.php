<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Name', 'name'); ?>

			<div class="input">
				<?php echo Form::input('name', Input::post('name', isset($tourguide) ? $tourguide->name : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Rank', 'rank'); ?>

			<div class="input">
				<?php echo Form::input('rank', Input::post('rank', isset($tourguide) ? $tourguide->rank : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Max visitors', 'max_visitors'); ?>

			<div class="input">
				<?php echo Form::input('max_visitors', Input::post('max_visitors', isset($tourguide) ? $tourguide->max_visitors : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>