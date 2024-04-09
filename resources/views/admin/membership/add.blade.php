@extends('admin.sideMenu')
@section('main-content')
    <div class="ad_displayDetails col-10 mt-2">
        <div class=" w-full flex justify-center items-center">
            <div class="rounded-lg shadow-md  max-w-sm w-full bg dark:bg-gray-800 p-5">
                <h2 class="text-center  text-white font-bold mb-6">Membership Details</h2>
                <form method="POST" action={{route("admin.membership.store")}} class="space-y-4">
                    @csrf
                    <div class="d-flex justify-between align-start mb-3">
                        <div class="col-5" >
                            <x-input-label for="membershipLevel" :value="__('Membership Label')" />
                            <x-text-input id="membershipLevel" name="membershipLevel" type="text" class="mt-1 block w-full" value="{{old('membershipLevel')}}" />
                            <x-input-error :messages="$errors->get('membershipLevel')" class="text-red-600"/>
                        </div>
                        <div class="col-5" >
                            <x-input-label for="numberOfBooks" :value="__('Books Allowed')" />
                            <x-text-input id="numberOfBooks"  name="numberOfBooks" type="text" class="mt-1 block w-full"  value="{{old('numberOfBooks')}}" />
                            <x-input-error :messages="$errors->get('numberOfBooks')" class="text-red-600"/>
                        </div>
                    </div>
                    <div class="d-flex justify-between align-start">
                        <div class="col-5" >
                            <x-input-label for="price" :value="__('Price')" />
                            <x-text-input id="price"  name="price" type="text" class="mt-1 block w-full" value="{{old('price')}}"  />
                            <x-input-error :messages="$errors->get('price')" class="text-red-600"/>
                        </div>
                        <div class="col-5" >
                            <x-input-label for="benefit" :value="__('Benefit')" />
                            <textarea id="benefit" placeholder="Separate benefits by comma" name="benefit" type="text" class="mt-1 block w-full" >{{old('benefit')}}</textarea>
                            <x-input-error :messages="$errors->get('benefit')" class="text-red-600"/>
                        </div>
                    </div>

                    <div class="mt-4">
                        <x-primary-button>{{ __('save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

