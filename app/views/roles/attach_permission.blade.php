@include ('roles.sidebar')
<h1>Attach permission to {{ $role->name }}</h1>

{{ Form::model($role, ['url' => 'admin/roles/attach_permission/' . $role->id]) }}
	<div>{{ Form::label('permissions', 'permissions:') }}</div>
	<div>{{ Form::select('permissions', $permissionsList) }}</div>
	<div>&nbsp;</div>
	{{ Form::submit('Attach', array('class' => 'btn btn-info')) }}
{{ Form::close() }}
@if (count($myPermissions))
	<table class="table table-bordered table-striped">
	<tr>
		<th>{{$role->name}} has these permissions</th><th>Actions</th>
	</tr>
	@foreach ($myPermissions as $permission)
		<tr>
			<td>{{ $permission->name }} : {{ $permission->method }}</td><td>{{ HTML::link('/admin/roles/revoke_permission/' . $role->id . '/' . $permission->id, 'Revoke', ['class' => 'btn btn-primary btn-sm']) }}</td>
		</tr>
	@endforeach
	</table>
@endif

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif
