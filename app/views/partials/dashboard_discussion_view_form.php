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