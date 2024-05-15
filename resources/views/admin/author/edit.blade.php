@extends('admin.sideMenu')
@section('main-content')
    <div class="ad_displayDetails col-10 d-flex">
        <div class="author_form w-full flex justify-center items-center">
            <div class="author_from rounded-lg shadow-md p-8  w-full bg dark:bg-gray-800">
                <h2 class="text-center  text-white font-bold mb-6">Author Details</h2>
                <form method="POST" action={{route("admin.author.update",['id'=>$author->id])}} class="space-y-4" >
                    @method('PUT')
                    @csrf
                    <x-input-label for="name" :value="__('Author Name')" />
                    <x-text-input value=" {{$author->name}}" id="name" name="name" type="text" class="mt-1 block w-full"  />
                    <x-input-error :messages="$errors->get('name')" class="text-red-600"/>
                    <div>
                        <x-primary-button>{{ __('save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
