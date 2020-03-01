<aside class="main-sidebar hidden-print">
    <section class="sidebar">
        <!-- <div class="user-panel">
            <div class="pull-left image"><img src="{{ asset('backend/images/user.png') }}" alt="User Image" class="img-circle"></div>
            <div class="pull-left info">
            </div>
          </div>
 -->
        <!-- Sidebar Menu-->
        <ul class="sidebar-menu">
            <li class="@if(Request::segment(2) == 'users') active @endif"><a href= "{{ route('edit.profile') }}"><i class="fa fa-dashboard"></i><span>Profile</span></a></li>
            @can('view_users')
            <li class="@if(Request::segment(2) == 'users') active @endif"><a href= "{{ route('users.index') }}"><i class="fa fa-dashboard"></i><span>Users</span></a></li>
            @endcan
            @can('view_roles')
            <li class="@if(Request::segment(2) == 'roles') active @endif"><a href= "{{ route('roles.index') }}"><i class="fa fa-dashboard"></i><span>Roles</span></a></li>
            @endcan
            @can('add_permissions')
            <li class="@if(Request::segment(2) == 'permissions') active @endif"><a href= "{{ route('permissions.index') }}"><i class="fa fa-dashboard"></i><span>Permissions</span></a></li>
            @endcan
            <li>
                <a href= "{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                <i class="fa fa-power-off"></i>
                 <span>Logout</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
            
        </ul>
    </section>
</aside>