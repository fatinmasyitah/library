<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{route('admin.home') }}"><img src="{{ url('assets/img/book-icon.png') }}" width="25">&nbsp;E-Library Admin</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="{{ request()->routeIs('admin.home*') ? 'active':'' }}"">
          <a href="{{ route('admin.home') }}" class="nav-link"><i class="fas fa-tv"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Starter</li>

        <li class="dropdown {{ request()->routeIs('publisher.*') ? 'active':'' }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-building"></i> <span>Publisher</span></a>
          <ul class="dropdown-menu">
            <li class="{{ request()->routeIs('publisher.index') ? 'active':'' }}">
              <a class="nav-link" href="{{ route('publisher.index') }}">Publisher List</a></li>

            <li class="{{ request()->routeIs('publisher.create') ?'active':'' }}"><a class="nav-link" href="{{ route('publisher.create') }}">Create Publisher</a></li>
          </ul>
        </li>

        <li class="dropdown {{ request()->routeIs('author.*') ? 'active':'' }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-pen"></i> <span>Author</span></a>
          <ul class="dropdown-menu">
            <li class="{{ request()->routeIs('author.index') ? 'active':'' }}">
              <a class="nav-link" href="{{ route('author.index') }}">Author List</a></li>

            <li class="{{ request()->routeIs('author.create') ?'active':'' }}"><a class="nav-link" href="{{ route('author.create') }}">Create Author</a></li>
          </ul>
        </li>
        
        <li class="dropdown {{ request()->routeIs('category.*') ? 'active':'' }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-folder-open"></i>
              <span>Category</span></a>
          <ul class="dropdown-menu">
              <li class="{{ request('type') == 'fiction' ? 'active':'' }}"><a class="nav-link" href="{{ route('category.index').'?type=fiction' }}">Fiction Category</a></li>
              <li class="{{ request('type') == 'nonfiction' ? 'active':'' }}"><a class="nav-link" href="{{ route('category.index').'?type=nonfiction' }}">Non-Fiction Category</a></li>
              <li class="{{ request()->routeIs('category.create') ? 'active':'' }}"><a class="nav-link" href="{{ route('category.create') }}">Create Category</a></li>
          </ul>
      </li>

      <li class="dropdown {{ request()->routeIs('book.*') ? 'active':'' }}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book"></i> <span>Book</span></a>
        <ul class="dropdown-menu">
          <li class="{{ request()->routeIs('book.index') ? 'active':'' }}">
            <a class="nav-link" href="{{ route('book.index') }}">Book List</a></li>

          <li class="{{ request()->routeIs('book.create') ?'active':'' }}"><a class="nav-link" href="{{ route('book.create') }}">Create Book</a></li>
        </ul>
      </li>

      <li class="{{ request()->routeIs('admin.bookissued') ? 'active':'' }}">
        <a href="{{ route('admin.bookissued') }}" class="nav-link"><i class="fas fa-fire"></i><span>Book Issued</span></a>
      </li>

      </ul>
    </aside>
  </div>