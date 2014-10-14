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

						<li>
							<a data-toggle="tab" href="#companies">
								<i class="orange icon-building bigger-120"></i>
								<?= trans('general.companies'); ?>
							</a>
						</li>

						<li>
							<a data-toggle="tab" href="#settings">
								<i class="blue icon-gears bigger-120"></i>
								<?= trans('general.settings'); ?>
							</a>
						</li>

						<li>
							<a data-toggle="tab" href="#privacy">
								<i class="pink icon-eye-open bigger-120"></i>
								<?= trans('general.privacy'); ?>
							</a>
						</li>
					</ul>

					<div class="tab-content no-border padding-24">
						<div id="home" class="tab-pane in active">
							<div class="row">
								<div class="col-xs-12 col-sm-3 center">
									<span class="profile-picture">
										<img class="img-responsive" alt="Avatar" id="avatar2"
											 src="{{consultant_profile.profile.avatar}}" />
									</span>
								</div>
								<!-- /span -->

								<div class="col-xs-12 col-sm-9">
									<h4 class="blue">
										<span class="middle">Alex M. Doe</span>

										<span class="label label-purple arrowed-in-right">
											<i class="icon-circle smaller-80 align-middle"></i>
											online
										</span>
									</h4>

									<div class="profile-user-info">
										<div class="profile-info-row">
											<div class="profile-info-name"> Username</div>

											<div class="profile-info-value">
												<span>alexdoe</span>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> Location</div>

											<div class="profile-info-value">
												<i class="icon-map-marker light-orange bigger-110"></i>
												<span>Netherlands</span>
												<span>Amsterdam</span>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> Age</div>

											<div class="profile-info-value">
												<span>38</span>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> Joined</div>

											<div class="profile-info-value">
												<span>20/06/2010</span>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> Last Online</div>

											<div class="profile-info-value">
												<span>3 hours ago</span>
											</div>
										</div>
									</div>

									<div class="hr hr-8 dotted"></div>

									<div class="profile-user-info">
										<div class="profile-info-row">
											<div class="profile-info-name"> Website</div>

											<div class="profile-info-value">
												<a href="#" target="_blank">www.alexdoe.com</a>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name">
												<i class="middle icon-facebook-sign bigger-150 blue"></i>
											</div>

											<div class="profile-info-value">
												<a href="#">Find me on Facebook</a>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name">
												<i class="middle icon-twitter-sign bigger-150 light-blue"></i>
											</div>

											<div class="profile-info-value">
												<a href="#">Follow me on Twitter</a>
											</div>
										</div>
									</div>
								</div>
								<!-- /span -->
							</div>
							<!-- /row-fluid -->

						</div>
						<!-- #home -->

						<div id="companies" class="tab-pane">
							comapnies

						</div>
						<!-- /#feed -->

						<div id="settings" class="tab-pane">
							settings
						</div>
						<!-- /#friends -->

						<div id="privacy" class="tab-pane">
							privacy

						</div>
						<!-- /#pictures -->
					</div>
				</div>
			</div>
		</div>


		<!-- PAGE CONTENT ENDS -->
	</div>
	<!-- /.col -->
</div><!-- /.row -->

