<div class="container">
	<div class="row">
		@if (Session::has('message'))
		<div class="alert alert-dismissable alert-success">
			<p>{{ Session::get('message') }}</p>
		</div>
		@endif
		@if (Session::has('error'))
		<div class="alert alert-dismissable alert-danger">
			<p>{{ Session::get('error') }}</p>
		</div>
		@endif
		@if (Session::has('warning'))
		<div class="alert alert-dismissable alert-warning">
			<p>{{ Session::get('warning') }}</p>
		</div>
		@endif
	</div>
</div>
