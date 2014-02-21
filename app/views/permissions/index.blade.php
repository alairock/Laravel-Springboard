@include ('permissions.sidebar')
<h1>Permissions</h1>
<table class="table table-striped table-bordered">
	<tr>
		<th>Name</th>
		<th>Method</th>
		<th>Actions</th>
	</tr>
	@foreach ($permissions as $permission)
		<tr>
			<td>{{$permission->name}}</td>
			<td>{{$permission->method}}</td>
			<td>{{ HTML::link('/admin/permissions/delete/' . $permission->id, 'Delete', ['class' => 'btn btn-primary btn-sm']) }}</td>
		</tr>
	@endforeach
</table>
