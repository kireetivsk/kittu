<!DOCTYPE HTML>
<html ng-app="dsk">
<head>
	<title><?= isset($title) ? $title : SITE_TITLE ?></title>
	<meta name="description"
		  content="<?= isset($description) ? $description : SITE_DESCRIPTION ?>">
	<meta name="keywords"
		  content="<?= isset($keywords) ? $keywords : SITE_KEYWORDS ?>">

	<link href='http://fonts.googleapis.com/css?family=Poiret+One|Dosis:200' rel='stylesheet' type='text/css'>

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= CSS_DIR; ?>/style.css" media="all">

	<script src="<?= JS_LIB_DIR; ?>/angular.js"></script>
	<script src="<?= JS_LIB_DIR; ?>/angular-sanitize.js"></script>
	<script src="<?= JS_LIB_DIR; ?>/ui-bootstrap-tpls-0.7.0.min.js"></script>
	<script src="<?= JS_DIR . JS_APP_DIR; ?>/app.js"></script>
	<script src="<?= JS_DIR . JS_CONTROLLER_DIR; ?>/public/headerController.js"></script>
	<script src="<?= JS_DIR . JS_CONTROLLER_DIR; ?>/public/footerController.js"></script>
	<?php
		//load dynamic controller defined files here - javascript, css, etc
		//todo: change from isset to prop exists
		if (isset($files->js)) {
			foreach ($files->js as $value) {
				$js_file = JS_DIR . $value;
				?>
				<script src='<?= $js_file; ?>'></script>
			<?php
			}
		}
		//todo: change from isset to prop exists
		if (isset($files->css)) {
			foreach ($files->css as $value) {
				$css_file = CSS_DIR . $value;
				echo "<link rel='stylesheet'  href='{$css_file}' media='all'>";
			}
		}
	?>

</head>