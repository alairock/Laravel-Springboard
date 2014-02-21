@section('sidebar')
	<div class="list-group">
		{{ HTML::clever_link('admin/roles', 'List Roles') }}
		{{ HTML::clever_link('admin/roles/create', 'New Role') }}
	</div>
	@parent
@stop
