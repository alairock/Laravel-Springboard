@include ('roles.sidebar')
<h1>Roles</h1>
<table class="table table-striped table-bordered">
	<tr>
		<th>Name</th>
		<th>Actions</th>
	</tr>
	@foreach ($roles as $role)
		<tr>
			<td>{{$role->name}}</td>
			<td>
				{{ HTML::link('/admin/roles/delete/' . $role->id, 'Delete', ['class' => 'btn btn-primary btn-sm']) }}
				{{ HTML::link('/admin/roles/attach_permission/' . $role->id, 'Permissions', ['class' => 'btn btn-warning btn-sm']) }}
			</td>
		</tr>
	@endforeach
</table>
