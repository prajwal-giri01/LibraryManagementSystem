@extends('admin.sideMenu')
@section('main-content')
    <div class="ad_displayDetails col-10 mt-2">
        <div class=" w-full flex justify-center items-center">
            <div class="rounded-lg shadow-md   w-full bg dark:bg-gray-800 p-5">
                <h2 class="text-center  text-white font-bold mb-6">Book Details</h2>
                <form method="POST" action={{route("admin.book.store")}} class="space-y-4"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex justify-between align-start">
                        <div >
                            <x-input-label for="image" :value="__('Book Cover')"/>
                            <div class="user_profileCircleUp">
                                <img id="image" class="avatar" src="{{asset('/images/no-image.png')}}">
                                <div class="upload-button">
                                    <i class="fa fa-camera"></i>
                                    <input name="image" class="input-file-upload" id="image"
                                           type="file" accept="image/png, image/gif, image/jpeg, image/webp, image/jpg"
                                           onchange="readURL(this);">
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('image')" class="text-red-600"/>
                        </div>

                    </div>
                    <div class="d-flex justify-between align-start mb-3">

                        <div class="col-5">
                            <x-input-label for="title" :value="__('Title')"/>
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                          value="{{old('title')}}"/>
                            <x-input-error :messages="$errors->get('title')" class="text-red-600"/>
                        </div>
                        <div class="col-5">
                            <x-input-label for="author" :value="__('Author')"/>
                            <select id="author" name="author" class="mt-1 block w-full">
                                @foreach($authors as $author)
                                    <option value="{{$author->id}}">{{$author->name}}</option>
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
                                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('genre')" class="text-red-600"/>
                        </div>
                        <div class="col-5">
                            <x-input-label for="quantity" :value="__('Quantity')"/>
                            <x-text-input id="quantity" name="quantity" type="number" class="mt-1 block w-full"
                                          value="{{old('quantity')}}"/>
                            <x-input-error :messages="$errors->get('quantity')" class="text-red-600"/>
                        </div>
                    </div>
                    <div class="col-12">
                        <x-input-label for="description" :value="__('Description')"/>
                        <textarea id="description" name="description" class="mt-1 block w-full rounded">{{old('description')}}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="text-red-600"/>
                    </div>
                    <div class="mt-4">
                        <x-primary-button>{{ __('save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#' + input.id)
                    .attr('src', e.target.result)
                // .width(150)
                // .height(200)
                ;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
