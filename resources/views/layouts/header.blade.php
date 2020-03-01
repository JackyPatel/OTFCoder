<header class="main-header hidden-print">
    <a href="#" class="logo">{{ env('APP_NAME') }}</a>
    <nav class="navbar navbar-static-top">
        <a href="#" data-toggle="offcanvas" class="sidebar-toggle"></a>
        <div class="navbar-custom-menu">
            <ul class="top-nav">

                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-user fa-lg"></i>
                        <span>&nbsp Welcome {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                    </a>
                    <!-- <ul class="dropdown-menu settings-menu">
                        <li><a href="#"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                        <li><a href="#"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                        <li><a href="<?= URL::route('logout') ?>"><i class="fa fa-power-off fa-lg"></i> Logout</a></li>
                    </ul> -->
                </li>
            </ul>
        </div>
    </nav>
</header>