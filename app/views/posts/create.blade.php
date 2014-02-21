<h1>Create Post</h1>

{{ Form::open(array('route' => 'posts.store')) }}
            <div>{{ Form::label('title', 'Title:') }}</div>
            <div>{{ Form::text('title') }}</div>
            <div>{{ Form::label('body', 'Body:') }}</div>
            <div>{{ Form::textarea('body') }}</div>
            <div>&nbsp;</div>

			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif
