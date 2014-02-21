@section('sidebar')
@if (Request::is('admin/*'))
	<div class="list-group">
		{{ HTML::clever_link('admin/dashboard', 'Dashboard') }}
		{{ HTML::clever_link('admin/users', 'Users') }}
		{{ HTML::clever_link('admin/permissions', 'Permissions') }}
		{{ HTML::clever_link('admin/roles', 'Roles') }}
	</div>
@endif

<div class="panel panel-default">
  <div class="panel-heading">Beard Face</div>
  <div class="panel-body">
    It's beard facè damnit!
  </div>
</div>
@show
