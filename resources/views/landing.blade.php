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
    <section class="container font-sans antialiased px-2 my-3">
        <div class="d-flex ">
            <div class="side_bar col-2 ">
                <h2 class="big_title">
                    Genre
                </h2>
                <ul class="rightAl_list">
                    @foreach($genres->take(15) as $genre)
                        <li class="hide_overflow"><a href={{route('genre',['id'=>$genre->id])}}>{{$genre->name}}</a>
                        </li>
                    @endforeach
                    <li><a href={{route('genre.all')}}>See More...</a></li>
                </ul>
            </div>
            <div class="hero_view col-10 px-2">
                <div class="big_slider">
                    <img src="{{asset("images/books.jpg")}}">
                </div>
                <div class="small_slider">
                    <h3 class="medium_title">Most Popular Books</h3>
                    <div class="d-flex justify-between small_slider">
                        @foreach($books->take(4) as $book)
                            <a href={{route('book',["id"=>$book->id])}}>
                                <div class="book-card">
                                    <img
                                        src="{{ $book->image->image ? asset("storage/books/images/$book->id/" . $book->image->image) : asset("images/no-image.jpg") }}">
                                    <div class="book-details d-flex justify-between bg text-white">
                                        <div class="details">
                                            <h4 class="book-title hide_overflow"
                                                style="max-width: 138px">{{$book->title}}</h4>
                                            <p>{{$book->genres->name}}</p>
                                        </div>
                                        <div>
                                            <a class="small_btn" href="#"> button</a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach

                    </div>


                </div>
            </div>
        </div>
    </section>
    <section class="container mt-4">
        <p class="h1">All Books </p>
        <div class="d-flex  small_slider flex-wrap mt-3 justify-between">
            @foreach($books as $book)
                <a href={{route('book',["id"=>$book->id])}}>
                    <div class="book-card">
                        <img src="{{ $book->image->image ? asset("storage/books/images/$book->id/" . $book->image->image) : asset("images/no-image.jpg") }}">
                        <div class="book-details d-flex justify-between bg text-white">
                            <div class="details">
                                <h4 class="book-title hide_overflow" style="max-width: 138px">{{$book->title}}</h4>
                                <p>{{$book->genres->name}}</p>
                            </div>
                            <div>
                                <a class="small_btn" href="#"> button</a>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
</x-app-layout>
