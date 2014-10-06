<div class="row" ng-controller="connectionRequest">
	<div class="col-sm-12">
		<!-- PAGE CONTENT BEGINS -->

		<div class="row">
			<div class="col-xs-12 widget-container-span">
				<div class="widget-box">
					<div class="widget-header header-color-red2">
						<h5>Connection Requests</h5>
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
							<div class="row" ng-repeat="request in connection_requests">
								<div id="request_{{request.id}}" class="accordion-style1 panel-group col-md-8">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a class="accordion-toggle collapsed" data-toggle="collapse"
												   data-parent="#request_{{request.id}}"
												   href="#request_{{request.id}}_collapse">
													<i class="icon-angle-right bigger-110" data-icon-hide="icon-angle-down"
													   data-icon-show="icon-angle-right"></i>
													&nbsp;{{request.user.first_name + " " + request.user.last_name}} <?= trans('general.connection_request_view_text'); ?> {{request.meta_connection_relationship.name}}
												</a>
											</h4>
										</div>

										<div class="panel-collapse collapse" id="request_{{request.id}}_collapse">
											<div class="panel-body">
												<p class="alert alert-info">
													<strong>
														<i class="icon-comments-alt"></i>
													</strong>
													<span class="text-warning">{{request.user.first_name + " " + request.user.last_name}} - </span>
													Email: {{request.user.email}}
												</p>
											</div>
										</div>
									</div>
									<div
										class="alert {{request.alert.type}}"
										role="alert"
										ng-show="request.alert">
										{{request.alert.message}}
									</div>

								</div>
								<div class="col-md-4 panel-group">
									<div class="row">
										<div class="col-xs-12">
											<button class="btn btn-success btn-sm col-xs-5" ng-click="acceptRequest(request.id, $index)">Accept</button>
											<div class="col-xs-2"></div>
											<button class="btn btn-danger btn-sm col-xs-5" ng-click="rejectRequest(request.id, $index)">Reject</button>
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