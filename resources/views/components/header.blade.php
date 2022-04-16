<div class="app-header header-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ms-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="app-header__content">
        <div class="app-header-left">
            <div class="search-wrapper">
                <div class="input-holder">
                    <input type="text" class="search-input" placeholder="Type to search">
                    <button class="search-icon">
                        <span></span>
                    </button>
                </div>
                <button class="btn-close"></button>
            </div>
        </div>
        <div class="app-header-right">
            <div class="header-btn-lg pe-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <a data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    class="p-0 btn">
                                    <img width="42" class="rounded-circle" src="{{ asset('images/avatars/1.jpg') }}"
                                        alt="">
                                    <i class="fa fa-angle-down ms-2 opacity-8"></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true"
                                    class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-menu-header">
                                        <div class="dropdown-menu-header-inner bg-info">
                                            <div class="menu-header-image opacity-2"
                                                style="background-image: url('images/dropdown-header/city3.jpg');">
                                            </div>
                                            <div class="menu-header-content text-start">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left me-3">
                                                            <img width="42" class="rounded-circle"
                                                                src="images/avatars/1.jpg" alt="">
                                                        </div>
                                                        <div class="widget-content-left">
                                                            <div class="widget-heading">Alina Mcloughlin</div>
                                                        </div>
                                                        <div class="widget-content-right me-2">
                                                            <!-- <button class="btn-pill btn-shadow btn-shine btn btn-focus">Logout</button> -->
                                                            <a href="login.html"
                                                                class="btn-pill btn-shadow btn-shine btn btn-focus">Logout</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left  ms-3 header-user-info">
                            <div class="widget-heading"> Davina Leong</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-btn-lg">
                <button type="button" class="hamburger hamburger--elastic open-right-drawer">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>
