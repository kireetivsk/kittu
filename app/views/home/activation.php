<div class="row" ng-controller="public" ng-cloak>
	<div class="col-md-8 col-md-push-2">
		<?php include(PARTIALS_DIR . '/login_form.php'); ?>
		<?php if ($message): ?>
			<div class="alert alert-<?= $type; ?> text-center" role="alert">
				<?= $message; ?>
			</div>
		<?php endif; ?>
	</div>
</div>