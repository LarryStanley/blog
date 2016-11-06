@extends('layouts.admin')

@section('header')
<link rel="stylesheet" type="text/css" href="/css/simditor.css" />
@endsection

@section('content')
<div class="ui active inverted dimmer">
	<div class="ui text loader">載入中...</div>
</div>
<div id="files">
	{{ csrf_field() }}
	<h2>檔案總覽</h2>
	<table class="ui table">
		<thead>
			<th>檔案名稱</th>
			<th>上傳時間</th>
			<th>下載</th>
			<th>刪除</th>
		</thead>
		<tbody>
			<tr v-for="file in files">
				<td>@{{ file.file_name }}</td>
				<td>@{{ file.created_at }}</td>
				<td><a href="/api/files/@{{ file.file_name }}">下載</a></td>
				<td><a style="color: red" v-on:click="deleteFile(file.id)">刪除</a></td>
			</tr>		
		</tbody>
	</table>
	<a href="/admin/files/new" class="ui button primary right floated">新增檔案</a>
</div>
@endsection

@section('javascript')
<script>
	$(document).ready(function() {
		new Vue({
			el: '#files',
			data: {
				files: []
			},
			methods: {
				init: function() {
					var self = this;
					$.ajax({
						url: '/api/files',
						dataType: 'json',
						success: function(data) {
							self.files = data;
							$(".dimmer").removeClass("active");
						}
					})
				},
				deleteFile: function(id) {
					var self = this;
					$(".dimmer").addClass("active");
					$.ajax({
						url: '/admin/files/' + id ,
						dataType: 'json',
						method: "DELETE",
						data: {
							"_token": $('input[name=_token]').val()
						},
						success: function(data) {
							self.files = data.files;
							$(".dimmer").removeClass("active");
						}
					})
				}
			},
			ready: function() {
				this.init();
			}
		});
	});
</script>
@endsection
