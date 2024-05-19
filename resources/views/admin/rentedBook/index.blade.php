@extends('admin.sideMenu')
@section("main-content")
    <div class="ad_displayDetails col-10">
        <div class="d-flex detail_top">
            <div class=" col-10">
                <form method="get" action={{route('admin.membership')}} class="form-inline d-flex" style="width: auto; height: 3rem;">
                <input class="search mr-sm-2 text-black"  placeholder="Search...." aria-label="Search" name="rentedBook" autocomplete="off">
                <button class="bg-main btn my-2 my-sm-0 search-button" type="submit">
                    <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;  font-size: 20px"></i>
                </button>
                </form>
            </div>
            <div class="cta_container col-2">
{{--                <a href={{route("admin.rentedBook.trash.index")}}><i class="fa-solid fa-trash"></i></a>--}}
{{--                <a href={{route("admin.rentedBook.add")}}><i class="fa-solid fa-plus"></i></a>--}}
            </div>
        </div>
        <div class="event_container">
            <table>
                <thead>
                <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Books</th>
                    <th>From</th>
                    <th>To</th>
                    <th>isDamaged</th>
                    <th>isLate</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if($rentedBooks->isEmpty())
                    <tr>
                        <td colspan="9" class="text-center h5">There is no item in the List.</td>
                    </tr>
                @else
                    @foreach($rentedBooks as $rentedBook)
                        <tr>
                            <td>{{ ($rentedBooks->currentPage() - 1) * $rentedBooks->perPage() + $loop->iteration }}</td>
                            <td>{{ $rentedBook->user->name}}</td>
                            <td>{{ $rentedBook->book->title}}</td>
                            <td>{{ date('Y-m-d', strtotime($rentedBook->startingDate)) }}</td>
                            <td>{{ date('Y-m-d', strtotime($rentedBook->endingDate)) }}</td>
                            <td>{{ $rentedBook->isDamaged == 1 ? 'Yes' : 'No' }}</td>
                            <td>{{ $rentedBook->isLate == 1 ? 'Yes' : 'No' }}</td>
                            <td>{{ $rentedBook->status}}</td>
                            <td>
                                <div class="action_button_main">
                                    <a href="{{ route('admin.rented.book.single', ['id' => $rentedBook->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
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
                {!! $rentedBooks->render() !!}
            </div>
        </div>

    </div>
@endsection
