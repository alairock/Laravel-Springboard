@include ('users.sidebar')
<table class="table table-striped table-bordered">
	<tr>
		<th>Username</th>
		<th>Actions</th>
	</tr>
	@foreach ($users as $user)
	<tr>
		<td>{{$user->username}}</td>
		<td>
			{{HTML::link('admin/switch_user/' . $user->id, 'Login', ['class' => 'btn btn-primary btn-sm']) }}
			{{HTML::link('admin/users/edit/' . $user->id, 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
			{{HTML::link('admin/users/attach_role/' . $user->id, 'Roles', ['class' => 'btn btn-success btn-sm']) }}
		</td>
	</tr>
	@endforeach
</table>
