<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>20S Management</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="{{asset('public/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{asset('public/bower_components/font-awesome/css/font-awesome.min.css')}}">
	{{--<!-- Ionicons -->--}}
	<link rel="stylesheet" href="{{asset("public/bower_components/Ionicons/css/ionicons.min.css")}}">
	{{--<!-- Theme style -->--}}
	<link rel="stylesheet" href="{{asset("public/dist/css/AdminLTE.min.css")}}">
	{{--<!-- AdminLTE Skins. Choose a skin from the css/skins--}}
         {{--folder instead of downloading all of them to reduce the load. -->--}}
	<link rel="stylesheet" href="{{asset("public/dist/css/skins/_all-skins.min.css")}}">
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,700,700i" rel="stylesheet">

	<!-- Library JS called-->
	<!-- jQuery 3 -->
	<script src="{{asset("public/bower_components/jquery/dist/jquery.min.js")}}"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="{{asset("public/bower_components/bootstrap/dist/js/bootstrap.min.js")}}"></script>
</head>
<body>
	<div class="wrapper">
		@include('admin.layouts.header')
	    <!-- Sidebar -->
	    @include('admin.layouts.sidebar')
	    @yield('content')
	    <!-- /.content-wrapper -->
	    <!-- Footer -->
	    @include('admin.layouts.footer')
	    <!-- ./wrapper -->
	</div>
</body>
</html>