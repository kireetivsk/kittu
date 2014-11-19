<ul id="inbox-tabs"
	class="inbox-tabs nav nav-tabs padding-16 tab-size-bigger tab-space-1">
	<li class="active">
		<a data-toggle="tab" href="#view" data-target="view" ng-click="tab = '<?= trans('general.view'); ?>'">
			<i class="purple icon-comments-alt bigger-130"></i>
			<span class="bigger-110"><?= trans('general.view'); ?></span>
		</a>
	</li>

	<li>
		<a data-toggle="tab" href="#manage" data-target="manage" ng-click="tab = '<?= trans('general.manage'); ?>'">
			<i class="light-blue icon-gears bigger-130"></i>
			<span class="bigger-110"><?= trans('general.manage'); ?></span>
		</a>
	</li>

</ul>
