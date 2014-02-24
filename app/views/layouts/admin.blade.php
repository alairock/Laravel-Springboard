<!DOCTYPE html>
<html lang="en">
	<head>
		@section('head')
		<title>{{{ isset($title) ? $title . ' | ' : '' }}} {{ $siteName }}</title>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        {{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/font-awesome.css') }}
        {{ HTML::style('css/fullcalendar.css') }}
        {{ HTML::style('css/jquery.jscrollpane.css') }}
        {{ HTML::style('css/admin.css') }}
        @show
	</head>
	<body data-color="grey" class="flat">
		<div id="wrapper">
			<div id="header">
				<h1><a href="{{ URL::to('/') }}">{{{ isset($title) ? $title . ' | ' : '' }}} {{ $siteName }}</a></h1>
				<a id="menu-trigger" href="#"><i class="fa fa-bars"></i></a>
			</div>

			<div id="user-nav">
	            <ul class="btn-group">
	                <!-- <li class="btn" ><a title="" href="#"><i class="fa fa-user"></i> <span class="text">Profile</span></a></li> -->
	                <!-- <li class="btn dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="fa fa-envelope"></i> <span class="text">Messages</span> <span class="label label-danger">5</span> <b class="caret"></b></a>
	                    <ul class="dropdown-menu messages-menu">
	                        <li class="title"><i class="fa fa-envelope-alt"></i>Messages<a class="title-btn" href="#" title="Write new message"><i class="fa fa-share"></i></a></li>
	                        <li class="message-item">
	                        	<a href="#">
		                            <img alt="User Icon" src="img/demo/av1.jpg" />
		                            <div class="message-content">
		                            	<span class="message-time">
			                                3 mins ago
			                            </span>
		                                <span class="message-sender">
		                                    Nunc Cenenatis
		                                </span>
		                                <span class="message">
		                                    Hi, can you meet me at the office tomorrow morning?
		                                </span>
		                            </div>
	                        	</a>
	                        </li>
	                        <li class="message-item">
								<a href="#">
		                            <img alt="User Icon" src="img/demo/av1.jpg" />
		                            <div class="message-content">
		                            	<span class="message-time">
			                                3 mins ago
			                            </span>
		                                <span class="message-sender">
		                                    Nunc Cenenatis
		                                </span>
		                                <span class="message">
		                                    Hi, can you meet me at the office tomorrow morning?
		                                </span>
		                            </div>
	                        	</a>
	                        </li>
	                        <li class="message-item">
								<a href="#">
		                            <img alt="User Icon" src="img/demo/av1.jpg" />
		                            <div class="message-content">
		                            	<span class="message-time">
			                                3 mins ago
			                            </span>
		                                <span class="message-sender">
		                                    Nunc Cenenatis
		                                </span>
		                                <span class="message">
		                                    Hi, can you meet me at the office tomorrow morning?
		                                </span>
		                            </div>
	                        	</a>
	                        </li>
	                    </ul>
	                </li> -->
	                <!-- <li class="btn"><a title="" href="#"><i class="fa fa-cog"></i> <span class="text">Settings</span></a></li> -->
	                <li class="btn">
						<a href="{{ url('/logout') }}"><i class="fa fa-share"></i> <span class="text">Logout</span></a>
	                </li>
	            </ul>
	        </div>
	        @include('layouts.admin.navigation')

			<div id="content">
				<div id="content-header" class="mini">
					<h1>{{{ isset($title) ? $title . ' | ' : '' }}} {{ $siteName }}</h1>
					<!-- <ul class="mini-stats box-3">
						<li>
							<div class="left sparkline_bar_good"><span>2,4,9,7,12,10,12</span>+10%</div>
							<div class="right">
								<strong>36094</strong>
								Visits
							</div>
						</li>
						<li>
							<div class="left sparkline_bar_neutral"><span>20,15,18,14,10,9,9,9</span>0%</div>
							<div class="right">
								<strong>1433</strong>
								Users
							</div>
						</li>
						<li>
							<div class="left sparkline_bar_bad"><span>3,5,9,7,12,20,10</span>+50%</div>
							<div class="right">
								<strong>8650</strong>
								Orders
							</div>
						</li>
					</ul> -->
				</div>
				<div id="breadcrumb">
					<a href="{{ URL::to('/admin/dashboard') }}"><i class="fa fa-home"></i> Home</a>
					<a href="#" class="current">Dashboard</a>
				</div>
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-12 center" style="text-align: center;">
							{{ $content }}
						</div>
					</div>
				</div>

			</div>
			<div class="row">
				<div id="footer" class="col-xs-12">
				&copy; {{ date('Y') }} Inquiri
				</div>
			</div>
		</div>
		@section('footer_scripts')
			{{ HTML::script('js/excanvas.min.js') }}
			{{ HTML::script('js/jquery.min.js') }}
			{{ HTML::script('js/jquery-ui.custom.js') }}
			{{ HTML::script('js/bootstrap.min.js') }}
			{{ HTML::script('js/jquery.flot.min.js') }}
			{{ HTML::script('js/jquery.flot.resize.min.js') }}
			{{ HTML::script('js/jquery.sparkline.min.js') }}
			{{ HTML::script('js/fullcalendar.min.js') }}
			{{ HTML::script('js/jquery.nicescroll.min.js') }}
			{{ HTML::script('js/admin.js') }}
			{{ HTML::script('js/admin.dashboard.js') }}
		@show
	</body>
</html>
