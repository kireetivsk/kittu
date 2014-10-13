		    </div><!-- #main_container .container_12 -->
        </div>
		<div id="footer" class="navbar " ng-controller="footer" ng-cloak>
            <div class="row">
                <div class="col-sm-4 col-sm-push-4">
                    <p class="text-center">Looking for a direct sales company?</p>
					<p class="text-center"> We can help you find the right team for you.</p>
                    <div class="center-block">
						<div class="input-group">
							<input
								type			= "email"
								class			= "form-control orange_border"
								id				= "footer_email"
								placeholder		= "Enter your email address"
								ng-model		= "footer_email">
							<span class="input-group-btn">
								<button
									type="submit"
									class="btn lblue"
									ng-click="saveFooterEmail()">
									Submit
								</button>
							</span>
						</div><!-- /input-group -->
						<div class="alert alert-{{alerts.type}} alert-dismissible spacer-top" role="alert" ng-show="alerts">{{alerts.message}}</div>
                    </div>
                </div>
            </div>

            <div class="row space-50">
			</div>
            <div class="row text-center">
                <p class="footer-links">
					<a href="/features">Features</a> |
					<a href="/plans">Plans</a> |
					<a href="/company">Company</a> |
					<a href="/about">About</a> |
					<a href="/privacy">Privacy</a> |
					<a href="/terms">Terms</a>
				</p>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
					<a href="https://www.facebook.com/DirectSalesKit" target="_blank"><img src="/img/facebook.png"></a>
					<a href="https://twitter.com/DirectSalesKit" target="_blank"><img src="/img/twitter.png"></a>
                </div>
            </div>
            <div class="row space-50">
            </div>
            <div class="row-fluid text-center">
                <div class="col-sm-4 col-sm-push-4">
                    <p class="footer-links">&copy; 2013 DirectSalesKit.com</p>
                </div>
			</div>
		</div>

<?php
/* End of file footer.php */
/* Location: ./application/views/templates/footer.php */