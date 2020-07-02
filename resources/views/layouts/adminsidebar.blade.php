<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Kick Sports</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">KS</a>
          </div>
          <ul class="sidebar-menu">
                <li class="">
                  <a class="nav-link" href="{{url('dashboard')}}"><i class="fas fa-square"></i> <span>Dashboard</span></a>
                </li>
                <li class="">
                  <a class="nav-link" href="{{ route('news.index') }}"><i class="fas fa-newspaper"></i> <span>News</span></a>
                </li>
                <li class="">
                  <a class="nav-link" href="{{ route('user.index') }} "><i class="fas fa-user"></i> <span>User</span></a>
                </li>
          </ul>
        </aside>
      </div>