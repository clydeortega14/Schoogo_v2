<header class="main-header">
  
  <!-- Logo -->
  <a href="{{ route('home') }}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b>LT</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Admin</b>LTE</span>
  </a>

  <nav class="navbar navbar-static-top" role="navigation">
  
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

      <span class="sr-only">Toggle navigation</span>

    </a>

    <div class="navbar-custom-menu">
      
      <ul class="nav navbar-nav">
        
        <li class="dropdown message-menu">
          
          <!-- Menu toggle button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            <span class="label label-success">4</span>
          </a>

          <ul class="dropdown-menu">
            
            <li class="header">You have 4 messages</li>
              <li>
              <!-- inner menu: contains the messages -->
              <ul class="menu">
                <li><!-- start message -->
                  <a href="#">
                    <div class="pull-left">
                      <!-- User Image -->
                      <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <!-- Message title and timestamp -->
                    <h4>
                      Support Team
                      <small><i class="fa fa-clock-o"></i> 5 mins</small>
                    </h4>
                    <!-- The message -->
                    <p>Why not buy a new awesome theme?</p>
                  </a>
                </li>
                <!-- end message -->
              </ul>
              <!-- /.menu -->
            </li>
            <li class="footer"><a href="#">See All Messages</a></li>

          </ul>

        </li>

        <li class="dropdown user user-menu">
          
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            <img src="/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs">{{ auth()->user()->email }}</span>
          </a>

          <ul class="dropdown-menu">
            
            <li class="user-header">
              
              <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

            </li>

            <li class="user-footer">
              
              <div class="pull-left">

                <a href="#" class="btn btn-default btn-flat">Profile</a>

              </div>

              <div class="pull-right">

                <a href="#" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  Sign out
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </a>
                
              </div>

            </li>

          </ul>

        </li>

      </ul>

    </div>

  </nav>

</header>