@include ('roles.sidebar')
<h1>Create Permission</h1>

{{ Form::open(['url' => 'admin/permissions/store']) }}
            <div>{{ Form::label('name', 'Name:') }}</div>
            <div>{{ Form::select('name', $allRoutes) }}</div>
            <div>{{ Form::label('method', 'Method Setting:') }}</div>
            <div>{{ Form::select('method', $methodOptions) }}</div>
            <div>&nbsp;</div>

			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif
