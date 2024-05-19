<x-app-layout>
    @include('layouts.navigation')

    <section class="ad_main d-flex">
        <div class="ad_sidebar col-2">
            <ul class="ad_menu">
                <li class="nav-item {{ Request::is('dashboard')   ? 'active' : '' }}">
                    <a href={{route("dashboard")}}><i class="fa-solid fa-grip"></i>Dashboard</a>
                </li>
                <li class="nav-item {{ Request::is('membership') || Request::is('membership/*')   ? 'active' : '' }}">
                    <a href={{route("membership")}}><i class="fa-regular fa-address-card"></i>Membership</a>
                </li>
                <li class="nav-item {{ Request::is('book') || Request::is('book/*')   ? 'active' : '' }}">
                    <a href={{route("user.book.order")}}> <i class="fa-solid fa-book"></i>Book Order</a>
                </li>
                <li class="nav-item {{ Request::is('rent/history') || Request::is('rent/history/*')   ? 'active' : '' }}">
                    <a href={{route("user.book.order.history")}}> <i class="fa-regular fa-credit-card"></i>Book History</a>
                </li>
            </ul>
        </div>
        @yield('main-content')

    </section>
    <x-message/>
</x-app-layout>
