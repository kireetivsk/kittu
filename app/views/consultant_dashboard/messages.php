<div class="row" ng-controller="messages" ng-cloak>
	<div class="page-content">
		<div class="page-header">
			<h1>
				<?= trans('general.messages'); ?>
				<small>
					<i class="icon-double-angle-right"></i>
					<?= trans('general.message_your_team'); ?>
				</small>
			</h1>
		</div>
		<!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->

				<div class="row">
					<div class="col-xs-12">
						<div class="tabbable">
							<? include(PARTIALS_DIR . '/dashboard_messages_inbox_tabs.php'); ?>
							<? include(PARTIALS_DIR . '/dashboard_messages_send.php'); ?>
							<? include(PARTIALS_DIR . '/dashboard_messages_inbox.php'); ?>
							<? include(PARTIALS_DIR . '/dashboard_messages_sent.php'); ?>
							<? include(PARTIALS_DIR . '/dashboard_messages_deleted.php'); ?>
							<!-- /.tab-content -->
						</div>
						<!-- /.tabbable -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
				<!-- PAGE CONTENT ENDS -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</div>

	<!--[if IE]>
	<script type="text/javascript">
		window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>" + "<" + "/script>");
	</script>
	<![endif]-->
</div>
