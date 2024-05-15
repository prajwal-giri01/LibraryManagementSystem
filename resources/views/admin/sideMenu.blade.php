<x-app-layout>
    @include('layouts.navigation')

    <section class="ad_main d-flex">
        <div class="ad_sidebar col-2">
            <ul class="ad_menu">
                <li class="nav-item {{ Request::is('admin/dashboard')   ? 'active' : '' }}">
                    <a href={{route("admin.dashboard")}}><i class="fa-solid fa-grip"></i>Dashboard</a>
                </li>

                <li class="nav-item {{ Request::is('admin/author') ||Request::is('admin/trash/author') || Request::is('admin/author/add') || Request::is('admin/author/edit/*') ? 'active' : '' }}">
                    <a href={{route('admin.author')}}> <i class="fa-regular fa-user "></i>Author</a>
                </li>
                <li class="nav-item {{ Request::is('admin/genre') || Request::is('admin/trash/genre') || Request::is('admin/genre/add') || Request::is('admin/genre/edit/*')? 'active' : '' }}">
                    <a href={{route('admin.genre')}}><i class="fa-solid fa-layer-group"></i>Genre</a>
                </li>
                <li class="nav-item {{ Request::is('admin/book') || Request::is('admin/trash/book') || Request::is('admin/book/add') || Request::is('admin/book/edit/*')? 'active' : '' }}">
                    <a href={{route('admin.book')}}> <i class="fa-solid fa-book"></i>Books</a>
                </li>
                <li class="nav-item {{ Request::is('admin/membership') || Request::is('admin/trash/membership') || Request::is('admin/membership/add') || Request::is('admin/membership/edit/*') ? 'active' : '' }}">
                    <a href={{route('admin.membership')}}><i class="fa-regular fa-address-card"></i>Membership</a>
                </li>  <li class="nav-item {{ Request::is('admin/feedback') || Request::is('admin/feedback/*') ? 'active' : '' }}">
                    <a href={{route('admin.feedback')}}><i class="fa-solid fa-comments"></i>Feedback</a>
                </li>

            </ul>
        </div>

        @yield('main-content')

    </section>
    <x-message/>
</x-app-layout>
