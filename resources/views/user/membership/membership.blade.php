@extends('user.sidebar')
@section("main-content")
    <div class="ad_displayDetails col-10">
        <div class="d-flex justify-content-around mt-4">
            @foreach($memberships as $membership)
                <div class="card" style="width: 18rem; ">
                    <div class="card-body text-center">
                        <p class="card-title h2">{{$membership->membershipLevel}}</p>
                        <p class="card-text pt-5 pb-5">
                            <span class="h3"> रु{{$membership->price}}</span>
                            <span>/month</span>
                        </p>

                        @php
                            $benefits = explode(',', $membership->Extra);
                        @endphp
                        @foreach($benefits as $benefit)
                            <p class="card-title font-bold">{{$benefit}} ,</p>
                        @endforeach
                    </div>

                    <!-- Button placed outside card-body -->
                    <div class=" text-center mb-2">
                        <a class="inline-flex items-center px-4 py-2 dborder border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 bg-main primary_button">
                            purchase
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
