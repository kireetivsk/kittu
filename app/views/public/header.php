<body>
<div ng-controller="header">
	<div id="header">
		<div class="row-fluid text-center">
			<!-- logo and nav bar go here -->
			<div class="col-sm-4">
				<div id="logo" ng-click="link('/')">
					<span class="brown">Direct</span><span class="orange">Sales</span><span class="brown">Kit.com</span>
				</div>
			</div>
			<div class="col-sm-2">
				&nbsp;
			</div>
			<div class="col-sm-6">
				<?php include(PARTIALS_DIR . '/login_form_header.php'); ?>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">Home</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li ng-class="isActive('features')">
						<a href="/features">Features</a>
					</li>
					<li ng-class="isActive('plans')">
						<a href="/plans">Plans</a>
					</li>
					<li ng-class="isActive('about')">
						<a href="/about">About</a>
					</li>
					<li ng-class="isActive('support')">
						<a href="/support">Support</a>
					</li>
				</ul>
				<form class="navbar-form navbar-right hide" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
</div>
<div class="bg-lblue">
	<div id="main_container" class="container"><!-- closes in the footer file -->
<?php
	/* End of file header.php */
	/* Location: ./application/views/templates/header.php */