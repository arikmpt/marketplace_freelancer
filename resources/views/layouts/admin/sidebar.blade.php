<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="{{ route('admin.dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
            <a href="{{ route('admin.category.index') }}">
              <i class="fa fa-bookmark"></i> <span>Category</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.skill.index') }}">
              <i class="fa fa-microchip"></i> <span>Skill</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.project.index') }}">
              <i class="fa fa-book"></i> <span>Project</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.transaction.index') }}">
              <i class="fa fa-money"></i> <span>Transaction</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.user.index') }}">
              <i class="fa fa-users"></i> <span>User</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.page.index') }}">
              <i class="fa fa-etsy"></i> <span>Page</span>
            </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
</aside>