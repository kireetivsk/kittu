<div class="row" ng-controller="home">
    <div class="col-sm-7 center-block">
        <h1 class="text-center">Manage your team</h1>
        <p class="orange text-center">Communicate efficiently with your downline.</p>
        <button class="btn blue center-block" ng-click="goToFeatures()">Learn more</button>
        <ul class="home">
            <li class="">
                <span class="glyphicon glyphicon-pencil"></span>
                Message - <span class="light-text">send and receive messages privately.</span>
            </li>
            <li>
                <span class="glyphicon glyphicon-briefcase"></span>
                Train - <span class="light-text">store and organize training materials for your team.</span>
            </li>
            <li>
                <span class="glyphicon glyphicon-retweet"></span>
                Connect - <span class="light-text">with your upline and downline.</span>
            </li>
            <li>
                <span class="glyphicon glyphicon-share"></span>
                Share - <span class="light-text">marketing materials with your team.</span>
            </li>
        </ul>
    </div>
    <div class="col-sm-5">
        <h2>Join your team</h2>
        <p class="orange">It's quick, easy, and FREE!</p>
        <form class="form" role="form" autocomplete="off">
            <div class="row spacer">
                <div class="form-group col-sm-6">
                    <label class="sr-only" for="first_name">First name</label>
                    <input
						type="text"
						class="form-control"
						id="first_name"
						placeholder="First name"
						ng-model="first_name">
                </div>
                <div class="form-group col-sm-6">
                    <label class="sr-only" for="last_name">Last name</label>
                    <input
						type="text"
						class="form-control"
						id="last_name"
						placeholder="Last name"
						ng-model="last_name">
                </div>
            </div>
            <div class="row spacer">
                <div class="form-group col-sm-12">
                    <label class="sr-only" for="email">Email</label>
                    <input
						type="email"
						class="form-control full"
						id="email"
						placeholder="Email"
						ng-model="registration_email"
						ng-readonly="readonly"
						autocomplete="off">
					<a ng-show="readonly" href="/">Use a different email address *</a>

				</div>
            </div>
            <div class="row spacer">
                <div class="form-group col-sm-12">
                    <label class="sr-only" for="password">Password</label>
                    <input
                        type="password"
                        class="form-control full"
                        id="password"
                        placeholder="Password"
                        ng-model="registration_password"
						autocomplete="off">
                </div>
            </div>
            <div class="row spacer">
                <div class="form-group col-sm-12">
                    <label class="sr-only" for="company">Company</label>
                    <input
                        type="text"
                        class="form-control full"
                        id="company"
                        placeholder="Company"
                        ng-model="registration_company"
						ng-readonly="readonly"
						ng-change="companySearch()">
                    <input
                        type="hidden"
                        id="company_id"
                        ng-model="registration_company_id">
                </div>
            </div>
            <div ng-show="company_names" id="registration_company_names">
				<p>Select your company:</p>
                <p ng-repeat="company in company_names" ng-click="setCompanySelection(company)" class="btn btn-success btn-sm">{{company.name}}</p>
            </div>
            <div class="row">
				<div class="col-sm-12">
					<button
						type="submit"
						class="btn orange full"
						ng-click="register()"
						>Sign Up
					</button>
				</div>
			</div>
			<input
				type="hidden"
				ng-model="registration_is_referral">

		</form>
		<div class="space-10"></div>
		<div>
			<p class="small" ng-show="readonly" >* Please note that you will not be automatically connected to those who invited you if you use a different email.</p>
			<p class="small" ng-show="readonly" >You can still connect to them, you'll just have to send a new request.</p>

		</div>
		<div
			class="alert alert-{{alerts.type}}"
			role="alert"
			ng-show="alerts">
			{{alerts.message}}
		</div>

    </div>
</div>
