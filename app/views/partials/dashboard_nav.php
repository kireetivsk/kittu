<div class="navbar navbar-default" id="navbar">
	<script type="text/javascript">
		try {
			ace.settings.check('navbar', 'fixed')
		} catch (e) {
		}
	</script>

	<div class="navbar-container" id="navbar-container">
		<div class="navbar-header pull-left">
			<a href="#" class="navbar-brand">
				<small>
					<i class="icon-briefcase"></i>
					DirectSalesKit.com
				</small>
			</a><!-- /.brand -->
		</div>
		<!-- /.navbar-header -->

		<div class="navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				<li class="purple">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<i class="icon-bell-alt" ng-class="{'icon-animated-bell' : notifications.count > 0}"></i>
						<span class="badge badge-important" ng-show="notifications.count > 0">{{notifications.count}}</span>
					</a>

					<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
						<li class="dropdown-header">
							<i class="icon-warning-sign" ng-show="notifications.count > 0"></i>
							{{notifications.count}} Notifications
						</li>

						<li ng-repeat="notification in notifications.notifications">
							<a href="#" ng-click="clearNotification(notification, $index)">
								<div class="clearfix">
									<span class="pull-left">
										<i class="btn btn-xs no-hover {{notification.meta_notification_type.color}} {{notification.meta_notification_type.icon}}"></i>
										{{notification.title}}
									</span>
									<span class="pull-left" ng-bind-html="notification.body"></span>
								</div>
							</a>
						</li>

						<li ng-show="notifications.count > 0">
							<a href="#" ng-click="clearAllNotifications()">
								Clear all notifications
								<i class="icon-arrow-right"></i>
							</a>
						</li>
					</ul>
				</li>

				<li class="blue">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<img class="nav-user-photo" src="{{user.avatar}}" alt="{{user.first_name}}'s Photo"/>
						<span class="user-info">
							<small>Welcome,</small>
							{{user.first_name}}
						</span>

						<i class="icon-caret-down"></i>
					</a>

					<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="/logout">
								<i class="icon-off"></i>
								Logout
							</a>
						</li>
					</ul>
				</li>
			</ul>
			<!-- /.ace-nav -->
		</div>
		<!-- /.navbar-header -->
	</div>
	<!-- /.container -->
</div>