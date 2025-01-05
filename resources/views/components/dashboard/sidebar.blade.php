<!-- BEGIN: Sidebar -->
<div class="sidebar-wrapper group">
    <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden">
    </div>
    <div class="logo-segment">
        <a class="flex items-center" href="index.html">
            <img src="{{ asset('dashboard/images/logo/logo-c.svg') }}" class="black_logo white_logo" alt="logo">

            <span class="ltr:ml-3 rtl:mr-3 text-xl font-Inter font-bold text-slate-900 dark:text-white">
                LIORA

            </span>
        </a>
        <!-- Sidebar Type Button -->
        <div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
            <iconify-icon class="sidebarDotIcon extend-icon text-slate-900 dark:text-slate-200"
                icon="fa-regular:dot-circle"></iconify-icon>
            <iconify-icon class="sidebarDotIcon collapsed-icon text-slate-900 dark:text-slate-200"
                icon="material-symbols:circle-outline"></iconify-icon>
        </div>
        <button class="sidebarCloseIcon text-2xl">
            <iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line">
            </iconify-icon>
        </button>
    </div>
    <div id="nav_shadow"
        class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none opacity-0">
    </div>
    <div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] overflow-y-auto z-50"
        id="sidebar_menus">
        <ul class="sidebar-menu">
            <li class="sidebar-menu-title">
                {{ __('dashboard.dashboard') }}</li>
            <li class="">
                <a href="{{ route('dashboard') }}" class="navItem @if (str_contains(Route::currentRouteName(), 'dashboard')) active @endif">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:home"></iconify-icon>
                        <span>{{ __('dashboard.home') }}</span>
                    </span>

                </a>
            </li>
            @include('components.dashboard.sidebar.sidbard-lists', [
                'list_name' => __('dashboard.admin'),
                'icon' => 'heroicons-outline:user-circle', // أيقونة "المشرف"
                'elements' => [
                    [
                        'name' => __('dashboard.create'),
                        'route_name' => 'admin.create',
                        'route' => 'admin.create',
                    ],
                    [
                        'name' => __('dashboard.read'),
                        'route_name' => 'admin.index',
                        'route' => 'admin.index',
                    ],
                    [
                        'name' => __('dashboard.trash'),
                        'route_name' => 'admin.trash',
                        'route' => 'admin.trash',
                    ],
                ],
            ])
            @include('components.dashboard.sidebar.sidbard-lists', [
                'list_name' => 'Team Management',
                'icon' => 'heroicons-outline:users', // أيقونة "الفريق"
                'elements' => [
                    [
                        'name' => __('dashboard.create'),
                        'route_name' => 'team.create',
                        'route' => 'team.create',
                    ],
                    [
                        'name' => __('dashboard.read'),
                        'route_name' => 'index',
                        'route' => 'team.index',
                    ],
                    [
                        'name' => __('dashboard.trash'),
                        'route_name' => 'trash',
                        'route' => 'team.trash',
                    ],
                ],
            ])
            @include('components.dashboard.sidebar.sidbard-lists', [
                'list_name' => 'Posts Management',
                'icon' => 'heroicons-outline:document-text', // أيقونة "المقالات"
                'elements' => [
                    [
                        'name' => __('dashboard.create'),
                        'route_name' => 'create',
                        'route' => 'posts.create',
                    ],
                    [
                        'name' => __('dashboard.read'),
                        'route_name' => 'index',
                        'route' => 'posts.index',
                    ],
                    [
                        'name' => __('dashboard.trash'),
                        'route_name' => 'trash',
                        'route' => 'posts.trash',
                    ],
                ],
            ])
            @include('components.dashboard.sidebar.sidbard-lists', [
                'list_name' => 'Pages Management',
                'icon' => 'heroicons-outline:collection', // أيقونة "الصفحات"
                'elements' => [
                    [
                        'name' => 'Static Pages',
                        'route_name' => 'activites',
                        'route' => 'pages.index',
                    ],
                    [
                        'name' => 'About Page',
                        'route_name' => 'about',
                        'route' => 'posts.index',
                    ],
                    [
                        'name' => 'News Page',
                        'route_name' => 'trash',
                        'route' => 'posts.trash',
                    ],
                ],
            ])
            @include('components.dashboard.sidebar.sidbard-lists', [
                'list_name' => 'Roles Managment',
                'icon' => 'heroicons-outline:key', // أيقونة "الإعدادات" أو الحساب
                'elements' => [
                    [
                        'name' => 'All Roles',
                        'route_name' => 'change',
                        'route' => 'Roles.index',
                    ],
                ],
            ])
            @include('components.dashboard.sidebar.sidbard-lists', [
                'list_name' => __('dashboard.account'),
                'icon' => 'heroicons-outline:cog', // أيقونة "الإعدادات" أو الحساب
                'elements' => [
                    [
                        'name' => __('dashboard.change_password'),
                        'route_name' => 'change',
                        'route' => 'password.change',
                    ],
                ],
            ])


        </ul>
    </div>
</div>
<!-- End: Sidebar -->
