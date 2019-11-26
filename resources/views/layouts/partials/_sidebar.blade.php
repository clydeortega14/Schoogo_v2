<aside class="main-sidebar">
      
  <section class="sidebar">
    
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">

      <div class="pull-left image">

        <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

      </div>

      <div class="pull-left info">

        <p>{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</p>

        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

      </div>

    </div>

    <form action="#" method="get" class="sidebar-form">

      <div class="input-group">

        <input type="text" name="q" class="form-control" placeholder="Search...">

        <span class="input-group-btn">

            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>

        </span>

      </div>

    </form>

    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Main Navigation</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{ route('home') }}"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>

      <li class="{{ request()->routeIs('products.index') ? 'active' : ''}}">
        <a href="{{ route('products.index') }}"><i class="fa fa-link"></i> <span>Products</span></a>
      </li>

      <li class="{{ request()->routeIs('size.index') ? 'active' : ''}}">
        <a href="{{ route('size.index') }}"><i class="fa fa-link"></i> <span>Sizes</span></a>
      </li>

      <li class="treeview">

        <a href="#"><i class="fa fa-link"></i> <span>Pricing</span>

          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </span>

        </a>
        <ul class="treeview-menu">

          <li class="{{ request()->routeIs('pricings.create')}}">
            <a href="{{ route('pricings.create') }}">Add Pricing</a>
          </li>

          <li class="{{ request()->routeIs('pricings.index') }}">
            <a href="{{ route('pricings.index') }}">Pricings Lists</a>
          </li>

        </ul>

      </li>

      <li class="treeview">

        <a href="#"><i class="fa fa-link"></i> <span>Papers</span>

          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </span>

        </a>
        <ul class="treeview-menu">

          <li class="{{ request()->routeIs('papers.create')}}">
            <a href="{{ route('papers.create') }}">Add paper</a>
          </li>

          <li class="{{ request()->routeIs('papers.index') }}">
            <a href="{{ route('papers.index') }}">Papers Lists</a>
          </li>

        </ul>

      </li>

    </ul>

  </section>

</aside>