@extends('layouts.admin')

@section('content')
{{ csrf_field() }}
<h2>選單管理</h2>
<div id="navigations">
	<div class="ui inverted active dimmer">
		<div class="ui text loader">載入中...</div>
	</div>
	<div class="ui styled accordion">
		<div v-for="(index, nav) in navs">
			<div class="title">
				<i class="dropdown icon"></i>
				@{{ nav.title }}
			</div>
			<div class="content">
				<a class="ui label"  v-for="(key, sub_nav) in nav.sub_navigation">
					@{{ sub_nav.title }}
					<i class="delete icon" v-on:click="deleteSubNav(sub_nav.id, sub_nav.parent_id, index, key)"></i>
				</a>
				<div class="actions" style="margin-top: 5px;">
					<button class="ui mini button primary">新增子選單</button>
					<button class="ui mini button red" v-on:click='deleteNav(nav.id)' >刪除選單</button>
					
				</div>
			</div>
		</div>
	</div>
	<br>
	<button class="ui button primary right floated" id="newNavigationButton">新增選單</button>
	<div class="ui modal" id="newNavigationModal">
		<div class="ui inverted dimmer">
			<div class="ui text loader">新增中...</div>
		</div>
		<div class="header">新增選單</div>
		<div class="content">
			<form action="" class="ui form" mehtod="POST" id="newNavForm">
				<div class="field" id="posts">
					<label>標題</label>
					<div class="ui selection dropdown" id="navSection">
						<input type="hidden" name="title">
						<i class="dropdown icon"></i>
						<div class="default text">標題</div>
						<div class="menu">
							<div class="item" v-for="post in posts" data-value="@{{ post.id }}">
								@{{ post.title }}
							</div>
						</div>
					</div>
				</div>
				<div class="inline field">
					<div class="ui toggle checkbox" id="subNavCheckbox">
						<input type="checkbox" tabindex="0" class="hidden" name="sub_nav">
						<label>有子選單</label>
					</div>
				</div>
				<div class="field" style="display: none" id="subNavSection">
					<h4>新增子選單</h4>
					<a class="ui label" v-for="sub_nav in sub_navs">
						@{{ sub_nav.title }}
						<i class="delete icon" v-on:click="deleteNewSubNav($index)"></i>
					</a>
					<div class="two fields" style="margin-top: 5px;">
						<div class="field">
							<div class="ui selection dropdown">
								<input type="hidden" name="title">
								<i class="dropdown icon"></i>
								<div class="default text">標題</div>
								<div class="menu">
									<div class="item" v-for="post in posts" data-value="@{{ post.id }}">
										@{{ post.title }}
									</div>
								</div>
							</div>
						</div>
						<div class="field">
							<button class="ui button primary" v-on:click="newSubNav">新增子選單</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="actions">
			<div class="ui button cancel">取消</div>
			<div class="ui button primary" v-on:click="saveNav">新增</div>
		</div>
	</div>
</div>
@endsection

@section('javascript')
<script>
	$(document).ready(function() {
		$('.ui.checkbox').checkbox();
		$("#newNavigationButton").click(function() {
			$("#newNavigationModal").modal("show");
		});

		$("#newNavForm").submit(function() {
			return false;
		});

		new Vue({
			el: '#navigations',
			data: {
				posts: [],
				sub_navs: [],
				navs: []
			},
			methods: {
				init: function() {
					var self = this;
					$.ajax({
						url: '/api/posts/',
						dataType: 'json',
						success: function(data) {
							self.posts = data;
							$('select.dropdown').dropdown();
						}
					});

					$.ajax({
						url: '/api/navigation',
						dataType: 'json',
						success: function(data) {
							self.navs = data;
							$('.ui.accordion').accordion();
							$("#navigations .dimmer").removeClass("active");
						}
					});
				},
				newSubNav: function() {
					this.sub_navs.push({
						title: $("#subNavSection .dropdown .text").text(),
						id: $("#subNavSection input[name=title]").val()
					});
				},
				deleteNav: function(id) {
					var self = this;
					$("#navigations").addClass("active");
					$.ajax({
						url: '/admin/navigation/' + id,
						dataType: 'json',
						method: "DELETE",
						data: {
							"_token": $('input[name=_token]').val()
						},
						success: function(data) {
							self.navs = data.navigation;
							$('.ui.accordion').accordion("refresh");
							$("#navigations .dimmer").removeClass("active");
						}
					});
				},
				deleteNewSubNav: function(index) {
					this.sub_navs.splice(index, 1);
				},
				deleteSubNav: function(id, parent_id, index, key) {
					var self = this;
					$("#navigations .dimmer").addClass("active");
					$.ajax({
						url: '/admin/navigation/sub_navigation/' + id,
						dataType: 'json',
						method: "DELETE",
						data: {
							"_token": $('input[name=_token]').val()
						},
						success: function(data) {
							self.navs[index].sub_navigation.splice(key, 1);
							$("#navigations .dimmer").removeClass("active");
						}
					});
				},
				saveNav: function() {
					var self = this;
					$('#newNavigationButton .dimmer').addClass("active");
					var sub_nav = 0;
					if ($("#subNavCheckbox").hasClass("checked"))
						sub_nav = 1;
					$.ajax({
						url: '/admin/navigation',
						method: "POST",
						dataType: 'json',
						data: {
							"_token": $('input[name=_token]').val(),
							"title": $('#navSection .text').text(),
							"url": "/posts/" + $("#navSection input[name=title]").val(),
							"sub_nav": sub_nav

						},
						success: function(data) {
							if (sub_nav) {
								$.ajax({
									url: '/admin/navigation/sub_navigation/' + data.navigation.id,
									method: "POST",
									dataType: 'json',
									data: {
										"_token": $('input[name=_token]').val(),
										"posts": self.sub_navs
									},success: function(response) {
										self.navs.push(response.navigation);
										$('.ui.accordion').accordion('refresh');
										$("#newNavigationModal").modal("hide");
										$('#newNavigationButton .dimmer').removeClass("active");
									}
								});
							} else {
								self.navs.push(data.navigation);
								$('.ui.accordion').accordion('refresh');
								$("#newNavigationModal").modal("hide");
								$('#newNavigationButton .dimmer').removeClass("active");
							}
						}
					});
				}
			},
			ready: function() {
				this.init();
			}
		});

		$("#subNavCheckbox").checkbox().first().checkbox({
			onChecked: function() {
				$("#subNavSection").show();
			},
			onUnchecked: function() {
				$("#subNavSection").hide();
			}
		});
	});
</script>
@endsection