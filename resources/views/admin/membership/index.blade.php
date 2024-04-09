@extends('admin.sideMenu')
@section("main-content")
    <div class="ad_displayDetails col-10">
        <div class="d-flex">
            <div class="detail_top col-10">
                <h2>Membership</h2>
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
                        <td colspan="3" class="text-center h5">There is no item in the List.</td>
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
