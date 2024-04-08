<x-app-layout>
    @include('layouts.navigation')

    <section class="ad_main d-flex">
        <div class="ad_sidebar col-2">
            <ul class="ad_menu">
                <li>
                    <a href="#"><i class="fa-solid fa-grip"></i>Dashboard</a>
                </li>

                <li class="nav-item {{ Request::is('admin/author') ||Request::is('admin/trash/author')  ? 'active' : '' }}">
                    <a href={{route('admin.author')}}> <i class="fa-regular fa-user "></i>Author</a>
                </li>
                <li class="nav-item {{ Request::is('admin/genre') || Request::is('admin/trash/genre')? 'active' : '' }}">
                    <a href={{route('admin.genre')}}><i class="fa-solid fa-layer-group"></i>Genre</a>
                </li>
                <li>
                    <a href="#"> <i class="fa-solid fa-book"></i>Books</a>
                </li> <li>
                    <a href="#"><i class="fa-regular fa-address-card"></i>Membership</a>
                </li>

            </ul>
        </div>

        @yield('main-content')

    </section>
</x-app-layout>
