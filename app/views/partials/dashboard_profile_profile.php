<div id="home" class="tab-pane in active">
	<div class="row">
		<div class="col-xs-12 col-sm-3 center">
			<span class="profile-picture">
				<img class="img-responsive"
					 alt="Avatar"
					 src="{{consultant_profile.profile.avatar.url}}"
					 ng-show="consultant_profile.profile.avatar.url" />
			</span>
			<form class="form-signin"
				  role="form">
				<h2 class="form-signin-heading">
					<?= trans('general.upload_photo');?>
				</h2>
				<div class="row">
					<div class="col-md-12">
						<p><?= trans('general.change_photo');?></p>
						<input class="form-control" type="file" file-change="upload" required>
					</div>
				</div>
				<br />
			</form>
			<div
				class="alert alert-{{alert.photo.type}}"
				role="alert"
				ng-show="alert.photo">
				{{alert.photo.message}}
			</div>

		</div>
		<!-- /span -->

		<div class="col-xs-12 col-sm-9">
			<div
				class="alert alert-{{alert.type}}"
				role="alert"
				ng-show="alert">
				{{alert.message}}
			</div>
			<h4 class="blue">
				<span class="middle">{{user.full_name}}</span>

				<span class="label label-purple arrowed-in-right">
					<i class="icon-circle smaller-80 align-middle"></i>
					Put billing status here
				</span>
			</h4>

			<div class="profile-user-info">
				<div class="profile-info-row ">
					<div class="profile-info-name">
						<?= trans('general.display_name'); ?>
						<i class="icon-edit pointer" ng-click="edit = 'display_name'"></i>
					</div>

					<div class="profile-info-value">
						<span ng-hide="edit == 'display_name'">
							&nbsp;{{consultant_profile.profile.display_name.value}}
						</span>
						<div class="input-group" ng-show="edit == 'display_name'">
							<input class="form-control input-mask-date"
								   type="text"
								   ng-model="consultant_profile.profile.display_name.new_value">
							<span class="input-group-btn">
								<button class="btn btn-sm btn-success"
										type="button" ng-click="profileEdit()">
									<i class="icon-ok bigger-110"></i>
									Save
								</button>
							</span>
							<span class="input-group-btn">
								<button class="btn btn-sm btn-danger"
										type="button" ng-click="edit = ''">
									<i class="icon-remove"></i>
									Cancel
								</button>
							</span>
						</div>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name">
						<?= trans('general.username'); ?>
					</div>

					<div class="profile-info-value">
						<span>
							&nbsp;{{consultant_profile.profile.username}}
						</span>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name">
						<?= trans('general.email'); ?>
						<i class="icon-edit pointer" ng-click="edit = 'email'"></i>
					</div>

					<div class="profile-info-value">
						<span ng-hide="edit == 'email'">
							&nbsp;{{consultant_profile.profile.email}}
						</span>
						<div class="input-group" ng-show="edit == 'email'">
							<input class="form-control input-mask-date"
								   type="text"
								   ng-model="consultant_profile.profile.new_email">
							<span class="input-group-btn">
								<button class="btn btn-sm btn-success"
										type="button" ng-click="emailEdit()">
									<i class="icon-ok bigger-110"></i>
									Save
								</button>
							</span>
							<span class="input-group-btn">
								<button class="btn btn-sm btn-danger"
										type="button" ng-click="edit = ''">
									<i class="icon-remove"></i>
									Cancel
								</button>
							</span>
						</div>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name">
						<?= trans('general.location'); ?>
						<i class="icon-edit pointer" ng-click="edit = 'location'"></i>
					</div>

					<div class="profile-info-value">
						<span ng-hide="edit == 'location'">
							&nbsp;{{consultant_profile.profile.location.value}}
						</span>
						<div class="input-group" ng-show="edit == 'location'">
							<input class="form-control input-mask-date"
								   type="text"
								   ng-model="consultant_profile.profile.location.new_value">
							<span class="input-group-btn">
								<button class="btn btn-sm btn-success"
										type="button" ng-click="profileEdit()">
									<i class="icon-ok bigger-110"></i>
									Save
								</button>
							</span>
							<span class="input-group-btn">
								<button class="btn btn-sm btn-danger"
										type="button" ng-click="edit = ''">
									<i class="icon-remove"></i>
									Cancel
								</button>
							</span>
						</div>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name">
						<?= trans('general.phone'); ?>
						<i class="icon-edit pointer" ng-click="edit = 'phone'"></i>
					</div>

					<div class="profile-info-value">
						<span ng-hide="edit == 'phone'">
							&nbsp;{{consultant_profile.profile.phone.value}}
						</span>
						<div class="input-group" ng-show="edit == 'phone'">
							<input class="form-control input-mask-date"
								   type="text"
								   ng-model="consultant_profile.profile.phone.new_value">
							<span class="input-group-btn">
								<button class="btn btn-sm btn-success"
										type="button" ng-click="profileEdit()">
									<i class="icon-ok bigger-110"></i>
									Save
								</button>
							</span>
							<span class="input-group-btn">
								<button class="btn btn-sm btn-danger"
										type="button" ng-click="edit = ''">
									<i class="icon-remove"></i>
									Cancel
								</button>
							</span>
						</div>
					</div>
				</div>

				<div class="profile-info-row">
					<div class="profile-info-name">
						<?= trans('general.about_me'); ?>
						<i class="icon-edit pointer" ng-click="edit = 'about_me'"></i>
					</div>

					<div class="profile-info-value">
						<span ng-hide="edit == 'about_me'">
							&nbsp;{{consultant_profile.profile.about_me.value}}
						</span>
						<div class="input-group" ng-show="edit == 'about_me'">
							<input class="form-control input-mask-date"
								   type="text" placeholder="This is what your team sees about you on their team page."
								   ng-model="consultant_profile.profile.about_me.new_value">
							<span class="input-group-btn">
								<button class="btn btn-sm btn-success"
										type="button" ng-click="profileEdit()">
									<i class="icon-ok bigger-110"></i>
									Save
								</button>
							</span>
							<span class="input-group-btn">
								<button class="btn btn-sm btn-danger"
										type="button" ng-click="edit = ''">
									<i class="icon-remove"></i>
									Cancel
								</button>
							</span>
						</div>
					</div>
				</div>

			</div>

			<div class="hr hr-8 dotted"></div>

			<div class="profile-user-info">
				<div class="profile-info-row">
					<div class="profile-info-name">
						<?= trans('general.website'); ?>
						<i class="icon-edit pointer" ng-click="edit = 'url'"></i>
					</div>

					<div class="profile-info-value">
						<span ng-hide="edit == 'url'">
							<a href="{{consultant_profile.profile.url.value}}" target="_blank">
								&nbsp;{{consultant_profile.profile.url.value}}
							</a>
						</span>
						<div class="input-group" ng-show="edit == 'url'">
							<input class="form-control"
								   type="text"
								   ng-model="consultant_profile.profile.url.new_value">
							<span class="input-group-btn">
								<button class="btn btn-sm btn-success"
										type="button" ng-click="profileEdit()">
									<i class="icon-ok bigger-110"></i>
									<?= trans('general.save'); ?>
								</button>
							</span>
							<span class="input-group-btn">
								<button class="btn btn-sm btn-danger"
										type="button" ng-click="edit = ''">
									<i class="icon-remove"></i>
									<?= trans('general.cancel'); ?>
								</button>
							</span>
						</div>
					</div>
				</div>

				<div class="profile-info-row" ng-repeat="social in consultant_profile.fields.socials">
					<div class="profile-info-name">
						<i class="middle {{social.icon}} bigger-150 {{social.color}}"></i>
						<i class="icon-edit pointer" ng-click="$parent.edit = 'social' + social.slug"></i>
					</div>

					<div class="profile-info-value">
						<span ng-hide="edit == 'social' + social.slug">
							<a href="{{consultant_profile.profile.socials[social.slug].webpage}}" target="_blank">
								&nbsp;{{consultant_profile.profile.socials[social.slug].webpage}}
							</a>
						</span>
						<div class="input-group" ng-show="$parent.edit == 'social' + social.slug">
							<input class="form-control"
								   type="text"
								   ng-model="consultant_profile.profile.socials[social.slug].new_value">
							<span class="input-group-btn">
								<button class="btn btn-sm btn-success"
										type="button"
										ng-click="socialAdd(social)">
									<i class="icon-ok bigger-110"></i>
									<?= trans('general.save'); ?>
								</button>
							</span>
							<span class="input-group-btn">
								<button class="btn btn-sm btn-danger"
										type="button"
										ng-click="$parent.edit = ''">
									<i class="icon-remove"></i>
									<?= trans('general.cancel'); ?>
								</button>
							</span>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- /span -->
	</div>
	<!-- /row-fluid -->

</div>