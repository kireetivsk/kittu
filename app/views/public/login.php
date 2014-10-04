<div class="row" ng-controller="public">
	<div class="col-md-8 col-md-push-2">
		<?php include(PARTIALS_DIR . '/login_form.php'); ?>
		<? if (Session::has('message')): ?>
			<div class="row">
				<div class="col-md-12 alert alert-danger text-center">
					<?= Session::get('message'); ?>
				</div>
			</div>
		<? endif; ?>
	</div>
</div>