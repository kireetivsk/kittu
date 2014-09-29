	<div class="space-10"></div>
	<div class="row">
		<form class="form-inline col-sm-12" role="form">
			<div class="form-group">
				<label class="sr-only" for="login_email">Email address</label>
				<input
					type="email"
					class="form-control orange_border"
					id="login_email"
					placeholder="Enter email"
					ng-model="header_login_email">
			</div>
			<div class="form-group">
				<label class="sr-only" for="login_password">Password</label>
				<input
					type="password"
					class="form-control orange_border"
					id="login_password"
					placeholder="Password"
					ng-model="header_login_password">
			</div>
			<div class="form-group">
				<button
					type="submit"
					class="btn lblue"
					ng-click="headerLogin()">
					Sign in
				</button>
			</div>
		</form>
	</div>
	<div class="row">
		<p class="text-danger">{{alerts.message}}</p>
	</div>