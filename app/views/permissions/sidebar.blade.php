@section('sidebar')
	<div class="list-group">
		{{ HTML::clever_link('admin/permissions', 'List Permissions') }}
		{{ HTML::clever_link('admin/permissions/create', 'New Permission') }}
	</div>
	@parent
@stop
