<a href="{{ url('20s-admin/logout') }}">Logout</a><br />
<a href="{{ url('20s-admin/register') }}">Register</a><br />
<a href="{{ route('admin.password.change', ['token' => Auth::guard('admin')->user()->remember_token]) }}">Change Password</a><br />