<div class="row" ng-controller="discussion" ng-cloak>
	<div class="page-header">
		<h1>
			Discussion
			<small>
				<i class="icon-double-angle-right"></i>
				interact with your team
			</small>
		</h1>
	</div><!-- /.page-header -->

	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="row">
			<div class="col-xs-12">
				<div class="row">
					<div class="col-xs-12">
						<div class="tabbable">
							<? include(PARTIALS_DIR . '/dashboard_discussion_tabs.php'); ?>
							<? include(PARTIALS_DIR . '/dashboard_discussion_view.php'); ?>
							<? include(PARTIALS_DIR . '/dashboard_discussion_manage.php'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
