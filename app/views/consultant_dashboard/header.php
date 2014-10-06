<!DOCTYPE html>
<html lang="en" ng-app="dsk">
<head>
	<meta charset="utf-8"/>
	<title><?= isset($title) ? $title : SITE_TITLE ?></title>
	<meta name="description"
	      content="<?= isset($description) ? $description : SITE_DESCRIPTION ?>">
	<meta name="keywords"
	      content="<?= isset($keywords) ? $keywords : SITE_KEYWORDS ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<!-- basic styles -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= CSS_DIR; ?>/style.css" media="all">

	<!-- fonts -->
	<link rel="stylesheet" href="<?= CSS_DIR; ?>/ace/font-awesome.min.css"/>

	<!--[if IE 7]>
	<link rel="stylesheet" href="<?= CSS_DIR; ?>/ace/font-awesome-ie7.min.css"/>
	<![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Poiret+One|Dosis:200' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?= CSS_DIR; ?>/ace/ace-fonts.css"/>

	<script src="<?= JS_LIB_DIR; ?>/angular.js"></script>
	<script src="<?= JS_LIB_DIR; ?>/angular-sanitize.js"></script>
	<script src="<?= JS_LIB_DIR; ?>/ui-bootstrap-tpls-0.7.0.min.js"></script>
	<script src="<?= JS_DIR . JS_APP_DIR; ?>/app.js"></script>
	<script src="<?= JS_DIR . JS_CONTROLLER_DIR; ?>/consultant_dashboard/mainController.js"></script>

	<!-- page specific plugin styles -->
	<?php
		//load dynamic controller defined files here - css
		//todo: change from isset to prop exists
		if (isset($files->css)) {
			foreach ($files->css as $value) {
				$css_file = CSS_DIR . $value;
				echo "<link rel='stylesheet'  href='{$css_file}' media='all'>";
			}
		}
	?>

	<!-- ace styles -->
	<link rel="stylesheet" href="<?= CSS_DIR; ?>/ace/ace.min.css"/>
	<link rel="stylesheet" href="<?= CSS_DIR; ?>/ace/ace-rtl.min.css"/>
	<link rel="stylesheet" href="<?= CSS_DIR; ?>/ace/ace-skins.min.css"/>

	<!--[if lte IE 8]>
	<link rel="stylesheet" href="<?= CSS_DIR; ?>/ace/ace-ie.min.css"/>
	<![endif]-->

	<!-- ace settings handler -->
	<?php if (App::environment('local')): ?>
		<script src="<?= JS_DIR; ?>/ace/ace-extra.min.js"></script>
	<?php else : ?>
		<script src="<?= JS_DIR; ?>/ace/ace-extra.js"></script>
	<?php endif ; ?>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

	<!--[if lt IE 9]>
	<script src=<?= JS_DIR; ?>"/ace/html5shiv.js"></script>
	<script src=<?= JS_DIR; ?>"/ace/respond.min.js"></script>
	<![endif]-->
</head>

<body ng-controller="main">
	<?php require_once PARTIALS_DIR . "/dashboard_nav.php"; ?>

	<div class="main-container" id="main-container">
		<script type="text/javascript">
			try {
				ace.settings.check('main-container', 'fixed')
			} catch (e) {
			}
		</script>

		<div class="main-container-inner">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<?php require_once PARTIALS_DIR . "/dashboard_sidebar.php"; ?>

			<div class="main-content">
<!--				<div class="breadcrumbs" id="breadcrumbs">-->
<!--					<script type="text/javascript">-->
<!--						try {-->
<!--							ace.settings.check('breadcrumbs', 'fixed')-->
<!--						} catch (e) {-->
<!--						}-->
<!--					</script>-->
<!---->
<!--					<ul class="breadcrumb">-->
<!--						<li>-->
<!--							<i class="icon-home home-icon"></i>-->
<!--							<a href="#">Home</a>-->
<!--						</li>-->
<!---->
<!--						<li>-->
<!--							<a href="#">Other Pages</a>-->
<!--						</li>-->
<!--						<li class="active">Blank Page</li>-->
<!--					</ul>-->
					<!-- .breadcrumb -->
<!---->
<!--					<div class="nav-search" id="nav-search">-->
<!--						<form class="form-search">-->
<!--							<span class="input-icon">-->
<!--								<input type="text" placeholder="Search ..." class="nav-search-input"-->
<!--								       id="nav-search-input" autocomplete="off"/>-->
<!--								<i class="icon-search nav-search-icon"></i>-->
<!--							</span>-->
<!--						</form>-->
<!--					</div>-->
					<!-- #nav-search -->
<!--				</div>-->

				<div class="page-content">
