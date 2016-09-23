@extends('layouts.admin')

@section('header')
<link rel="stylesheet" type="text/css" href="/css/simditor.css" />
@endsection

@section('content')
<h2>新增檔案</h2>
<form action="" class="ui form">
	<input id="fileupload" type="file" name="files" data-url="/admin/files/new" multiple>
	{{ csrf_field() }}
</form>
<div class="ui progress" data-percent="0" id="progress" style="display: none">
	<div class="bar">
		<div class="progress"></div>
	</div>
	<div class="label">檔案上傳中...</div>
</div>
<table class="ui table" style="display: none">
	<thead>
		<th>檔案名稱</th>
		<th>狀態</th>
		<th>下載</th>
	</thead>
	<tbody>
		
	</tbody>
</table>
@endsection

@section('javascript')
<script src="/js/vendor/jquery.ui.widget.js"></script>
<script src="/js/jquery.iframe-transport.js"></script>
<script src="/js/jquery.fileupload.js"></script>
<script>
	$(document).ready(function() {
		$('#progress').progress();
		$('#fileupload').fileupload({
			dataType: 'json',
			done: function (e, data) {
				var result = "<tr><td>" + data.result.file.name + "</td><td>已上傳</td><td><a href='/api/files/" + data.result.file.name + "'>下載</a></td></tr>";
				$('.segment table tbody').append(result);
				$(".table").show();
				$("#progress .label").html("上傳完畢");
			},
			add: function (e, data) {
				$("#progress").show();
				$("#progress .label").html("檔案上傳中...");
				$('#progress').progress({
					percent: 0
				});
				data.submit();
			},
			progressall: function (e, data) {
				var progress = parseInt(data.loaded / data.total * 100, 10);
				$('#progress').progress({
					percent: progress
				});
			}
		});
	});

</script>
@endsection
