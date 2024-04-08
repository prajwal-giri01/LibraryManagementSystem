@extends('admin.sideMenu')
@section('main-content')
    <div class="ad_displayDetails col-10">
        <div class="author_form w-full flex justify-center items-center">
            <div class="author_from rounded-lg shadow-md p-8 max-w-sm w-full bg dark:bg-gray-800">
                <h2 class="text-center text-2xl text-white font-bold mb-6">Author Details</h2>
                <form action="#" class="space-y-4">
                    <x-input-label for="author_name" :value="__('Author Name')" />
                    <x-text-input id="author_name" name="author_name" type="text" class="mt-1 block w-full"  />
                    <x-input-error :messages="$errors->get('author_name')" class="text-red-600"/>
                    <div>
                        <x-primary-button>{{ __('Submit') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--    <div class="login-page">--}}
    {{--        <div class="author_from">--}}
    {{--            <form>--}}
    {{--                <h3 class="fs-4 font-bold mb-4">Author Form</h3>--}}
    {{--                <label for="author_name"> Author Name</label>--}}
    {{--                <x-text-input id="author_name" name="author_name" type="text" class="mt-1 block w-full" />--}}
    {{--                <button>Save</button>--}}
    {{--            </form>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
