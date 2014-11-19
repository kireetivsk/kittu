<div class="container-fluid" ng-controller="discussion" ng-cloak>
	<div class="page-header">
		<h1>
			<?=trans('general.discussion');?>
			<small>
				<i class="icon-double-angle-right"></i>
				<?=trans('general.discussion_tag_line');?>
			</small>
		</h1>
	</div><!-- /.page-header -->

	<div class="row">
		<!-- PAGE CONTENT BEGINS -->
		<div class="col-xs-12">
			<div class="row">
				<div class="col-xs-12">
					<div class="tabbable">
						<? include(PARTIALS_DIR . '/dashboard_discussion_tabs.php'); ?>
						<div ng-hide="view_categories !== undefined">
							<div class="row">
								<div class="col-xs-8 col-xs-push-2">
									<p class="text-center"><?= trans('general.loading_discussions'); ?></p>

									<div id="progressbar"
										 class="ui-progressbar ui-widget ui-widget-content ui-corner-all progress progress-striped active"
										 role="progressbar" aria-valuemin="0" aria-valuemax="100"
										 aria-valuenow="37">
										<div
											class="ui-progressbar-value ui-widget-header ui-corner-left progress-bar progress-bar-success"
											style="width: 100%;"></div>
									</div>
								</div>
							</div>
						</div>
						<? include(PARTIALS_DIR . '/dashboard_discussion_view.php'); ?>
						<? include(PARTIALS_DIR . '/dashboard_discussion_manage.php'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
