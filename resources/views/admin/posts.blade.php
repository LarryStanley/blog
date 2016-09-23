@extends('layouts.admin')

@section('content')
<h2>文章總覽</h2>
<div id="posts">
	<div class="ui active inverted dimmer">
		<div class="ui text loader">載入文章中...</div>
	</div>
	<table class="ui very basic collapsing celled table" style="width: 100%">
		<thead>
			<tr>
				<th>標題</th>
				<th>內容</th>
				<th>最後編輯</th>
				<th>設定</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="post in posts">
				<td>@{{ post.title }}</td>
				<td>@{{{ post.content }}}</td>
				<td>@{{ post.updated_at }}</td>
				<td>
					<div class="ui simple dropdown">
						設定 <i class="dropdown icon"></i>
						<div class="menu">
							<a class="item" href="/admin/posts/edit/@{{ post.id }}">編輯</a>
							<div class="item" style="color: red" v-on:click="deletePost(post.id, $index)">刪除</div>
						</div>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	<a href="/admin/posts/new" class="ui right floated primary button">新增文章</a>
</div>
{{ csrf_field() }}
@endsection

@section('javascript')
<script>
	new Vue({
		el: '#posts',
		data: {
			posts: []
		},
		methods: {
			init: function() {
				var self = this;
				$.ajax({
					url: '/api/posts/',
					dataType: 'json',
					success: function(data) {
						self.posts = data;
						$(".dimmer").removeClass('active');
					}
				});
			},
			deletePost: function(id, index) {
				var self = this;
				$.ajax({
					url: '/admin/posts/' + id,
					type: 'DELETE',
					data: {
						"_token": $('input[name=_token]').val()
					},
					success: function(data) {
						self.posts.splice(index, 1);
					}
				});
			}
		},
		ready: function() {
			this.init();
		}
	})
</script>
@endsection