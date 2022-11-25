<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>개발자 김민서 블로그</title>

	@vite('resources/css/app.css')
	@vite('resources/js/app.js')
</head>
<body>
	<div class="md:container mx-auto px-4 h-screen">
		<div id="app">
			<router-view></router-view>
		</div>
	</div>
</body>
</html>