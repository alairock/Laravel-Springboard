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
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Themes <span class="caret"></span></a>
          <ul class="dropdown-menu" aria-labelledby="themes">
            <li><a href="../default/">Default</a></li>
            <li class="divider"></li>
            <li><a href="../amelia/">Amelia</a></li>
            <li><a href="../cerulean/">Cerulean</a></li>
            <li><a href="../cosmo/">Cosmo</a></li>
            <li><a href="../cyborg/">Cyborg</a></li>
            <li><a href="../flatly/">Flatly</a></li>
            <li><a href="../journal/">Journal</a></li>
            <li><a href="../lumen/">Lumen</a></li>
            <li><a href="../readable/">Readable</a></li>
            <li><a href="../simplex/">Simplex</a></li>
            <li><a href="../slate/">Slate</a></li>
            <li><a href="../spacelab/">Spacelab</a></li>
            <li><a href="../superhero/">Superhero</a></li>
            <li><a href="../united/">United</a></li>
            <li><a href="../yeti/">Yeti</a></li>
          </ul>
        </li>
        <li>
          <a href="/admin/users">Users</a>
        </li>
        <li>
          <a href="http://news.bootswatch.com">Blog</a>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Download <span class="caret"></span></a>
          <ul class="dropdown-menu" aria-labelledby="download">
            <li><a href="./bootstrap.min.css">bootstrap.min.css</a></li>
            <li><a href="./bootstrap.css">bootstrap.css</a></li>
            <li class="divider"></li>
            <li><a href="./variables.less">variables.less</a></li>
            <li><a href="./bootswatch.less">bootswatch.less</a></li>
          </ul>
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
