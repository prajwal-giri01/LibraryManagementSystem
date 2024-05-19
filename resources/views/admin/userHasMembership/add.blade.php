@extends('admin.sideMenu')
@section('main-content')
    <div class="ad_displayDetails col-10 mt-2">
        <div class=" w-full flex justify-center items-center">
            <div class="rounded-lg shadow-md   w-full bg dark:bg-gray-800 p-5">
                <h2 class="text-center  text-white font-bold mb-6">Purchase Membership</h2>
                <form method="POST" action={{route("admin.membership.purchase.store")}} class="space-y-4">
                    @csrf
                    <div class="d-flex justify-between align-start mb-3">
                        <div class="col-5">
                            <x-input-label for="email" :value="__('Email')" />
                            <select id="email" name="email" type="text" class="mt-1 block w-full">
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->email}} </option>
                            @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('email')" class="text-red-600"/>
                        </div>
                        <div class="col-5">
                            <x-input-label for="membership" :value="__('Membership')" />
                            <select id="membership" name="membership" type="text" class="mt-1 block w-full">
                                @foreach($memberships as $membership)
                                    <option value="{{$membership->id}}">{{$membership->membershipLevel}} </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('membership')" class="text-red-600"/>
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

