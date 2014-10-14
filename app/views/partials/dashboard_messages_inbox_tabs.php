<ul id="inbox-tabs"
	class="inbox-tabs nav nav-tabs padding-16 tab-size-bigger tab-space-1">
	<li>
		<a data-toggle="tab" href="#send" data-target="send" ng-click="tab = 'Send'; clearReply()" id="send_tab">
			<i class="purple icon-envelope bigger-130"></i>
			<span class="bigger-110">Send</span>
		</a>
	</li>

	<li class="active">
		<a data-toggle="tab" href="#inbox" data-target="inbox" ng-click="tab = 'Inbox'">
			<i class="blue icon-inbox bigger-130"></i>
			<span class="bigger-110">Inbox</span>
		</a>
	</li>

	<li>
		<a data-toggle="tab" href="#sent" data-target="sent" ng-click="tab = 'Sent'">
			<i class="orange icon-location-arrow bigger-130 "></i>
			<span class="bigger-110"><?= trans('general.sent'); ?></span>
		</a>
	</li>

	<li>
		<a data-toggle="tab" href="#deleted" data-target="deleted" ng-click="tab = 'Deleted'">
			<i class="red icon-minus-sign bigger-130"></i>
			<span class="bigger-110"><?= trans('general.deleted'); ?></span>
		</a>
	</li>

</ul>