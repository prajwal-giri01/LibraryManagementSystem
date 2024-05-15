@extends('admin.sideMenu')
@section("main-content")
    <div class="ad_displayDetails col-10">
        <div class="d-flex detail_top">
            <div class=" col-10">
                <form method="get" action={{route('admin.membership')}} class="form-inline d-flex" style="width: auto; height: 3rem;">
                <input class="search mr-sm-2 text-black"  placeholder="Search...." aria-label="Search" name="membership" autocomplete="off">
                <button class="bg-main btn my-2 my-sm-0 search-button" type="submit">
                    <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;  font-size: 20px"></i>
                </button>
                </form>
            </div>
            <div class="cta_container col-2">
                <a href={{route("admin.membership.trash.index")}}><i class="fa-solid fa-trash"></i></a>
                <a href={{route("admin.membership.add")}}><i class="fa-solid fa-plus"></i></a>
            </div>
        </div>
        <div class="event_container">
            <table>
                <thead>
                <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>BooksAllowed</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if($memberships->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center h5">There is no item in the List.</td>
                    </tr>
                @else
                    @foreach($memberships as $membership)
                        <tr>
                            <td>{{ ($memberships->currentPage() - 1) * $memberships->perPage() + $loop->iteration }}</td>
                            <td>{{ $membership->membershipLevel}}</td>
                            <td>{{ $membership->numberOfBooks}}</td>
                            <td>{{ $membership->price}}</td>
                            <td>
                                <div class="action_button_main">
                                    <a href="{{ route('admin.membership.edit', ['id' => $membership->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{ route('admin.membership.trash',['id' => $membership->id]) }}"><i class="fa-solid fa-xmark"></i></a>
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
                {!! $memberships->render() !!}
            </div>
        </div>

    </div>
@endsection
