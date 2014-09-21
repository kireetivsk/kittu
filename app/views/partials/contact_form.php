<form class="form-horizontal" role="form">
	<fieldset>
		<!-- Name input-->
		<div class="form-group">
			<label class="col-md-3 control-label" for="name">Name</label>
			<div class="col-md-9">
				<input
					id="name"
					name="name"
					type="text"
					placeholder="Your name"
					class="form-control"
					ng-model="contact_name">
			</div>
		</div>

		<!-- Email input-->
		<div class="form-group">
			<label class="col-md-3 control-label" for="email">Your E-mail</label>
			<div class="col-md-9">
				<input
					id="email"
					class="form-control"
					type="email"
					id="email"
					placeholder="Your email"
					ng-model="contact_email">
			</div>
		</div>

		<!-- Message body -->
		<div class="form-group">
			<label class="col-md-3 control-label" for="message">Your message</label>
			<div class="col-md-9">
				<textarea
					class="form-control"
					id="message"
					name="message"
					placeholder="Please enter your message here..."
					rows="5"
					ng-model="contact_message"></textarea>
			</div>
		</div>

		<!-- Form actions -->
		<div class="form-group">
			<div class="col-md-12 text-right">
				<button
					type="submit"
					class="btn blue"
					ng-click="saveContactForm()">
					Submit
				</button>
			</div>
		</div>
	</fieldset>
</form>
<div
	class="alert alert-{{alert.type}}"
	role="alert"
	ng-repeat="alert in alerts"
	ng-show="alerts">
	{{alert.message}}
</div>
