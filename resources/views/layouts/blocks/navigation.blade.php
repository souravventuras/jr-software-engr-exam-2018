  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
            {!! Html::image('img/avatar5.png') !!}

        </div>
        <div class="pull-left info">
        {{Auth::user()->name}}
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="{{ route('developer.index') }}"><i class="fa fa-user"></i> <span>Developers</span></a></li>
        <li><a href="{{ route('developer.create') }}"><i class="fa fa-user-plus"></i> <span>New Developers</span></a></li>
        <li><a href="{{ route('programming-language.index') }}"><i class="fa fa-code"></i> <span>Programming Language</span></a></li>
        <li><a href="{{ route('programming-language.create') }}"><i class="fa fa-code"></i> <span>New Programming Language</span></a></li>
        <li><a href="{{ route('language.index') }}"><i class="fa fa-flag"></i> <span>Language</span></a></li>
        <li><a href="{{ route('language.create') }}"><i class="fa fa-flag"></i> <span>New Language</span></a></li>
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> <span>Logout</span></a>
        </li>
      </ul>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </section>
    <!-- /.sidebar -->
  </aside>
