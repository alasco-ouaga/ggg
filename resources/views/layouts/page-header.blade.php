<div class="page-header navbar navbar-static-top">
    <div class="page-header-inner">
        <div class="page-logo">
            <a href="http://127.0.0.1:8000/admin">
                <img src="http://127.0.0.1:8000/storage/logo/logo-white.png" alt="logo" class="logo-default" />
            </a>

            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>

        <a href="javascript:" class="menu-toggler responsive-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
            <span></span>
        </a>

        <div class="top-menu">
            <ul class="nav navbar-nav float-end">
                <li class="dropdown">
                    <a class="dropdown-toggle dropdown-header-name pe-2" href="http://127.0.0.1:8000" target="_blank">
                        <i class="fa fa-globe"></i>
                        <span class="d-none d-sm-inline">
                            Voir le site web
                        </span>
                    </a>
                </li>
                <li class="dropdown dropdown-extended dropdown-inbox">
                    <a href="http://127.0.0.1:8000/admin/notifications/get-notifications" data-href="http://127.0.0.1:8000/admin/notifications/update-notifications-count" id="open-notification" class="dropdown-toggle dropdown-header-name">
                        <input type="hidden" value="1" class="current-page">
                        <i class="fas fa-bell"></i>
                    </a>
                </li>




                <li class="dropdown dropdown-user">
                    <a href="javascript:void(0)" class="dropdown-toggle dropdown-header-name" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img alt="Super Admin" class="rounded-circle" src="data:image/png;base64,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" />
                        <span class="username d-none d-sm-inline"> Super Admin </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="http://127.0.0.1:8000/admin/system/users/profile/1"><i class="icon-user"></i> Profil</a></li>
                        <li><a href="http://127.0.0.1:8000/admin/logout" class="btn-logout"><i class="icon-key"></i> Déconnexion</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>