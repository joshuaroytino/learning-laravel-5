<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="{{ elixir('css/stylesheet.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="{{ elixir('js/scripts-ie.js') }}"></script>
	<![endif]-->
</head>
<body>
    @include('partials._nav')

    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>
	<!-- Scripts -->
	<script src="{{ elixir('js/script.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('div.alert').not('.alert-important').delay(3000).slideUp(300);
        });
    </script>
    @yield('footer')
</body>
</html>
