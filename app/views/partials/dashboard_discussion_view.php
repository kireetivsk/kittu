<div class="tab-content no-border no-padding" id="view">
	<div class="tab-pane in active">
		<? include(PARTIALS_DIR . '/dashboard_tabbable_header.php'); ?>

		<div class="row">
			<div class="col-xs-12 widget-container-span">
				<div class="widget-box">
					<div class="widget-header header-color-purple">
						<h5>
							<?= trans('general.my_discussions'); ?>
						</h5>
						<div class="widget-toolbar">
							<a href="#" data-action="reload">
								<i class="icon-refresh"></i>
							</a>
							<a href="#" data-action="collapse">
								<i class="icon-chevron-up"></i>
							</a>
						</div>
					</div>

					<div class="widget-body">
						<div class="widget-main">
							<div id="my_discussions"
								 class="accordion-style1 panel-group">
								<div class="row" ng-repeat="category in view_categories.mine">
									<div class="col-xs-12 widget-container-span">
										<div class="widget-box">
											<div class="widget-header header-color-default">
												<h5 class="infobox-black">
													<img src="" />
													{{category.title}}
													<span class="text-muted small">{{category.description}}</span>
													<span class="small text-muted"> ~ {{category.owner.display_name}}</span>

												</h5>

												<div class="widget-toolbar">
													<span><img src="{{category.owner.avatar}}" height="50px"/></span>
													<a href="#" data-action="collapse">
														<i class="icon-chevron-up"></i>
													</a>

												</div>
											</div>
											<div class="widget-body">
												<div class="widget-main">
													<div id="topic_accordion_{{topic.id}}"
														 class="accordion-style1 panel-group"
														 ng-repeat="topic in category.topics">
														<div class="panel panel-default">
															<div class="panel-heading">
																<h4 class="panel-title">
																	<a class="accordion-toggle collapsed"
																	   data-toggle="collapse"
																	   data-parent="#topic_accordion_{{topic.id}}"
																	   href="#topic_collapse_{{topic.id}}">
																		<i class="icon-angle-right bigger-110"
																		   data-icon-hide="icon-angle-down"
																		   data-icon-show="icon-angle-right"></i>
																		<span>
																			{{topic.owner.img}}
																		</span>
																		&nbsp;{{topic.name}}
																		<span class="badge badge-pink"
																			  ng-show="topic.new_count > 0">
																			{{topic.new_count}}
																		</span>
																		<span class="icon-muted small">
																			{{topic.description}}
																		</span>
																		<button type="button"
																				class="close"
																				ng-click="removeTopic(topic)">
																			<i class="icon-remove"></i>
																		</button>

																	</a>
																</h4>
															</div>

															<div class="panel-collapse collapse" id="topic_collapse_{{topic.id}}">
																<div class="panel-body">
																	<p class="alert alert-info"
																	   ng-repeat="post in topic.posts">
																		<button type="button"
																				class="close"
																				ng-click="removePost(post)">
																			<i class="icon-remove"></i>
																		</button>
																		<span>
																			{{post.owner.img}}
																		</span>

																		<strong>
																			<i class="icon-comments-alt"></i>
																		</strong>
																		<span class="text-warning">{{post.owner.name}}</span>
																		{{post.title}}
																		{{post.content}}
																	</p>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row" ng-show="view_categories.upline">
			<div class="col-xs-12 widget-container-span">
				<div class="widget-box">
					<div class="widget-header header-color-blue2">
						<h5>
							<?= trans('general.upline_discussions'); ?>
						</h5>
						<div class="widget-toolbar">
							<a href="#" data-action="reload">
								<i class="icon-refresh"></i>
							</a>
							<a href="#" data-action="collapse">
								<i class="icon-chevron-up"></i>
							</a>
						</div>
					</div>

					<div class="widget-body">
						<div class="widget-main">
							<div id="upline_discussions"
								 class="accordion-style1 panel-group">
								<div class="row" ng-repeat="category in view_categories.upline">
									<div class="col-xs-12 widget-container-span">
										<div class="widget-box">
											<div class="widget-header header-color-default">
												<h5 class="infobox-black">
													{{category.title}}
													<span class="text-muted small">{{category.description}}</span>
													<span class="small text-muted"> ~ {{category.owner.display_name}}</span>
												</h5>

												<div class="widget-toolbar">
													<span><img src="{{category.owner.avatar}}" height="50px"/></span>
													<a href="#" data-action="collapse">
														<i class="icon-chevron-up"></i>
													</a>

												</div>
											</div>
											<div class="widget-body">
												<div class="widget-main">
													<div id="topic_accordion_{{topic.id}}"
														 class="accordion-style1 panel-group"
														 ng-repeat="topic in category.topics">
														<div class="panel panel-default">
															<div class="panel-heading">
																<h4 class="panel-title">
																	<a class="accordion-toggle collapsed"
																	   data-toggle="collapse"
																	   data-parent="#topic_accordion_{{topic.id}}"
																	   href="#topic_collapse_{{topic.id}}">
																		<i class="icon-angle-right bigger-110"
																		   data-icon-hide="icon-angle-down"
																		   data-icon-show="icon-angle-right"></i>
																		<span>
																			{{topic.owner.img}}
																		</span>
																		&nbsp;{{topic.name}}
																		<span class="badge badge-pink"
																			  ng-show="topic.new_count > 0">
																			{{topic.new_count}}
																		</span>
																		<span class="icon-muted small">
																			{{topic.description}}
																		</span>
																		<button type="button"
																				class="close"
																				ng-click="removeTopic(topic)">
																			<i class="icon-remove"></i>
																		</button>

																	</a>
																</h4>
															</div>

															<div class="panel-collapse collapse" id="topic_collapse_{{topic.id}}">
																<div class="panel-body">
																	<p class="alert alert-info"
																	   ng-repeat="post in topic.posts">
																		<button type="button"
																				class="close"
																				ng-click="removePost(post)">
																			<i class="icon-remove"></i>
																		</button>
																		<span>
																			{{post.owner.img}}
																		</span>

																		<strong>
																			<i class="icon-comments-alt"></i>
																		</strong>
																		<span class="text-warning">{{post.owner.name}}</span>
																		{{post.title}}
																		{{post.content}}
																	</p>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row" ng-show="view_categories.downline">
			<div class="col-xs-12 widget-container-span">
				<div class="widget-box">
					<div class="widget-header header-color-orange">
						<h5>
							<?= trans('general.downline_discussions'); ?>
						</h5>
						<div class="widget-toolbar">
							<a href="#" data-action="reload">
								<i class="icon-refresh"></i>
							</a>
							<a href="#" data-action="collapse">
								<i class="icon-chevron-up"></i>
							</a>
						</div>
					</div>

					<div class="widget-body">
						<div class="widget-main">
							<div id="downline_discussions"
								 class="accordion-style1 panel-group">
								<div class="row" ng-repeat="category in view_categories.downline">
									<div class="col-xs-12 widget-container-span">
										<div class="widget-box">
											<div class="widget-header header-color-default">
												<h5 class="infobox-black">
													{{category.title}}
													<span class="text-muted small">{{category.description}}</span>
													<span class="small text-muted"> ~ {{category.owner.display_name}}</span>
												</h5>

												<div class="widget-toolbar">
													<span><img src="{{category.owner.avatar}}" height="50px"/></span>
													<a href="#" data-action="collapse">
														<i class="icon-chevron-up"></i>
													</a>

												</div>
											</div>
											<div class="widget-body">
												<div class="widget-main">
													<div id="topic_accordion_{{topic.id}}"
														 class="accordion-style1 panel-group"
														 ng-repeat="topic in category.topics">
														<div class="panel panel-default">
															<div class="panel-heading">
																<h4 class="panel-title">
																	<a class="accordion-toggle collapsed"
																	   data-toggle="collapse"
																	   data-parent="#topic_accordion_{{topic.id}}"
																	   href="#topic_collapse_{{topic.id}}">
																		<i class="icon-angle-right bigger-110"
																		   data-icon-hide="icon-angle-down"
																		   data-icon-show="icon-angle-right"></i>
																		<span>
																			{{topic.owner.img}}
																		</span>
																		&nbsp;{{topic.name}}
																		<span class="badge badge-pink"
																			  ng-show="topic.new_count > 0">
																			{{topic.new_count}}
																		</span>
																		<span class="icon-muted small">
																			{{topic.description}}
																		</span>
																		<button type="button"
																				class="close"
																				ng-click="removeTopic(topic)">
																			<i class="icon-remove"></i>
																		</button>

																	</a>
																</h4>
															</div>

															<div class="panel-collapse collapse" id="topic_collapse_{{topic.id}}">
																<div class="panel-body">
																	<p class="alert alert-info"
																	   ng-repeat="post in topic.posts">
																		<button type="button"
																				class="close"
																				ng-click="removePost(post)">
																			<i class="icon-remove"></i>
																		</button>
																		<span>
																			{{post.owner.img}}
																		</span>

																		<strong>
																			<i class="icon-comments-alt"></i>
																		</strong>
																		<span class="text-warning">{{post.owner.name}}</span>
																		{{post.title}}
																		{{post.content}}
																	</p>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.tab-pane -->
</div>