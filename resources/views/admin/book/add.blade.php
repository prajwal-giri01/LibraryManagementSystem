@extends('admin.sideMenu')
@section('main-content')
    <div class="ad_displayDetails col-10 mt-2">
        <div class=" w-full flex justify-center items-center">
            <div class="rounded-lg shadow-md  max-w-sm w-full bg dark:bg-gray-800 p-5">
                <h2 class="text-center  text-white font-bold mb-6">Book Details</h2>
                <form method="POST" action={{route("admin.book.store")}} class="space-y-4">
                    @csrf
                    <div class="d-flex justify-between align-start mb-3">
                    <div class="col-5" >
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" value="{{old('title')}}" />
                    <x-input-error :messages="$errors->get('title')" class="text-red-600"/>
                    </div>
                    <div class="col-5" >
                        <x-input-label for="author" :value="__('Author')" />
                        <x-text-input id="author" list="author-list" name="author" type="text" class="mt-1 block w-full"  value="{{old('author')}}" />
                        <x-input-error :messages="$errors->get('author')" class="text-red-600"/>
                        <datalist id="author-list">
                            @foreach($authors as $author)
                                <option value="{{$author->name}}"></option>
                            @endforeach
                        </datalist>
                    </div>
                    </div>
                    <div class="d-flex justify-between align-start">
                        <div class="col-5" >
                            <x-input-label for="genre" :value="__('Genre')" />
                            <x-text-input id="genre" list="genre-list" name="genre" type="text" class="mt-1 block w-full" value="{{old('genre')}}"  />
                            <x-input-error :messages="$errors->get('genre')" class="text-red-600"/>
                            <datalist id="genre-list">
                                @foreach($genres as $genre)
                                    <option value="{{$genre->name}}"></option>
                                @endforeach
                            </datalist>
                        </div>
                        <div class="col-5" >
                            <x-input-label for="quantity" :value="__('Quantity')" />
                            <x-text-input id="quantity" name="quantity" type="number" class="mt-1 block w-full" value="{{old('quantity')}}"  />
                            <x-input-error :messages="$errors->get('quantity')" class="text-red-600"/>
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

