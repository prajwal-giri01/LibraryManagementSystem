@extends('user.sidebar')
@section("main-content")
    <div class="ad_displayDetails col-10">
        <div class="py-12" style="
    background-color: whitesmoke;
">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
                @if(auth()->user()->isAdmin !=1)
                    <div class="p-4 sm:p-8 bg dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
