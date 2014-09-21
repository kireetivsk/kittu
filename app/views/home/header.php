	<body>
		<div id="header" ng-controller="header">
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
        <div class="bg-lblue">
		    <div id="main_container" class="container"><!-- closes in the footer file -->
	<?php


/* End of file header.php */
/* Location: ./application/views/templates/header.php */