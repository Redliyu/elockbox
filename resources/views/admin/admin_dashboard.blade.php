Admin dashboard page!
<a href="{{ url('admin_logout') }}">Logout</a>
<a href="{{ url('create') }}">Create User</a>
<?php //if($user = Sentinel::check()) {
//    dd($user);
//}
$user = Sentinel::getUser();
?>


