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
							type="submit"
							class="btn btn-info col-sm-2 col-sm-push-10"
							ng-click="addCategory()"
							><?= trans('general.add'); ?>
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
							&nbsp;<i class="icon icon-edit pointer" ng-click="show_edit_category = !show_edit_category"></i>
						</span>

					</h4>
					<div class="row">
						<div class="col-xs-12 col-sm-9">
							<div class="profile-user-info">
								<div class="profile-info-row">
									<div class="profile-info-name">
										<?= trans('general.topics'); ?>
									</div>
									<div class="profile-info-value">
										<span>
											&nbsp;{{my_category.topic_count}}
										</span>
									</div>
								</div>

							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-9">
							<div class="profile-user-info">
								<div class="profile-info-row">
									<div class="profile-info-name">
										<?= trans('general.permission'); ?>
									</div>
									<div class="profile-info-value">
										<span>
											&nbsp;{{my_category.permission}}
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
				</div>
				<div class="col-md-3">
					<div class="row">
						<div class="col-md-4 col-md-push-8">
							<button class="btn btn-danger"
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