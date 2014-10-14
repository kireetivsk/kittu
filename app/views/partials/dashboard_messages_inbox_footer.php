<div class="message-footer message-footer-style2 clearfix">
	<div class="pull-left">
	</div>

	<div class="pull-right">
		<button class="btn btn-danger btn-sm" ng-click="deleteMessages(tab)" ng-disable="!to_delete[tab.toLowerCase()]">
			<?= trans('general.delete_selected'); ?>
		</button>
		<div
			class="alert alert-{{message_delete.alert.type}}"
			role="alert"
			ng-show="message_delete.alert">
			{{message_delete.alert.message}}
		</div>
	</div>
</div>