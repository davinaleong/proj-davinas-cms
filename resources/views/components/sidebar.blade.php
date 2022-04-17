<div class="app-sidebar sidebar-shadow">
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
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <li>
                    <a href="{{ route('activities.index') }}">
                        <i class="metismenu-icon pe-7s-graph1"></i>
                        Activity
                    </a>
                </li>
                <li class="app-sidebar__heading">The Beloved's Blog</li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-browser"></i>
                        Pages
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="list-pages.html">
                                <i class="metismenu-icon pe-7s-note2"></i>
                                List Pages
                            </a>
                        </li>
                        <li>
                            <a href="add-page.html">
                                <i class="metismenu-icon pe-7s-plus"></i>
                                Add Page
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-news-paper"></i>
                        Posts
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="list-posts.html">
                                <i class="metismenu-icon pe-7s-note2"></i>
                                List Posts
                            </a>
                        </li>
                        <li>
                            <a href="add-post.html">
                                <i class="metismenu-icon pe-7s-plus"></i>
                                Add Post
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="app-sidebar__heading">Misc</li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-settings"></i>
                        Settings
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('settings.index') }}">
                                <i class="metismenu-icon pe-7s-note2"></i>
                                List Settings
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('settings.edit') }}">
                                <i class="metismenu-icon pe-7s-plus"></i>
                                Modify Settings
                            </a>
                        </li>
                    </ul>
                </li>
        </div>
    </div>
</div>
