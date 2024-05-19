@extends('admin.sideMenu')
@section('main-content')
    <div class="ad_displayDetails col-10 d-flex">
        <div class="author_form w-full flex justify-center items-center">
            <div class="author_from rounded-lg shadow-md p-8  w-full bg dark:bg-gray-800">
                <h2 class="text-center  text-white font-bold mb-6">Location Details</h2>
                <form method="POST" action={{route("admin.location.store")}} class="space-y-4">
                    @csrf
                    <x-input-label for="address" :value="__('Location Name')" />
                    <x-text-input id="address" name="address" type="text" class="mt-1 block w-full"  />
                    <x-input-error :messages="$errors->get('address')" class="text-red-600"/>

                    <x-input-label for="price" :value="__('Price')" />
                    <x-text-input id="price" name="price" type="number" class="mt-1 block w-full"  />
                    <x-input-error :messages="$errors->get('price')" class="text-red-600"/>
                    <div>
                        <x-primary-button>{{ __('save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
