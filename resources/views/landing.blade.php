<x-app-layout>
    <header class=" bg bg-black-100bg bg-black-100 grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
        <!-- Image and text -->
        <nav class="navbar navbar-light  d-flex justify-between ">

            <a class="navbar-brand" href="#">
                <img src={{asset("storage/Images/herald-white-logo.svg")}} width="30" height="30"
                     class="d-inline-block align-top logo"
                     alt="">
            </a>

            <form class="form-inline d-flex" style="width: 40rem; height: 3rem;">
                <input class=" search mr-sm-2"  placeholder="Search...." aria-label="Search">
                <button class="bg-main btn my-2 my-sm-0 search-button" type="submit">
                    <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;  font-size: 20px"></i>
                </button>
            </form>

            <div class="bg-main d-flex flex-wrap align-content-around" style="height: 38px;border-radius: 5px; font-weight: bold ; ">
                @if (Route::has('login'))

                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-White ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Login
                        </a>

                        @if (Route::has('register'))
                            <span class="mt-2">|</span>
                            <a     href="{{ route('register') }}" class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
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
                    <li><a href="#">{{$genre->name}}</a></li>
                    @endforeach
                     <li><a href="#">See More...</a></li>
                </ul>
            </div>
            <div class="hero_view col-10 px-2">
                <div class="big_slider">
                    <img src="{{asset("storage/Images/rect.png")}}">
                </div>
                <div class="small_slider">
                    <h3 class="medium_title">Most Popular Books</h3>
                    <div class="d-flex justify-between small_slider">
                        <div>
                            <img src="{{asset("storage/Images/harrypoter1.png")}}">
                            <div class="book_details d-flex justify-between">
                                <div class="details">
                                    <h4>book Name</h4>
                                    <p>Genre</p>
                                </div>
                                <div>
                                    <a class="small_btn" href="#"> button</a>
                                </div>
                            </div>
                        </div>

                        <div>
                            <img src="{{asset("storage/Images/harrypoter2.png")}}">
                            <div class="book_details d-flex justify-between">
                                <div class="details">
                                    <h4>book Name</h4>
                                    <p>Genre</p>
                                </div>
                                <div>
                                    <a class="small_btn" href="#"> button</a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <img src="{{asset("storage/Images/harrypoter3.png")}}">
                            <div class="book_details d-flex justify-between">
                                <div class="details">
                                    <h4>book Name</h4>
                                    <p>Genre</p>
                                </div>
                                <div>
                                    <a class="small_btn" href="#"> button</a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <img src="{{asset("storage/Images/harrypoter4.png")}}">
                            <div class="book_details d-flex justify-between">
                                <div class="details">
                                    <h4>book Name</h4>
                                    <p>Genre</p>
                                </div>
                                <div>
                                    <a class="small_btn" href="#"> button</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
</x-app-layout>
