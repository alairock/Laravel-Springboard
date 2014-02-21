@include ('users.sidebar')
<h1>Attach Role to {{ $user->username }}</h1>

{{ Form::model($user, ['url' => 'admin/users/attach_role/' . $user->id]) }}
	<div>{{ Form::label('roles', 'Roles:') }}</div>
	<div>{{ Form::select('roles', $rolesList) }}</div>
	<div>&nbsp;</div>
	{{ Form::submit('Attach', array('class' => 'btn btn-info')) }}
{{ Form::close() }}
@if (count($myRoles))
	<table class="table table-bordered table-striped">
	<tr>
		<th>{{$user->username}} has these roles</th><th>Actions</th>
	</tr>
	@foreach ($myRoles as $role)
		<tr>
			<td>{{ $role->name }}</td><td>{{ HTML::link('/admin/users/revoke_role/' . $user->id . '/' . $role->id, 'Revoke', ['class' => 'btn btn-primary btn-sm']) }}</td>
		</tr>
	@endforeach
	</table>
@endif

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif
