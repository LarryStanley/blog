<!DOCTYPE html>
<html lang="zh-tw">
<head>
	<meta charset="UTF-8">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.4/semantic.min.css"/>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

	@yield('header')

</head>
<body>
	<div class="ui container" style="margin-top:10px">
		<h1>設定與管理</h1>
		<div class="ui grid">
			<div class="four wide column">
				<div class="ui vertical fluid tabular menu">
					<a href="/admin" class="active item">
						總結
					</a>
					<div class="ui dropdown item">
						<i class="dropdown icon"></i>
						文章
						<div class="menu">
							<a href="/admin/posts" class="item">文章總覽</a>
							<a href="/admin/posts/new" class="item">新增文章</a>
						</div>
					</div>
					<a href="/admin/navigation" class="item">
						選單管理
					</a>
					<div class="ui dropdown item">
						<i class="dropdown icon"></i>
						檔案
						<div class="menu">
							<a href="/admin/files" class="item">檔案總覽</a>
							<a href="/admin/files/new" class="item">新增檔案</a>
						</div>
					</div>
					<div class="ui dropdown item">
						<i class="dropdown icon"></i>
						使用者
						<div class="menu">
							<a href="/admin/files" class="item">使用者總覽</a>
							<a href="/admin/files/new" class="item">新增使用者</a>
						</div>
					</div>
				</div>
			</div>
			<div class="twelve wide stretched column">
				<div class="ui segment">
			    @yield('content')
				</div>
			</div>
		</div>
			</div>
	<script src="/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.4/semantic.min.js"></script>
    <script>
    	$(document).ready(function() {
    		$('.ui.dropdown').dropdown();
			$('.ui.checkbox').checkbox();
    	});
    </script>
    @yield('javascript')
</body>
</html>