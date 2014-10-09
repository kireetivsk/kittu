<div class="sidebar" id="sidebar">
	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
	</script>

	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<button class="btn btn-success">
				<i class="icon-plus" title="Add a team member"></i>
			</button>

			<button class="btn btn-info">
				<i class="icon-pencil" title="Write a post"></i>
			</button>

			<button class="btn btn-warning">
				<i class="icon-group" title="View my team"></i>
			</button>

			<button class="btn btn-danger">
				<i class="icon-file" title="View my files"></i>
			</button>
		</div>

		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>

			<span class="btn btn-info"></span>

			<span class="btn btn-warning"></span>

			<span class="btn btn-danger"></span>
		</div>
	</div><!-- #sidebar-shortcuts -->

	<ul class="nav nav-list">
		<li ng-class="{ active: isActive('/dashboard')}">
			<a href="/dashboard">
				<i class="icon-dashboard"></i>
				<span class="menu-text"> Dashboard </span>
			</a>
		</li>

		<li ng-class="{ active: isActive('/dashboard/settings')}">
			<a href="/dashboard/settings">
				<i class="icon-gear"></i>
				<span class="menu-text"> Settings </span>
			</a>
		</li>

		<li ng-class="{ active: isActive('/dashboard/profile')}">
			<a href="/dashboard/profile">
				<i class="icon-user"></i>
				<span class="menu-text"> Profile </span>
			</a>
		</li>

		<li>
			<span class="menu-text"> &nbsp; </span>
		</li>

		<li ng-class="{ active: isActive('/dashboard/connection-requests')}">
			<a href="/dashboard/connection-requests">
				<i class="icon-link"></i>
				<span class="menu-text"> Connection Requests</span>
			</a>
		</li>

		<li ng-class="{ active: isActive('/dashboard/my-team')}">
			<a href="/dashboard/my-team">
				<i class="icon-group"></i>
				<span class="menu-text"> My Team</span>
			</a>
		</li>

		<li ng-class="{ active: isActive('/dashboard/crm')}">
			<a href="/dashboard/crm">
				<i class="icon-phone"></i>
				<span class="menu-text"> CRM </span>
			</a>
		</li>

		<li ng-class="{ active: isActive('/dashboard/goals')}">
			<a href="/dashboard/goals">
				<i class="icon-check"></i>
				<span class="menu-text"> Goals </span>
			</a>
		</li>

		<li ng-class="{ active: isActive('/dashboard/dreamboard')}">
			<a href="/dashboard/dreamboard">
				<i class="icon-cloud"></i>
				<span class="menu-text"> Dreamboard </span>
			</a>
		</li>

		<li ng-class="{ active: isActive('/dashboard/qna')}">
			<a href="/dashboard/qna">
				<i class="icon-question"></i>
				<span class="menu-text"> Question and Answer </span>
			</a>
		</li>

		<li ng-class="{ active: isActive('/dashboard/social-tools')}">
			<a href="/dashboard/social-tools">
				<i class="icon-briefcase"></i>
				<span class="menu-text"> Social Tools </span>
			</a>
		</li>

		<li ng-class="{ active: false}">
			<a href="#">
				<i class="icon-rocket"></i>
				<span class="menu-text"> Company Progress </span>
			</a>
		</li>

		<li ng-class="{ active: isActive('/dashboard/analytics')}">
			<a href="/dashboard/analytics">
				<i class="icon-bar-chart"></i>
				<span class="menu-text"> Analytics </span>
			</a>
		</li>

		<li ng-class="{ active: isActive('/dashboard/marketplace')}">
			<a href="/dashboard/marketplace">
				<i class="icon-shopping-cart"></i>
				<span class="menu-text"> Marketplace </span>
			</a>
		</li>

		<li ng-class="{ active: isActive('/dashboard/advertisers')}">
			<a href="/dashboard/advertisers">
				<i class="icon-money"></i>
				<span class="menu-text"> Advertisers </span>
			</a>
		</li>

		<li>
			<span class="menu-text"> &nbsp; </span>
		</li>

		<li ng-class="{ active: isActive('/dashboard/blog')}">
			<a href="/dashboard/blog">
				<i class="icon-pencil"></i>
				<span class="menu-text"> Blog </span>
			</a>
		</li>

		<li ng-class="{ active: isActive('/dashboard/marketing')}">
			<a href="/dashboard/marketing">
				<i class="icon-level-down"></i>
				<span class="menu-text"> Marketing </span>
			</a>
		</li>

		<li ng-class="{ active: isActive('/dashboard/leads')}">
			<a href="/dashboard/leads">
				<i class="icon-users"></i>
				<span class="menu-text"> Leads </span>
			</a>
		</li>

	</ul><!-- /.nav-list -->

	<div class="sidebar-collapse" id="sidebar-collapse">
		<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
	</div>

	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
	</script>
</div>
