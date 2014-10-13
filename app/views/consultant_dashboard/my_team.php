<div class="row" ng-controller="myTeam" ng-cloak>
	<div class="col-sm-12">
		<!-- PAGE CONTENT BEGINS -->

		<!-- Sponsor-->
		<div class="row" ng-show="sponsor">
			<div class="col-xs-12 widget-container-span">
				<div class="widget-box">
					<div class="widget-header header-color-blue2">
						<h5><?= trans('general.sponsor'); ?></h5>

						<div class="widget-toolbar">
							<a href="#" data-action="reload">
								<i class="icon-refresh"></i>
							</a>
							<a href="#" data-action="collapse">
								<i class="icon-chevron-up"></i>
							</a>
						</div>
					</div>

					<div class="widget-body">
						<div class="widget-main">
							<div class="row" ng-repeat="person in sponsor">
								<div id="sponsor_{{person.id}}" class="accordion-style1 panel-group col-md-8">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a class="accordion-toggle collapsed" data-toggle="collapse"
												   data-parent="#sponsor_{{person.id}}"
												   href="#sponsor_{{person.id}}_collapse">
													<i class="icon-angle-right bigger-110"
													   data-icon-hide="icon-angle-down"
													   data-icon-show="icon-angle-right"></i>
													&nbsp;{{person.connection_user.first_name + " " +	person.connection_user.last_name}}
												</a>
											</h4>
										</div>

										<div class="panel-collapse collapse" id="sponsor_{{person.id}}_collapse">
											<div class="panel-body">
												<p class="alert alert-info">
													<strong>
														<i class="icon-comments-alt"></i>
													</strong>
													<span class="text-warning">Text goes here</span>
												</p>
											</div>
										</div>
									</div>
									<div
										class="alert {{person.alert.type}}"
										role="alert"
										ng-show="person.alert">
										{{person.alert.message}}
									</div>

								</div>
								<div class="col-md-4 panel-group">
									<div class="row">
										<div class="col-xs-12">
											<button class="btn btn-primary"
												ng-click="option1(person.id, $index)">
												<i class="icon-envelope align-top bigger-125"></i>
												Message
											</button>
											<button class="btn btn-info"
													ng-click="option1(person.id, $index)">
												<i class="icon-share-alt align-top bigger-125"></i>
												Visit
											</button>
										</div>
									</div>
								</div>
							</div>
							<div ng-show="!sponsor" class="text-center">
								<button class="btn btn-success" ng-click="addSponsor"><?= trans('general.no_sponsor'); ?></button>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- /row -->

		<!--Upline-->
		<div class="row" ng-show="upline">
			<div class="col-xs-12 widget-container-span">
				<div class="widget-box">
					<div class="widget-header header-color-green3">
						<h5><?= trans('general.upline'); ?></h5>

						<div class="widget-toolbar">
							<a href="#" data-action="reload">
								<i class="icon-refresh"></i>
							</a>
							<a href="#" data-action="collapse">
								<i class="icon-chevron-up"></i>
							</a>
						</div>
					</div>

					<div class="widget-body">
						<div class="widget-main">
							<div class="row" ng-repeat="person in upline">
								<div id="upline_{{person.id}}" class="accordion-style1 panel-group col-md-8">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a class="accordion-toggle" data-toggle="collapse"
												   data-parent="#upline_{{person.id}}"
												   href="#upline_{{person.id}}_collapse">
													<i class="icon-angle-right bigger-110"
													   data-icon-hide="icon-angle-down"
													   data-icon-show="icon-angle-right"></i>
													&nbsp;{{person.connection_user.first_name + " " + person.connection_user.last_name}}
													{{person.meta_connection_relationship.name}}
												</a>
											</h4>
										</div>

										<div class="panel-collapse collapse" id="upline_{{person.id}}_collapse">
											<div class="panel-body">
												<p class="alert alert-info">
													<strong>
														<i class="icon-comments-alt"></i>
													</strong>
													<span class="text-warning">Text</span>

												</p>
											</div>
										</div>
									</div>
									<div
										class="alert {{person.alert.type}}"
										role="alert"
										ng-show="person.alert">
										{{person.alert.message}}
									</div>

								</div>
								<div class="col-md-4 panel-group">
									<div class="row">
										<div class="col-xs-12">
											<button class="btn btn-primary"
													ng-click="option1(person.id, $index)">
												<i class="icon-envelope align-top bigger-125"></i>
												Message
											</button>
											<button class="btn btn-info"
													ng-click="option1(person.id, $index)">
												<i class="icon-share-alt align-top bigger-125"></i>
												Visit
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- /row -->

		<!--downline-->
		<div class="row" ng-show="downline">
			<div class="col-xs-12 widget-container-span">
				<div class="widget-box">
					<div class="widget-header header-color-red3">
						<h5><?= trans('general.downline'); ?></h5>

						<div class="widget-toolbar">
							<a href="#" data-action="reload">
								<i class="icon-refresh"></i>
							</a>
							<a href="#" data-action="collapse">
								<i class="icon-chevron-up"></i>
							</a>
						</div>
					</div>

					<div class="widget-body">
						<div class="widget-main">
							<div class="row" ng-repeat="person in downline">
								<div id="downline_{{person.id}}" class="accordion-style1 panel-group col-md-8">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a class="accordion-toggle collapsed" data-toggle="collapse"
												   data-parent="#downline_{{person.id}}"
												   href="#downline_{{person.id}}_collapse">
													<i class="icon-angle-right bigger-110"
													   data-icon-hide="icon-angle-down"
													   data-icon-show="icon-angle-right"></i>
													&nbsp;{{person.connection_user.first_name + " " + person.connection_user.last_name}}
													{{person.meta_connection_relationship.name}}
												</a>
											</h4>
										</div>

										<div class="panel-collapse collapse" id="downline_{{person.id}}_collapse">
											<div class="panel-body">
												<p class="alert alert-info">
													<strong>
														<i class="icon-comments-alt"></i>
													</strong>
													<span class="text-warning">{{person.connection_user.first_name + " " + person.connection_user.last_name}} - </span>
												</p>
											</div>
										</div>
									</div>
									<div
										class="alert {{person.alert.type}}"
										role="alert"
										ng-show="person.alert">
										{{person.alert.message}}
									</div>

								</div>
								<div class="col-md-4 panel-group">
									<div class="row">
										<div class="col-xs-12">
											<button class="btn btn-primary"
													ng-click="option1(person.id, $index)">
												<i class="icon-envelope align-top bigger-125"></i>
												Message
											</button>
											<button class="btn btn-info"
													ng-click="option1(person.id, $index)">
												<i class="icon-share-alt align-top bigger-125"></i>
												Visit
											</button>
											<button class="btn btn-warning"
													ng-click="option1(person.id, $index)">
												<i class="icon-group align-top bigger-125"></i>
												View Team
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- /row -->

	</div>
	<!-- /.col -->


</div><!-- /.row -->

<!-- PAGE CONTENT ENDS -->