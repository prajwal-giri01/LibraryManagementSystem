<x-app-layout>
    <div class="container">
        <div class="d-flex justify-between small_slider">
            @foreach($books as $book)

            <div class="book-card">
                <img src="{{ $book->image ? asset("storage/books/images/$book->id/" . $book->image->image) : asset("images/no-image.jpg") }}">
                <div class="book-details d-flex justify-between bg text-white">
                    <div class="details">
                        <h4 class="book-title hide_overflow" style="max-width: 138px">{{$book->title}}</h4>
                        <p>{{$book->genres->name}}</p>
                    </div>
                    <div>
                        <a class="small_btn" href="#"> button</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
