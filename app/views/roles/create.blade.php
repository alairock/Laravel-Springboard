@include ('roles.sidebar')
<h1>Create Role</h1>

{{ Form::open(['url' => 'admin/roles/store']) }}
            <div>{{ Form::label('name', 'Name:') }}</div>
            <div>{{ Form::text('name') }}</div>
            <div>&nbsp;</div>

			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif
