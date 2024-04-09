@extends('admin.sideMenu')
@section("main-content")
    <div class="ad_displayDetails col-10">
        <div class="d-flex">
            <div class="detail_top col-10">
                <h2>Books</h2>
            </div>
            <div class="cta_container col-2">
                <a href={{route("admin.book.trash.index")}}><i class="fa-solid fa-trash"></i></a>
                <a href={{route("admin.book.add")}}><i class="fa-solid fa-plus"></i></a>
            </div>
        </div>
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
                        <td colspan="5" class="text-center h5">There is no item in the List.</td>
                    </tr>
                @else
                    @foreach($books as $book)
                        <tr>
                            <td>{{ ($books->currentPage() - 1) * $books->perPage() + $loop->iteration }}</td>
                            <td>{{ $book->title}}</td>
                            <td>{{$book->authors->name }}</td>
                            <td>{{ $book->genres->name}}</td>
                            <td>
                                <div class="action_button_main">
                                    <a href="{{route('admin.book.edit',['id'=>$book->id])}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{ route('admin.book.trash', ['id' => $book->id]) }}"><i class="fa-solid fa-xmark"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif

                </tbody>
            </table>
        </div>
        <div class="row mt-4">
            <div class="col-xs-12">
                {!! $books->render() !!}
            </div>
        </div>

    </div>
@endsection
