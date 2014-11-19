<div class="row" ng-show="view_categories.upline">
	<div class="col-xs-12 widget-container-span">
		<div class="widget-box">
			<div class="widget-header header-color-blue2">
				<h5>
					<?= trans('general.upline_discussions'); ?>
				</h5>
				<div class="widget-toolbar">
					<a href="#" data-action="reload" ng-click="reload()">
						<i class="icon-refresh"></i>
					</a>
					<a href="#" data-action="collapse">
						<i class="icon-chevron-up"></i>
					</a>
				</div>
			</div>

			<div class="widget-body">
				<div class="widget-main row">
					<div id="my_discussions"
						 class="accordion-style1 panel-group" ng-class="upShowPosts == true ? 'col-md-4' : 'col-xs-12'">
						<!--categories-->
						<div class="row" ng-repeat="category in view_categories.upline">
							<div class="col-xs-12 widget-container-span">
								<div class="widget-box">
									<div class="widget-header header-color-default">
										<h5 class="infobox-black">
											<a href="#" data-action="collapse">
												<i class="icon-chevron-up"></i>
											</a>
											{{category.title}}
											<span class="text-muted small">
												{{category.description}}
											</span>
											<span class="text-muted small">
												~ By {{category.owner.display_name}}
											</span>
											<span class="widget-toolbar">
												<img src="{{category.owner.avatar}}" height="40px" />
											</span>

										</h5>
									</div>
									<!--topics-->
									<div class="widget-body">
										<div class="widget-main topic-body">
											<div class="accordion-style1 panel-group"
												 ng-repeat="topic in category.discussion_topic">
												<div class="panel panel-default"
													 ng-click="topicClick(topic, 'up'); topic.new_count = 0"
													 ng-class="up_topic.id == topic.id ? 'topic-selected' : ''">
													<div class="panel-heading">
														<div class="panel-title row pointer">
															<div class="col-xs-12">
																<div class="accordion-toggle collapsed">
																	<i class="icon-angle-right bigger-110"
																	   data-icon-hide="icon-angle-down"></i>
																	<span class="badge badge-pink"
																		  ng-show="topic.new_count > 0">
																		{{topic.new_count}}
																	</span>
																	&nbsp;{{topic.title}}
																	<span class="text-muted small">
																		{{topic.description}}
																	</span>
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
					<!--posts section-->
					<div class="col-md-8" ng-show="upShowPosts">
						<!--post header-->
						<div class="row">
							<div class="col-xs-12">
								<h5><?= trans('general.posts_in');?> {{up_topic.title}}</h5>
								<div>
									<button class="btn btn-danger btn-sm"
											ng-click="closePosts('up')">
										<?= trans('general.close');?>
									</button>
									<button class="btn btn-success btn-sm"
											ng-click="show_add_post = !show_add_post">
										<?= trans('general.add_post');?>
									</button>
								</div>
							</div>
						</div>
						<!--post alert-->
						<div class="alert alert-{{post_alert.type}}"
							 role="alert"
							 ng-show="post_alert">
							{{post_alert.message}}
						</div>
						<!--post add form-->
						<div class="row spacer" ng-show="show_add_post">
							<div class="col-md-12">
								<div class="alert alert-block alert-success">
									<div class="row">
										<div class="col-md-12">
											<h5><?= trans('general.add_post'); ?></h5>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-5">
											<label class="sr-only"
												   for="add_post_title">
												<?= trans('general.title'); ?>
											</label>
											<input
												type="text"
												id="add_post_title"
												ng-required="true"
												class="form-control full"
												placeholder="<?= trans('general.title'); ?>"
												ng-model="new_post.title"
												ng-readonly="readonly">
										</div>
										<div class="form-group col-sm-5">
											<label class="sr-only"
												   for="add_post_content">
												<?= trans('general.post_content'); ?>
											</label>
											<textarea id="add_post_content"
													  class="form-control full"
													  ng-required="true"
													  placeholder="<?= trans('general.post_content'); ?>"
													  ng-model="new_post.content"
													  ng-readonly="readonly"></textarea>
										</div>
										<div class="col-sm-2">
											<button
												type="submit"
												class="btn btn-info btn-sm"
												ng-click="addPost('up')"
												><?= trans('general.add'); ?>
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--no post message-->
						<div ng-hide="up_topic.discussion_post">
							<h4><?= trans('general.no_posts');?></h4>
						</div>
						<!--posts-->
						<div class="row">
							<div class="col-xs-12" ng-repeat="post in up_topic.discussion_post">
								<div class="post-body">
									<div class="row spacer-top">
										<!--post meta data-->
										<div class="col-xs-4 col-md-2">
											<div class="post-menu well">
												<div class="row">
													<img class="col-xs-12" src="{{post.owner.avatar}}" />
												</div>
												<div class="row">
													<div class="col-xs-12">
														{{post.owner.display_name}}
													</div>
												</div>
												<div class="row">
													<div class="col-xs-12">
														{{post.timestamp}}
													</div>
												</div>
												<div class="row" ng-show="user.id == post.owner.user_id">
													<div class="col-xs-12">
														<i class="blue icon-edit pointer"
														   ng-click="show_edit_post = !show_edit_post"
														   title="<?= trans('general.edit');?>"></i>
														&nbsp;
														<i class="red icon-trash pointer"
														   ng-click="deletePost(post, $index, 'up')"
														   title="<?= trans('general.delete');?>"></i></div>
												</div>
												<span class="badge badge-pink"
													  ng-show="post.new_count > 0">
													{{post.new_count}} new comments
												</span>

											</div>
										</div>
										<!--post content-->
										<div class="col-xs-8 col-md-10">
											<div>
												<p class="post-title" ng-hide="show_edit_post">
													{{post.title}}
												</p>
												<span ng-show="show_edit_post" class="form-group">
													<label for="edit_post_title_{{post.id}}">
														<?= trans('general.post_title'); ?>
													</label>
													<br />
													<input
														type="text"
														id="edit_post_title_{{post.id}}"
														placeholder="<?= trans('general.post_title'); ?>"
														ng-model="post.new_title"
														ng-readonly="readonly">
												</span>
											</div>

											<div class="post-content" ng-hide="show_edit_post">
												{{post.content}}
											</div>
											<div>
												<span ng-show="show_edit_post" class="form-group">
													<label for="edit_post_content_{{post.id}}">
														<?= trans('general.post_content'); ?>
													</label>
													<br />
													<textarea id="edit_post_content_{{post.id}}"
															  placeholder="<?= trans('general.post_content'); ?>"
															  ng-model="post.new_content"
															  ng-readonly="readonly"></textarea>

												</span>
												<br />
												<button class="btn btn-info btn-sm"
														id="edit_post_save_{{post.id}}"
														ng-click="editPost(post, $index, 'up'); show_edit_post = false"
														ng-show="show_edit_post">
													<?= trans('general.save'); ?>
												</button>
												<label for="edit_post_cancel_{{post.id}}">&nbsp;</label>
												<button class="btn btn-warning btn-sm"
														id="edit_post_cancel_{{post.id}}"
														ng-click="show_edit_post = false"
														ng-show="show_edit_post">
													<?= trans('general.cancel'); ?>
												</button>
											</div>
										</div>
									</div>
									<!--comments-->
									<div class="row">
										<hr class="width-95" />
										<div class="col-xs-12">
											<p>
												<span class="badge badge-pink"
													  ng-show="comment.new_count > 0">
													{{comment.new_count}}
												</span>
												<?= trans('general.comments');?></p>
											<div class="alert alert-{{comment_alert.type}}"
												 role="alert"
												 ng-show="comment_alert">
												{{comment_alert.message}}
											</div>

											<div class="row comment-spacer"
												 ng-repeat="comment in post.discussion_comment">
												<div class="col-xs-4 col-sm-2">
													<div class="comment-avatar">
														<img class="img-responsive"
															 src="{{comment.owner.avatar}}" />
													</div>
												</div>
												<div class="col-xs-8 col-sm-10"
												<p class="text-info">{{comment.owner.display_name}} ~ {{comment.timestamp}}</p>
												<p>
													{{comment.content}}
													<span class="close"
														  ng-click="deleteComment(comment, $parent.$index, $index, 'up')"
														  ng-show="user.id == post.owner.user_id">
														<i class="icon-remove"></i>
													</span>
												</p>
											</div>
										</div>
									</div>
								</div>
								<!--comment add form-->
								<div class="row">
									<div class="col-xs-4 col-sm-2">
										&nbsp;
									</div>
									<div class="form-group col-xs-8 col-sm-10">
										<label for="comment_{{comment.id}}" class="sr-only">
											<?= trans('general.leave_comment'); ?>
										</label>
										<input
											type="text"
											class="form-control full"
											placeholder="<?= trans('general.leave_comment'); ?>"
											ng-model="post.new_comment"
											ng-readonly="readonly">
										<button class="btn btn-info btn-sm"
												ng-click="addComment(post)" ng-disabled="!post.new_comment">
											<?= trans('general.comment'); ?>
										</button>
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