					</div><!-- /.page-content -->
				</div><!-- /.main-content -->
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='//code.jquery.com/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
		<script type="text/javascript">
			window.jQuery || document.write("<script src='//code.jquery.com/jquery-1.10.2.min.js'>"+"<"+"/script>");
		</script>
		<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?= JS_DIR; ?>/ace/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
        <script src="<?= JS_DIR; ?>/ace/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->
		<?php
			//load dynamic controller defined files here - javascript
			if (isset($files->js)) {
				foreach ($files->js as $value) {
					$js_file = JS_DIR . $value;
					?>
					<script src='<?= $js_file; ?>'></script>
				<?php
				}
			}
		?>

		<!-- ace scripts -->
		<?php if (App::environment('local')): ?>
			<script src="<?= JS_DIR; ?>/ace/ace-elements.min.js"></script>
			<script src="<?= JS_DIR; ?>/ace/ace.min.js"></script>
		<?php else : ?>
			<script src="<?= JS_DIR; ?>/ace/ace-elements.js"></script>
			<script src="<?= JS_DIR; ?>/ace/ace.js"></script>
		<?php endif ; ?>


		<!-- inline scripts related to this page -->

	</body>
</html>
