<x-app-layout>
    <header class=" bg bg-black-100bg bg-black-100 grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
        <!-- Image and text -->
        <nav class="navbar navbar-light  d-flex justify-between ">

            <a class="navbar-brand" href="/">
                <img src={{asset("images/herald-white-logo.svg")}} width="30" height="30"
                     class="d-inline-block align-top logo"
                     alt="">
            </a>

            <form method="get" action={{route('search')}} class="form-inline d-flex
            " style="width: 40rem; height: 3rem;">
            <input class="search mr-sm-2" placeholder="Search...." aria-label="Search" name="search" autocomplete="off">
            <button class="bg-main btn my-2 my-sm-0 search-button" type="submit">
                <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;  font-size: 20px"></i>
            </button>
            </form>

            <div class="bg-main d-flex flex-wrap align-content-around"
                 style="height: 38px;border-radius: 5px; font-weight: bold ; ">
                @if (Route::has('login'))

                    @auth
                        <div class="hidden sm:flex sm:items-center ">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white text-white-500 dark:white-gray-400 bg-main  hover:text-white-700 dark:hover:text-white-300 focus:outline-none transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>

                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('dashboard')">
                                        {{ __('Dashboard') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @else
                        <a href="{{ route('login') }}"
                           class="rounded-md px-3 py-2 text-White ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Login
                        </a>

                        @if (Route::has('register'))
                            <span class="mt-2">|</span>
                            <a href="{{ route('register') }}"
                               class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Register
                            </a>
                        @endif

                    @endauth
                @endif
            </div>
        </nav>

    </header>


    <div class="container d-flex rounded mt-3" style="background-color: #e3e3e3; height: 25rem; padding-top: 3rem">

        <div class="book_image col-3">
            <img
                src="{{ $book->image->image ? asset("storage/books/images/$book->id/" . $book->image->image) : asset("images/no-image.jpg") }}">
        </div>
        <div class="book_detail m-xl-4">
            <div class="d-flex justify-between">
                <p class="book_title">{{$book->title}}</p>
                <button class="small_btn" style="max-height: 35px;" id="openButton{{$book->id}}">Rent</button>
            </div>
            <p class="genre  bg-main">{{$book->genres->name}}</p>
            <p class="genre bg-main">{{$book->authors->name}}</p>
            <p class=" mt-4">{{$book->extra}}</p>
        </div>
    </div>


    <div class="container mt-4">
        <h1 class="h1"> Similar Books</h1>
        <div class="d-flex justify-between small_slider flex-wrap mt-3">
            @foreach($books as $book)
                    <x-bookCard :book="$book"/>
            @endforeach
        </div>
    </div>



</x-app-layout>
