@extends('layouts.admin')

@section('header')
<link rel="stylesheet" type="text/css" href="/css/simditor.css" />
@endsection

@section('content')
<h2>新增文章</h2>
<form action="/admin/posts/new" class="ui form" method="POST" id="post">
    {{ csrf_field() }}
    <div class="ui inverted dimmer">
		<div class="ui text loader">儲存中...</div>
	</div>
	<div class="field">
		<label>標題</label>
		@if($post)
			<input type="text" name="title" placeholder="標題" value="{{ $post->title }}">
		@else
			<input type="text" name="title" placeholder="標題">
		@endif
	</div>
	<div class="field">
		<label>內容</label>
		@if($post)
			<textarea rows="20" name="content" id="content">
				{{ $post->content }}
			</textarea>
		@else
			<textarea rows="20" name="content" id="content"></textarea>
		@endif
	</div>
	<button class="ui right floated primary button" type="submit">儲存</button>
	<a href="/admin/posts" class="ui right floated button">取消</a>
</form>
@endsection

@section('javascript')
<script type="text/javascript" src="/js/module.min.js"></script>
<script type="text/javascript" src="/js/hotkeys.min.js"></script>
<script type="text/javascript" src="/js/uploader.min.js"></script>
<script type="text/javascript" src="/js/simditor.min.js"></script>
<script>
	$(document).ready(function() {
		var editor = new Simditor({
			textarea: $('#content')
		});
		$('#post').submit(function() {
			if ($("#post").form('is valid')) {
				$(".dimmer").addClass('active');
				@if($post)
					var url = '/admin/posts/edit/{{ $post->id }}';
				@else
					var url = '/admin/posts/new';
				@endif
				$.ajax({
					url: url,
					type: 'POST',
					data: $("#post").serialize(),
					success: function(data) {
						console.log(data);
						$(".dimmer").removeClass('active');
						window.location = "/admin/posts";
					}
				});
				
			}
			return false;
		});

		$('#post').form({
			fields: {
				title: "empty"
			}
		})
	});

</script>
@endsection
