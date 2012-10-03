<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>FuelPHP Framework</title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<style type="text/css">
	.extra {
		margin: 40px 0 20px -20px;
	}
	</style>
</head>
<body>
	<div id="header">
		<div class="row">
			<div id="logo"></div>
		</div>
	</div>
	<div class="container">
		<div class="hero-unit">
			<h1>Welcome to the Zoo demo!</h1>
			<p>Where all animals live in happyness</p>
		</div>
		<div class="row extra">
			<div class="span4">
				<h2>Animals</h2>
				<?php echo Html::anchor('animal', 'View animals', array('id' => 'a1', 'class' => 'btn btn-primary btn-large'));?>
			</div>
			<div class="span4">
				<h2>Species</h2>
				<?php echo Html::anchor('specie', 'View species', array('id' => 'a1', 'class' => 'btn btn-primary btn-large'));?>
			</div>
			<div class="span4">
				<h2>Enclosures</h2>
				<?php echo Html::anchor('enclosure', 'View enclosures', array('id' => 'a1', 'class' => 'btn btn-primary btn-large'));?>
			</div>

		</div>
		<div class="row extra">
			<div class="span4">
				<h2>Enclosures</h2>
				<?php echo Html::anchor('enclosure', 'View enclosures', array('id' => 'a1', 'class' => 'btn btn-primary btn-large'));?>
			</div>
			<div class="span4">
				<h2>Enclosures</h2>
				<?php echo Html::anchor('enclosure', 'View enclosures', array('id' => 'a1', 'class' => 'btn btn-primary btn-large'));?>
			</div>
			<div class="span4">
				<h2>Enclosures</h2>
				<?php echo Html::anchor('enclosure', 'View enclosures', array('id' => 'a1', 'class' => 'btn btn-primary btn-large'));?>
			</div>
		</div>
		<hr/>
		<footer>
			<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
				<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
				<small>Version: <?php echo e(Fuel::VERSION); ?></small>
			</p>
		</footer>
	</div>
</body>
</html>
