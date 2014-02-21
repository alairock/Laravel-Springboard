@section('sidebar')
	<div class="list-group">
		{{ HTML::clever_link('admin/users', 'List Users') }}
	</div>
	@parent
@stop
