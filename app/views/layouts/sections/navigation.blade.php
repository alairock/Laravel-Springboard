<div class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a href="../" class="navbar-brand">{{ $siteName }}</a>
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="navbar-collapse collapse" id="navbar-main">
      <ul class="nav navbar-nav">
        <li>
          <a href="/admin/users">Users</a>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
      	@if (Auth::check())
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">{{ Auth::user()->username }} <span class="caret"></span></a>
          <ul class="dropdown-menu" aria-labelledby="username">
            <li>{{ HTML::link('/', 'Dashboard') }}</li>
            @if (Session::has('switch_user.status') && Session::has('switch_user.user_id'))
              <li>{{ HTML::link('switch_back', 'Return to Admin') }}</li>
            @else
              <li>{{ HTML::link('logout', 'Logout') }}</li>
            @endif
            @if (Entrust::hasRole('Admin'))
              <li>{{ HTML::link('admin/dashboard', 'Admin Dashboard') }}</li>
            @endif
          </ul>
        </li>

      	@else
      		<li>{{ HTML::link('login', 'Login') }}</li>
      		<li>{{ HTML::link('register', 'Register') }}</li>
      	@endif
      </ul>

    </div>
  </div>
</div>
