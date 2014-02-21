<html>
  <head>
    @section('head')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{{ isset($title) ? $title . ' | ' : '' }}} {{ $siteName }}</title>
    {{ HTML::style('//netdna.bootstrapcdn.com/bootswatch/3.1.0/flatly/bootstrap.min.css') }}
    {{ HTML::style('//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css') }}
    {{ HTML::style('css/app.css') }}
    @show
  </head>
  <body>
  	@include('layouts.sections.navigation')
    @if (Session::has('message') || Session::has('error') || Session::has('warning'))
      @include('layouts.sections.alerts')
    @endif
  	<div class="container">
		<div class="row">
			<div class="col-sm-9 col-md-9 main">
				{{ $content }}
			</div>
			<div class="col-sm-3 col-md-3 sidebar">
	        	@include('layouts.sections.sidebar')
	    	</div>
    	</div>
	</div>

  @section('footer_scripts')
    {{ HTML::script('http://code.jquery.com/jquery.js') }}
    {{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js') }}
  @show
  </body>
</html>
