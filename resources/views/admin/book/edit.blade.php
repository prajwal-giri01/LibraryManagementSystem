@extends('admin.sideMenu')
@section('main-content')
    <div class="ad_displayDetails col-10 mt-2">
        <div class=" w-full flex justify-center items-center">
            <div class="rounded-lg shadow-md  max-w-sm w-full bg dark:bg-gray-800 p-5">
                <h2 class="text-center  text-white font-bold mb-6">Book Details</h2>
                <form method="POST" action={{route("admin.book.update",['id'=>$book->id])}} class="space-y-4"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="d-flex justify-between align-start mb-3">
                        <div class="col-5">
                            <x-input-label for="title" :value="__('Title')"/>
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                          value="{{$book->title}}"/>
                            <x-input-error :messages="$errors->get('title')" class="text-red-600"/>
                        </div>
                        <div class="col-5">
                            <x-input-label for="author" :value="__('Author')"/>
                            <select  id="author" name="author" class="mt-1 block w-full" >
                                @foreach($authors as $author)
                                    <option value="{{$author->id}}" @if($author->id == $book->author) selected @endif>{{$author->name}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('author')" class="text-red-600"/>

                        </div>
                    </div>
                    <div class="d-flex justify-between align-start mb-3">
                        <div class="col-5">
                            <x-input-label for="genre" :value="__('Genre')"/>
                            <select id="genre" name="genre" class="mt-1 block w-full">
                                @foreach($genres as $genre)
                                    <option value="{{$genre->id}}" @if($genre->id==$book->genre) selected @endif >{{$genre->name}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('genre')" class="text-red-600"/>
                        </div>
                        <div class="col-5">
                            <x-input-label for="quantity" :value="__('Quantity')"/>
                            <x-text-input id="quantity" name="quantity" type="number" class="mt-1 block w-full"
                                          value="{{$book->quantity}}"/>
                            <x-input-error :messages="$errors->get('quantity')" class="text-red-600"/>
                        </div>
                    </div>
                    <div class="d-flex justify-between align-start">
                        <div class="col-5">
                            <x-input-label for="image" :value="__('Book Cover')"/>
                            <x-text-input id="image" name="image" type="file" class="mt-1 block w-full"
                                          value="{{old('image')}}" style="background-color: white"/>
                            <x-input-error :messages="$errors->get('image')" class="text-red-600"/>
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

