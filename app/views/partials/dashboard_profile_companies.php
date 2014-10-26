<div id="companies" class="tab-pane">
	<div class="row">
		<div class="col-md-10">
			<h2><?= trans('general.companies_associated_with'); ?></h2>
		</div>
		<div class="col-md-2 text-right">
			<button class="btn btn-success btn-sm right" ng-click="show_add_company = !show_add_company"><?= trans('general.add_company'); ?></button>
		</div>
	</div>
	<div class="row spacer" ng-show="show_add_company">
		<div class="form-group col-sm-12">
			<label class="sr-only" for="company"><?= trans('general.add_company'); ?></label>
			<input
				type="text"
				class="form-control full"
				id="company"
				placeholder="Company"
				ng-model="registration_company"
				ng-readonly="readonly"
				ng-change="companySearch()">
			<input
				type="hidden"
				id="company_id"
				ng-model="registration_company_id">
		</div>
		<div ng-show="company_names" id="registration_company_names">
			<p>Select your company:</p>
			<p ng-repeat="company in company_names"
			   ng-click="setCompanySelection(company)"
			   class="btn btn-success btn-sm margin-2">
				{{company.name}}
			</p>
		</div>
		<div class="col-sm-12">
			<button
				type="submit"
				class="btn btn-success"
				ng-click="addCompany()"
				><?= trans('general.add'); ?>
			</button>
		</div>

	</div>

	<div
		class="alert alert-{{alert.type}}"
		role="alert"
		ng-show="alert">
		{{alert.message}}
	</div>
	<div class="well row" ng-repeat="company in consultant_profile.profile.companies">
		<div class="col-md-9">
			<h4 class="green smaller lighter">{{company.name}}</h4>
			<div class="row">
				<div class="col-xs-12 col-sm-9">
					<div class="profile-user-info">
						<div class="profile-info-row">
							<div class="profile-info-name">
								<?= trans('general.connections'); ?>
							</div>
							<div class="profile-info-value">
								<span>
									&nbsp;{{company.connections}}
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="col-md-3">
			<div class="row">
				<div class="col-md-6 col-md-push-6">
					<button class="btn btn-danger" ng-click="deleteCompanyConnection(company)">
						<?= trans('general.delete'); ?>
					</button>
				</div>
			</div>
		</div>
	</div>

</div>
