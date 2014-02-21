@include ('users.sidebar')
<h1>Edit User</h1>

{{ Form::model($user, ['url' => 'admin/users/edit/' . $user->id]) }}
	<div>{{ Form::label('username', 'Username:') }}</div>
	<div>{{ Form::text('username') }}</div>
	<div>&nbsp;</div>
	{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif
