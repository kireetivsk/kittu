<div class="row" ng-controller="public">
	<div class="col-md-8 col-md-push-2">
		<?php include(PARTIALS_DIR . '/login_form.php'); ?>
		<?php if (isset($type) && isset($message)): ?>
		<div class="alert alert-<?= $type; ?>" role="alert">
			<?= $message; ?>

		</div>
		<?php endif; ?>
	</div>
</div>
