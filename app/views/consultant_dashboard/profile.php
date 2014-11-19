<div class="row" ng-controller="profile" ng-cloak>
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->

		<!-- PAGE CONTENT BEGINS -->
		<div class="page-header">
			<h1>
				<?= trans('general.profile'); ?>
				<small>
					<i class="icon-double-angle-right"></i>
					<?= trans('general.profile_message'); ?>
				</small>
			</h1>
		</div>
		<!-- /.page-header -->

		<div class="hr dotted"></div>

		<div class="">
			<div id="user-profile-2" class="user-profile">
				<div class="tabbable">
					<ul class="nav nav-tabs padding-18">
						<li class="active">
							<a data-toggle="tab" href="#home">
								<i class="green icon-user bigger-120"></i>
								<?= trans('general.profile'); ?>
							</a>
						</li>

						<li class="not-ready">
							<a data-toggle="tab" href="#companies">
								<i class="orange icon-building bigger-120"></i>
								<?= trans('general.companies'); ?>
							</a>
						</li>

						<li class="not-ready">
							<a data-toggle="tab" href="#settings">
								<i class="blue icon-gears bigger-120"></i>
								<?= trans('general.settings'); ?>
							</a>
						</li>

						<li class="not-ready">
							<a data-toggle="tab" href="#privacy">
								<i class="pink icon-eye-open bigger-120"></i>
								<?= trans('general.privacy'); ?>
							</a>
						</li>
					</ul>

					<div class="tab-content no-border padding-24">
						<? include(PARTIALS_DIR . '/dashboard_profile_profile.php'); ?>
						<? include(PARTIALS_DIR . '/dashboard_profile_companies.php'); ?>
						<? include(PARTIALS_DIR . '/dashboard_profile_settings.php'); ?>
						<? include(PARTIALS_DIR . '/dashboard_profile_privacy.php'); ?>
					</div>
				</div>
			</div>
		</div>


		<!-- PAGE CONTENT ENDS -->
	</div>
	<!-- /.col -->
</div><!-- /.row -->

