<div ng-hide="messages !== undefined">
	<div class="row">
		<div class="col-xs-8 col-xs-push-2">
			<p class="text-center"><?= trans('general.loading_messages'); ?></p>

			<div id="progressbar"
				 class="ui-progressbar ui-widget ui-widget-content ui-corner-all progress progress-striped active"
				 role="progressbar" aria-valuemin="0" aria-valuemax="100"
				 aria-valuenow="37">
				<div
					class="ui-progressbar-value ui-widget-header ui-corner-left progress-bar progress-bar-success"
					style="width: 100%;"></div>
			</div>
		</div>
	</div>
</div>
