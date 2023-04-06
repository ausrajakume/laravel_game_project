<aside class="main-sidebar sidebar-dark-primary elevation-4">
  
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-header"></li>
        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="bi-alarm"></i>
            <p>
              
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-header">Duomenu Lentelės</li>
        <li class="nav-item">
          <a href="{{ route('admin.games.index') }} " class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Games
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-header"></li>
        <li class="nav-item">
          <a href="{{ route('admin.genres.index') }} " class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Genres
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-header"></li>
        <li class="nav-item">
          <a href="{{ route('admin.languages.index') }} " class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Languages
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-header"></li>
        <li class="nav-item">
          <a href="{{ route('admin.platforms.index') }} " class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Platforms
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>