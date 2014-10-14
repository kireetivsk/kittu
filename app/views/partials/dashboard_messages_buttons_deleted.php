<div
	class="visible-md visible-lg hidden-sm hidden-xs btn-group">
	<button class="btn btn-xs btn-info"
			data-rel="tooltip"
			title="<?= trans('general.restore'); ?>"
			ng-click="markAsRead(message, true)">
		<i class="icon-reply bigger-120"></i>
	</button>

	<button class="btn btn-xs btn-danger"
			data-rel="tooltip"
			title="<?= trans('general.delete_for_real'); ?>"
			ng-click="deleteMessage(message)">
		<i class="icon-trash bigger-120"></i>
	</button>

</div>

<div class="visible-xs visible-sm hidden-md hidden-lg">
	<div class="inline position-relative">
		<button
			class="btn btn-minier btn-primary dropdown-toggle"
			data-toggle="dropdown">
			<i class="icon-cog icon-only bigger-110"></i>
		</button>

		<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
			<li>
				<a href="#" class="tooltip-info"
				   data-rel="tooltip" title="<?= trans('general.restore'); ?>"
				   data-original-title="<?= trans('general.restore'); ?>"
				   ng-click="markAsRead(message, true)">
					<span class="blue">
						<i class="icon-reply bigger-120"></i>
					</span>
				</a>
			</li>

			<li>
				<a href="#" class="tooltip-error"
				   data-rel="tooltip" title="<?= trans('general.delete_for_real'); ?>"
				   data-original-title="<?= trans('general.delete_for_real'); ?>"
				   ng-click="deleteMessage(message)">
					<span class="red">
						<i class="icon-trash bigger-120"></i>
					</span>
				</a>
			</li>
		</ul>
	</div>
</div>