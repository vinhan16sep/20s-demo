<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>20S Management</title>
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