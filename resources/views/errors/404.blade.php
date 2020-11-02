<!DOCTYPE html>
<html>
<head>
	<title>404 Page Not Found Error</title>
	<link href="{{ asset('css/lib/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('css/lib/font-awesome.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/lib/jquery.bxslider.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/lib/marpad.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/app.min.css') }}" rel="stylesheet">
	<script src="{{ asset('js/lib/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/lib/bootstrap.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/lib/jquery.bxslider.js') }}"></script>
	<link href="{{ asset('css/lib/jquery.fancybox.css') }}" rel="stylesheet" />
	<script src="{{ asset('js/lib/jquery.fancybox.js') }}"></script>
	<script src="{{ asset('js/lib/modernizr.custom.js') }}"></script>
	<link href="{{ asset('css/lib/dl-menu.css') }}" rel="stylesheet" />
	<script src="{{ asset('js/lib/jquery.dlmenu.js') }}"></script>
	<script src="{{ asset('js/js.js') }}"></script>
</head>
<body>
	<div class="container">
		<div class="row center-block">
			<img class="img-responsive" src="{{ asset('images/404.jpg') }}" >
		</div>

	</div>
</body>
</html>
<script type="text/javascript">

	function yenile(time) {
		setInterval(function(){ window.location="{{ asset('/tr') }}"; }, time);
	}

	$(function () {

		// yenile(2000);

	});

</script>