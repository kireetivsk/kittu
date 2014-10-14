<div class="tab-content no-border no-padding" id="send">
	<div class="tab-pane in ">
		<div id="id-message-list-navbar" class="message-navbar align-center clearfix">
			<div class="message-bar">
				<div class="message-infobar" id="id-message-infobar">
					<span
						class="blue bigger-150 ng-binding"><?= trans('general.send_message'); ?>
					</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3" ng-hide="send_message.single">
				<p class="text-center"><?= trans('general.select_recipients'); ?></p>

				<div class="row">
					<div class="col-md-12">
						<input type="text"
							   id="form-field-1"
							   placeholder="<?= trans('general.search'); ?>"
							   ng-model="recipient_search"
							   class="col-md-12">
					</div>
				</div>

				<div id="accordion" class="accordion-style1 panel-group">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle" data-toggle="collapse"
								   data-parent="#accordion" href="#collapseOne">
									<i class="icon-angle-down bigger-110"
									   data-icon-hide="icon-angle-down"
									   data-icon-show="icon-angle-right"></i>
									&nbsp;<?= trans('general.upline'); ?>
								</a>
							</h4>
						</div>

						<div class="panel-collapse collapse in" id="collapseOne">
							<div class="panel-body recipient">
								<span class="label label-info pointer margin-2"
									  ng-repeat="person in upline | filter:{$: recipient_search}"
									  ng-click="addRecipient($index, 'upline')">
									{{person.connection_user.first_name + " " + person.connection_user.last_name}}
								</span>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle collapsed" data-toggle="collapse"
								   data-parent="#accordion" href="#collapseTwo">
									<i class="icon-angle-right bigger-110"
									   data-icon-hide="icon-angle-down"
									   data-icon-show="icon-angle-right"></i>
									&nbsp;<?= trans('general.sponsor'); ?>
								</a>
							</h4>
						</div>

						<div class="panel-collapse collapse" id="collapseTwo">
							<div class="panel-body recipient">
								<span class="label label-info pointer margin-2"
									  ng-repeat="person in sponsor | filter:{$: recipient_search}"
									  ng-click="addRecipient($index, 'sponsor')">
									{{person.connection_user.first_name + " " + person.connection_user.last_name}}
								</span>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle collapsed" data-toggle="collapse"
								   data-parent="#accordion" href="#collapseThree">
									<i class="icon-angle-right bigger-110"
									   data-icon-hide="icon-angle-down"
									   data-icon-show="icon-angle-right"></i>
									&nbsp;<?= trans('general.downline'); ?>
								</a>
							</h4>
						</div>

						<div class="panel-collapse collapse" id="collapseThree">
							<div class="panel-body  recipient">
								<span class="label label-info pointer margin-2"
									  ng-repeat="person in downline | filter:{$: recipient_search}"
									  ng-click="addRecipient($index, 'downline')">
									{{person.connection_user.first_name + " " + person.connection_user.last_name}}&nbsp;
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-9">

				<form class="form-horizontal message-form col-xs-12">
					<div class="">
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"
								   for="form-field-recipient"><?= trans('general.recipients'); ?>:</label>

							<div class="col-sm-9 recipient">
								<span
									class="label label-info pointer margin-2"
									ng-repeat="person in send_message.recipients"
									ng-click="removeRecipient($index, person.meta_connection_relationship.name.toLowerCase())">
									{{person.connection_user.first_name + " " + person.connection_user.last_name}}&nbsp;
								</span>
							</div>
						</div>

						<div class="hr hr-18 dotted"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"
								   for="form-field-subject"><?= trans('general.subject'); ?></label>

							<div class="col-sm-6 col-xs-12">
								<div class="input-icon block col-xs-12 no-padding">
									<input maxlength="100"
										   type="text"
										   class="col-xs-12"
										   name="subject"
										   ng-model="send_message.subject"
										   placeholder="<?= trans('general.subject'); ?>" />
									<i class="icon-comment-alt"></i>
								</div>
							</div>
						</div>

						<div class="hr hr-18 dotted"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">
								<span class="inline space-24 hidden-480"></span>
								<?= trans('general.message'); ?>
							</label>

							<div class="col-sm-6 col-xs-12">
								<div class="block col-xs-12 no-padding">
									<textarea class="form-control col-xs-12"
											  ng-model="send_message.content"
											  rows="6"
											  placeholder="Message Text"></textarea>
								</div>
							</div>
						</div>

						<div class="hr hr-18 dotted"></div>

						<div class="align-right">
							<button class="btn btn-sm btn-danger" ng-click="sendMessage()">
								<i class="icon-share bigger-140"></i>
								<?= trans('general.send_message'); ?>
							</button>
						</div>

						<div class="space"></div>
						<div
							class="alert alert-{{alert.type}}"
							role="alert"
							ng-show="alert">
							{{alert.message}}
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>