<div
	class="visible-md visible-lg hidden-sm hidden-xs btn-group">
	<div class="col-md-2">
		<button class="btn btn-xs btn-success"
				data-rel="tooltip"
				title="<?= trans('general.mark_read'); ?>"
				ng-click="markAsRead(message)"
				ng-show="message.status == 'New'">
			<i class="icon-ok bigger-120"></i>
		</button>
	</div>
	<div class="col-md-2">
		<button class="btn btn-xs btn-info"
				data-rel="tooltip"
				title="<?= trans('general.reply'); ?>"
				ng-click="reply(message)">
			<i class="icon-edit bigger-120"></i>
		</button>
	</div>
	<div class="col-md-2">
		<button class="btn btn-xs btn-danger"
				data-rel="tooltip"
				title="<?= trans('general.delete'); ?>" ng-click="deleteMessage(message)">
			<i class="icon-trash bigger-120"></i>
		</button>
	</div>
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
				<a href="#" class="tooltip-success"
				   data-rel="tooltip" title="<?= trans('general.mark_read'); ?>"
				   data-original-title="<?= trans('general.mark_read'); ?>"
				   ng-click="markAsRead(message)"
				   ng-show="message.status == 'New'">
					<span class="green">
						<i class="icon-ok bigger-120"></i>
					</span>
				</a>
			</li>

			<li>
				<a href="#" class="tooltip-info"
				   data-rel="tooltip" title="<?= trans('general.reply'); ?>"
				   data-original-title="<?= trans('general.reply'); ?>"
				   ng-click="reply(message)">
					<span class="blue">
						<i class="icon-edit bigger-120"></i>
					</span>
				</a>
			</li>

			<li>
				<a href="#" class="tooltip-error"
				   data-rel="tooltip" title="<?= trans('general.delete'); ?>"
				   data-original-title="<?= trans('general.delete'); ?>"
				   ng-click="deleteMessage(message)">
					<span class="red">
						<i class="icon-trash bigger-120"></i>
					</span>
				</a>
			</li>
		</ul>
	</div>
</div>