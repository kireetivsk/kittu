<div class="tab-content no-border no-padding row" id="manage">
	<div class="tab-pane in col-md-12">
		<? include(PARTIALS_DIR . '/dashboard_tabbable_header.php'); ?>
		<div class="row">
			<div class="col-md-10">
				<h2><?= trans('general.your_categories'); ?></h2>
			</div>
			<div class="col-md-2 text-right">
				<button class="btn btn-success btn-sm right" ng-click="show_add_category = !show_add_category">
					<?= trans('general.add_category'); ?>
				</button>
			</div>
		</div>
		<div class="row spacer" ng-show="show_add_category">
			<div class="col-md-12">
				<div class="alert alert-block alert-success">
					<div class="row">
						<div class="col-md-12">
							<h5><?= trans('general.add_category'); ?></h5>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-4">
							<label class="sr-only"
								   for="add_category_name">
								<?= trans('general.category_name'); ?>
							</label>
							<input
								type="text"
								id="add_category_name"
								class="form-control full"
								placeholder="<?= trans('general.category_name'); ?>"
								ng-model="new_category.name"
								required
								ng-readonly="readonly">
						</div>
						<div class="form-group col-sm-4">
							<label class="sr-only"
								   for="add_category_description">
								<?= trans('general.category_description'); ?>
							</label>
							<input
								id="add_category_description"
								type="text"
								class="form-control full"
								placeholder="<?= trans('general.category_description'); ?>"
								ng-model="new_category.description"
								ng-readonly="readonly">
						</div>
						<div class="form-group col-sm-4">
							<label class="sr-only"
								   for="add_category_permission">
								<?= trans('general.category_permission'); ?>
							</label>
							<select class="form-control full"
									id="add_category_permission"
									ng-options="permission.id as permission.name for permission in meta.permissions"
									placeholder="<?= trans('general.category_permission'); ?>"
									ng-model="new_category.permission"
									ng-readonly="readonly">
								<option value=""><?= trans('general.category_permission'); ?>{{permission}}</option>
							</select>
						</div>
					</div>
					<div class="row">
						<button
							class="btn btn-info col-sm-2"
							ng-click="addCategory()">
							<?= trans('general.add'); ?>
						</button>
					</div>
				</div>
			</div>
		</div>

		<div
			class="alert alert-{{alert.type}}"
			role="alert"
			ng-show="alert">
			{{alert.message}}
		</div>
		<div class="col-md-12">
			<div class="well row" ng-repeat="my_category in my_categories">
				<div class="col-md-9">
					<h4 class="green smaller lighter">
						{{my_category.title}}
						<span class="text-muted small">
							&nbsp;{{my_category.description}}
							&nbsp;<i class="icon icon-edit pointer"
									 ng-click="show_edit_category = !show_edit_category; show_add_topic = false"></i>
						</span>

					</h4>
					<div class="row">
						<div class="col-xs-12 col-sm-9">
							<div class="profile-user-info">
								<div class="profile-info-row">
									<div class="profile-info-name">
										<?= trans('general.topics'); ?>
									</div>
									<div class="profile-info-value" ng-hide="my_category.topics">
										<span ng-hide="show_edit_topic" class="text-info">
											<?= trans('general.no_topics'); ?>
										</span>
									</div>
									<div class="profile-info-value" ng-repeat="topic in my_category.topics">
										<span ng-hide="show_edit_topic">
											{{topic.title}}
											<i class="icon icon-edit pointer"
											   ng-click="show_edit_topic = !show_edit_topic"></i>
										</span>
										<span ng-show="show_edit_topic" class="form-group">
											<label for="edit_topic_title_{{topic.id}}" class="sr-only">
												<?= trans('general.topic_name'); ?>
											</label>
											<input
												type="text"
												id="edit_topic_title_{{topic.id}}"
												class=""
												placeholder="<?= trans('general.topic_name'); ?>"
												ng-model="topic.title"
												ng-readonly="readonly">
											<label for="edit_topic_description_{{topic.id}}" class="sr-only">
												<?= trans('general.topic_description'); ?>
											</label>
											<input
												type="text"
												id="edit_topic_description_{{topic.id}}"
												class=""
												placeholder="<?= trans('general.topic_description'); ?>"
												ng-model="topic.description"
												ng-readonly="readonly">
											<label for="edit_topic_save_{{topic.id}}">&nbsp;</label>
											<button class="btn btn-info btn-sm"
													id="edit_topic_save_{{topic.id}}"
													ng-click="editTopic(topic); show_edit_topic = false">
												<?= trans('general.save'); ?>
											</button>
											<label for="edit_topic_cancel_{{topic.id}}">&nbsp;</label>
											<button class="btn btn-warning btn-sm"
													id="edit_topic_cancel_{{topic.id}}"
													ng-click="show_edit_topic = false">
												<?= trans('general.cancel'); ?>
											</button>
											<button class="btn btn-danger btn-sm"
													id="edit_topic_delete_{{topic.id}}"
													ng-click="deleteTopic(topic); show_edit_topic = false">
												<?= trans('general.delete_topic'); ?>
											</button>
										</span>
									</div>
								</div>

							</div>
						</div>
					</div>

					<div class="row" ng-show="show_edit_category">
						<div class="form-group col-sm-3">
							<label for="edit_category_name_{{my_category.id}}">
								<?= trans('general.category_name'); ?>
							</label>
							<input
								type="text"
								id="edit_category_name_{{my_category.id}}"
								class="form-control full"
								placeholder="<?= trans('general.category_name'); ?>"
								ng-model="my_category.title"
								ng-readonly="readonly">
						</div>
						<div class="form-group col-sm-3">
							<label for="edit_category_description_{{my_category.id}}">
								<?= trans('general.category_description'); ?>
							</label>
							<input
								id="edit_category_description_{{my_category.id}}"
								type="text"
								class="form-control full"
								placeholder="<?= trans('general.category_description'); ?>"
								ng-model="my_category.description"
								ng-readonly="readonly">
						</div>
						<div class="form-group col-sm-3">
							<label for="edit_category_permisssion_{{my_category.id}}">
								<?= trans('general.category_permission'); ?>
							</label>
							<select class="form-control full"
									id="edit_category_permisssion_{{my_category.id}}"
									ng-options="permission.id as permission.name for permission in meta.permissions"
									placeholder="<?= trans('general.category_permission'); ?>"
									ng-model="my_category.permission_id"
									ng-readonly="readonly">
								<option value="{{my_category.permission_id}}">{{my_category.permission}}</option>
							</select>
						</div>
						<div class="form-group col-sm-1">
							<label for="edit_category_save_{{my_category.id}}">&nbsp;</label>
							<button class="btn btn-info btn-sm col-md-12"
									id="edit_category_save_{{my_category.id}}"
									ng-click="edit(my_category); show_edit_category = false">
								<?= trans('general.save'); ?>
							</button>
						</div>
						<div class="form-group col-sm-1">
							<label for="edit_category_cancel_{{my_category.id}}">&nbsp;</label>
							<button class="btn btn-danger btn-sm col-md-12"
									id="edit_category_cancel_{{my_category.id}}"
									ng-click="show_edit_category = false">
								<?= trans('general.cancel'); ?>
							</button>
						</div>
					</div>

					<div class="row" ng-show="show_add_topic">
						<br />
						<div class="form-group col-sm-3">
							<label for="edit_topic_name_{{my_category.id}}">
								<?= trans('general.topic_name'); ?>
							</label>
							<input
								type="text"
								id="edit_topic_name_{{my_category.id}}"
								class="form-control full"
								placeholder="<?= trans('general.topic_name'); ?>"
								ng-model="new_topic.title"
								ng-readonly="readonly">
						</div>
						<div class="form-group col-sm-3">
							<label for="edit_topic_description_{{my_category.id}}">
								<?= trans('general.topic_description'); ?>
							</label>
							<input
								id="edit_topic_description_{{my_category.id}}"
								type="text"
								class="form-control full"
								placeholder="<?= trans('general.topic_description'); ?>"
								ng-model="new_topic.description"
								ng-readonly="readonly">
						</div>
						<div class="form-group col-sm-1">
							<label for="add_topic_save_{{my_category.id}}">&nbsp;</label>
							<button class="btn btn-info btn-sm col-md-12"
									id="add_topic_save_{{my_category.id}}"
									ng-click="addTopic(my_category, new_topic); show_add_topic = false">
								<?= trans('general.save'); ?>
							</button>
						</div>
						<div class="form-group col-sm-1">
							<label for="add_topic_cancel_{{my_category.id}}">&nbsp;</label>
							<button class="btn btn-danger btn-sm col-md-12"
									id="add_topic_cancel_{{my_category.id}}"
									ng-click="show_add_topic = false">
								<?= trans('general.cancel'); ?>
							</button>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="row">
						<div class="col-md-6 col-md-push-6">
							<button class="btn btn-success btn-sm col-md-12"
									ng-click="show_add_topic = !show_add_topic; show_edit_category = false">
								<?= trans('general.add_topic'); ?>
							</button>
							<div class="space-10 col-md-12">&nbsp;</div>
							<button class="btn btn-danger btn-sm col-md-12"
									ng-click="deleteCategory(my_category)">
								<?= trans('general.delete'); ?>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.tab-pane -->
</div>