 <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
     @can('employee')
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('home') ? '' : 'collapsed' }}" href="{{ route('home') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('view.hr') ? '' : 'collapsed' }}" href="{{ route('view.hr') }}">
          <i class="bi bi-grid"></i>
          <span>Send HR</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endcan

      @can('hr')
       <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('page.hr') ? '' : 'collapsed' }}" href="{{ route('page.hr') }}">
        <i class="bi bi-list-ul"></i>
          <span>HR</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endcan
     
   

     

  </aside><!-- End Sidebar-->