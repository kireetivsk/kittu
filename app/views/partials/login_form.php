			<form class="form-signin form-style"
				  role="form"
				  ng-submit="login()">
				<h2 class="form-signin-heading text-center">
					Login
				</h2>
				<input type="text"
					   class="form-control text-field"
					   placeholder="Email address"
					   ng-model="email"
					   required
					   autofocus>
				<input type="password"
					   class="form-control  text-field"
					   placeholder="Password"
					   ng-model="password"
					   required>

				<button class="btn orange full"
						type="submit"
						ng-disabled="isDisabled"
						ng-click="login()">
					Login
				</button>
			</form>
            <p class="text-center small"><a href="<?= base_url(); ?>/forgot">Forgot Password</a></p>