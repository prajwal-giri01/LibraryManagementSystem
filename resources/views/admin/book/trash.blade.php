@extends('admin.sideMenu')
@section("main-content")
    <div class="ad_displayDetails col-10">
        <div class="d-flex">
            <div class="detail_top col-12">
                <h2>Book</h2>
            </div>

        </div>
        <div class="detail_content">

            <div class="event_container">
                <table>
                    <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Genre</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($books->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center h5">There is no item in the trash.</td>
                        </tr>
                    @else
                        @foreach($books as $book)
                            <tr>
                                <td>{{ ($books->currentPage() - 1) * $books->perPage() + $loop->iteration }}</td>
                                <td>{{ $book->title}}</td>
                                <td>{{$book->authors->name }}</td>
                                <td>{{ $book->genres->name}}</td>
                                <td>
                                    <div class="action_button">
                                        <a href="{{ route('admin.book.restore', ['id' => $book->id]) }}"><i class="fa-solid fa-rotate-left"></i></a>

                                        <form method="post" action={{route('admin.book.delete', ['id' => $book->id])}} >
                                            @csrf
                                            @method('delete')
                                            <button class="action_button_delete"><i class="fa-solid fa-trash"></i></button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    {!! $books->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
