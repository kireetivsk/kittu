<!-- DELETED -->
<div class="tab-content no-border no-padding" id="deleted">
	<div class="tab-pane in">
		<div class="message-container">

			<? include(PARTIALS_DIR . '/dashboard_messages_inbox_header.php'); ?>

			<div class="message-list-container">
				<div class="message-list" id="message-list">
					<? include(PARTIALS_DIR . '/dashboard_messages_loading.php'); ?>

					<div ng-show="messages && messages.Deleted === undefined">
						<p class="text-center"><?= trans('general.no_messages'); ?></p>
					</div>

					<table id="sample-table-1"
						   class="table table-striped table-bordered table-hover"
						   ng-hide="messages && messages.Deleted === undefined">
						<thead>
							<tr>
								<th class="center">
									<label>
										<input type="checkbox"
											   class="ace"
											   ng-model="selectedAll"
											   ng-change="checkAll()">
										<span class="lbl"></span>
									</label>
								</th>
								<th ng-click="predicate = 'from'; reverse=!reverse"
									class="pointer">
									<i class="icon-caret-down"
									   ng-class="{'icon-caret-down': !reverse, 'icon-caret-up': reverse}"></i>
									&nbsp;<?= trans('general.from'); ?>
								</th>
								<th ng-click="predicate = 'subject'; reverse=!reverse"
									class="pointer">
									<i class="icon-caret-down"
									   ng-class="{'icon-caret-down': !reverse, 'icon-caret-up': reverse}"></i>
									<?= trans('general.subject'); ?>
								</th>
								<th ng-click="predicate = 'message'; reverse=!reverse"
									class="pointer">
									<i class="icon-caret-down"
									   ng-class="{'icon-caret-down': !reverse, 'icon-caret-up': reverse}"></i>
									<?= trans('general.message'); ?>
								</th>

								<th ng-click="predicate = 'time_sent'; reverse=!reverse"
									class="pointer">
									<i class="icon-caret-down"
									   ng-class="{'icon-caret-down': !reverse, 'icon-caret-up': reverse}"></i>
									<i class="icon-time bigger-110 hidden-480"></i>
									<?= trans('general.sent'); ?>
								</th>
								<th></th>
							</tr>
						</thead>

						<tbody>
							<tr ng-repeat="message in messages.Deleted | orderBy:predicate:reverse">
								<td class="center">
									<label>
										<input type="checkbox"
											   class="ace"
											   ng-model="message_checkbox[message.id]"
											   ng-change="messageSelection(tab, message.id)">
										<span class="lbl"></span>
									</label>
								</td>

								<td>
									<i class="icon-asterisk" ng-show="message.status == 'New'"></i>
									&nbsp;{{message.from}}
								</td>
								<td>{{message.subject}}</td>
								<td ng-click="showMore(message)">
									{{message.message |
									limitTo: message.textLength ?
									message.textLength : preview_length}}
									<small ng-show="message.message.length > preview_length && !message.textLength"
										   class="grey pointer">
										... (Click to read more)
									</small>
								</td>
								<td>{{message.time_sent}}</td>

								<td>
									<? include(PARTIALS_DIR . '/dashboard_messages_buttons_deleted.php'); ?>
								</td>
							</tr>

						</tbody>
					</table>

				</div>
			</div>
			<!-- /.message-list-container -->

			<? include(PARTIALS_DIR . '/dashboard_messages_inbox_footer.php'); ?>

		</div>
		<!-- /.message-container -->
	</div>
	<!-- /.tab-pane -->
</div>
