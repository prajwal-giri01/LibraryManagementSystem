<x-app-layout>
    <header class=" bg bg-black-100bg bg-black-100 grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
        <!-- Image and text -->
        <nav class="navbar navbar-light  d-flex justify-between ">

            <a class="navbar-brand" href="/">
                <img src={{asset("images/herald-white-logo.svg")}} width="30" height="30"
                     class="d-inline-block align-top logo"
                     alt="">
            </a>

            <form class="form-inline d-flex" style="width: 40rem; height: 3rem;">
                <input class=" search mr-sm-2" placeholder="Search...." aria-label="Search">
                <button class="bg-main btn my-2 my-sm-0 search-button" type="submit">
                    <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;  font-size: 20px"></i>
                </button>
            </form>

            <div class="bg-main d-flex flex-wrap align-content-around"
                 style="height: 38px;border-radius: 5px; font-weight: bold ; ">
                @if (Route::has('login'))

                    @auth
                        <a href="{{ auth()->user()->isAdmin == 0? url('/dashboard'): url('admin/dashboard') }}"

                           class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </a>
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
    <div class="d-flex flex-wrap">
        @foreach($genres as $genre)
            <a href={{route('genre',['id'=>$genre->id])}} class="col-xl-2 col-sm-6 m-4">
            <div > <!-- Added mb-4 class for bottom margin -->
                <div class="card pl-5 pt-2 pb-2" >
                    <div class="card-body p-3">
                        <div class="row align-items-center">
                            <div class="col-12 text-center">
                                <div class="numbers">
                                    <h3 class="font-weight-bolder mt-3 mb-0 hide-overflow" style="font-size: 1.5rem;">
                                        {{$genre->name}}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </a>
        @endforeach
    </div>


</x-app-layout>


