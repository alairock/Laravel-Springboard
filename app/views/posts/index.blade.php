<h1>All Posts</h1>

<p>{{ link_to_route('posts.create', 'Add new post') }}</p>

@if ($posts->count())
	<table class="table table-striped table-bordered">
		<tr>
			<th>Title</th>
			<th>Actions</th>
		</tr>
		@foreach ($posts as $post)
			<tr>
				<td>{{ link_to_route('posts.show', $post->title, array($post->id)) }}</td>
                <td>{{ link_to_route('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-sm btn-primary pull-left')) }}
                    {{ Form::open(array('method' => 'DELETE', 'route' => array('posts.destroy', $post->id))) }}
                        {{ Form::submit('Delete', array('class' => 'btn btn-sm btn-danger pull-left')) }}
                    {{ Form::close() }}
                </td>
			</tr>
		@endforeach
	</table>
@else
	There are no posts
@endif
