
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset("/bower_resources/AdminLTE/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
    @foreach($modules as $module)
      @if($module->has_child)
        <li class="treeview">
          <a href="#"><i class="fa fa-group"></i> <span> {{ $module->name }} </span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
        @foreach($modulesChild as $moduleChild)
          @if($module->id == $moduleChild->parent)
            <li><a class="menu-option" href="{{ url("$moduleChild->route") }}" data-href="{{ $moduleChild->route }}"> {{ $moduleChild->name }} </a></li>
          @endif
        @endforeach 
          </ul>          
        </li>
      @else
        @if($module->parent == 0)
        <li><a class="menu-option" href="{{ url("$module->route") }}" data-href="{{ $module->route }}"><i class="fa fa-{{ $module->icon }}"></i> <span> {{ $module->name }} </span> </a></li>
        @endif
      @endif
    @endforeach
        <!-- Optionally, you can add icons to the links -->
        <!-- <li class="treeview">
          <a href="#"><i class="fa fa-group"></i> <span>Usuarios</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="{{ url("admin/users") }}">Listado</a></li>
            <li><a href="{{ url("admin/users/edit") }}">Registrar</a></li>
          </ul>
        </li> -->
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>