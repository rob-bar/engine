<!doctype html>
<html class="no-js" lang="<?= Config::get('language'); ?>">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="description" content="ProximityBBDO" />
		<meta name="author" content="ProximityBBDO" />
		<meta name="e" content="<?= substr(Fuel::$env, 0, 1); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<title><?= __('title'); ?></title>

		<link rel="shortcut icon" href="<?= Asset::get_file('favicon.png', 'img', 'icon/'); ?>" />
		<link rel="apple-touch-icon" href="<?= Asset::get_file('apple-touch-icon.png', 'img', 'icon/'); ?>" />
		<?= Asset::css('style.css'); ?>
	</head>
	<body data-page="<?= Uri::last(); ?>">

		<?= $content; ?>

		<?= Asset::js(array(
			'vendor/zepto.js',
			'base.js'
		)); ?>

		<script>
			var _gaq = [['_setAccount','<?= Config::get('ga_code'); ?>'], ['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>
	</body>
</html>
