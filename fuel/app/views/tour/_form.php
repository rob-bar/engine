<script src="//code.jquery.com/jquery-1.8.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var enclosure_count = 1;
	$('.add').live('click',function(){
		enclosure_count++;
		if(enclosure_count <= ($('#firstenclosure select').children().size() - 2)){
			var clone = $('#firstenclosure').clone();
			clone.attr('id','');
			clone.find('select').attr('id',function(index, attr){return attr.substr(0, attr.length - 1) + enclosure_count});
			clone.appendTo('.enclosures');
		}
	});
});
</script>
<?php echo Form::open(); ?>
	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Name', 'name'); ?>

			<div class="input">
				<?php echo Form::input('name', Input::post('name', isset($tour) ? $tour->name : ''), array('class' => 'span4')); ?>
			</div>
		</div>
		
		<div class="clearfix">
			<?php echo Form::label('Tourguide', 'tour_guide_id'); ?>
			<?php echo Form::select('tour_guide_id', isset($tour) ? $tour->tour_guide_id : 'none', $select_tourguide);?>
		</div>
		
		<div class="clearfix enclosures">
			<?php echo Form::label('Enclosures', 'enclosure'); ?>
			<div class="enclosure" id="firstenclosure">
				<?php echo Form::select('enclosure[]', isset($tour) ? $enclosures->name : 'none', $select_enclosure);?>
				<?php echo Html::anchor('#', 'Add Enclosure', array('class' => 'add'));?>
			</div>
		</div>
		
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
		</div>
	</fieldset>
<?php echo Form::close(); ?>