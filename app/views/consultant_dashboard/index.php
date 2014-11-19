<div class="row" ng-controller="index" ng-cloak>
	<div class="page-header">
		<h1>
			<?= trans('general.dashboard'); ?>
			<small>
				<i class="icon-double-angle-right"></i>
				<?= trans('general.dashboard_message'); ?>
			</small>
		</h1>
	</div>
	<!-- /.page-header -->
	<div class="col-xs-12 col-sm-8">
		<div class="row">
			<div class="col-xs-12 widget-container-span">
				<div class="widget-box">
					<div class="widget-header header-color-pink">
						<h5>Discussions</h5>

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


						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /row -->

		<div class="space-24"></div>

		<div class="row not-ready">
			<div class="col-xs-12 widget-container-span">
				<div class="widget-box">
					<div class="widget-header header-color-green">
						<h5>Questions & Answers</h5>

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



						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="space-24"></div>

		<div class="row not-ready">
			<div class="col-xs-12 widget-container-span">
				<div class="widget-box">
					<div class="widget-header header-color-purple">
						<h5>CRM Notifications</h5>

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


						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="space-24"></div>


	</div>
	<!-- /.col -->

	<div class="col-xs-12 col-sm-4">
		<div class="col-xs-12 widget-container-span">
			<div class="widget-box">
				<div class="widget-header header-color-blue2">
					<h5>Add team member</h5>

					<div class="widget-toolbar">
						<a href="#" data-action="collapse">
							<i class="icon-chevron-up"></i>
						</a>

					</div>
				</div>

				<div class="widget-body">
					<div class="widget-main">

						<div class="control-group">
							<div class="text">
								<label>
									<input
										name="add_team_email"
										type="text"
										class="ace"
										placeholder="Email address"
										ng-model="add_team_email">
								</label>
							</div>

							<div class="select2-active">
								<label>
									<select ng-model="add_team_relationship">
										<option value="" disabled selected>Select One</option>
										<option value="upline">Upline</option>
										<option value="sponsor">Sponsor</option>
										<option value="downline">Downline</option>
									</select>
								</label>
							</div>

							<div class="checkbox">
								<label>
									<input
										class="btn btn-success btn-sm"
										type="submit"
										ng-click="addTeam()">
								</label>
							</div>
							<div ng-show="alerts">
								<p class="alert" ng-class="alerts.type">{{alerts.message}}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 widget-container-span not-ready">
			<div class="widget-box">
				<div class="widget-header header-color-red">
					<h5>Goals</h5>

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

						<div class="control-group">
							<div class="checkbox">
								<label>
									<input name="form-field-checkbox" type="checkbox" class="ace">
									<span class="lbl"> Rank up</span>
								</label>
							</div>

							<div class="checkbox">
								<label>
									<input name="form-field-checkbox" type="checkbox" class="ace">
									<span class="lbl"> Sell $100</span>
								</label>
							</div>

							<div class="checkbox">
								<label>
									<input name="form-field-checkbox" class="ace ace-checkbox-2" type="checkbox">
									<span class="lbl"> 2 new touches</span>
								</label>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="space-24"></div>

		<div class="col-xs-12 widget-container-span not-ready">
			<div class="widget-box">
				<div class="widget-header header-color-orange">
					<h5>Notes</h5>

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
						<p>
									<span class="btn btn-sm"
										  data-rel="popover"
										  title=""
										  data-content="Heads up! This alert needs your attention, but it's not super important."
										  data-original-title="Default">
										Default
									</span>
									<span class="btn btn-success btn-sm tooltip-success"
										  data-rel="popover"
										  data-placement="right"
										  title=""
										  data-content="Well done! You successfully read this important alert message."
										  data-original-title="&lt;i class='icon-ok green'&gt;&lt;/i&gt; Right Success">
										Right
									</span>
									<span class="btn btn-warning btn-sm tooltip-warning"
										  data-rel="popover"
										  data-placement="left"
										  title=""
										  data-content="Warning! Best check yo self, you're not looking too good."
										  data-original-title="&lt;i class='icon-warning-sign orange'&gt;&lt;/i&gt; Left Warning">
										Left
									</span>
						</p>
					</div>
				</div>
			</div>
		</div>

		<div class="space-24"></div>


	</div>
</div><!-- /.row -->

<!-- PAGE CONTENT ENDS -->