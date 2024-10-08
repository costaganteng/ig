<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title --}}
    <title>{{ config('app.name', 'Instagram') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
		<style>
			.container-login100 {
				display: flex;
				justify-content: center;
				align-items: center;
				min-height: 100vh;
				background-color: #f2f2f2;
			}
			.login100-form-title {
				text-align: center;
				margin-bottom: 20px;
			}
		</style>
</head>
<body>
    <div class="limiter">
		<div class="container-login100">


					@yield('form')

			</div>
		</div>
	</div>

	<script>

		document.querySelector('.login100-form').addEventListener('submit', function(e){
			var error = document.querySelector('.is-invalid');
			if(error) hideLoading();
			showLoading();
		})

		function showLoading() {
			document.querySelector('.spinner-border').classList.remove('d-none')
		}

		function hideLoading() {
			document.querySelector('.spinner-border').classList.add('d-none')
		}

	</script>
</body>
</html>
