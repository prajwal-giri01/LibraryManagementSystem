@extends('admin.sideMenu')
@section("main-content")
    <div class="ad_displayDetails col-10">
        <div class="d-flex">
            <div class="detail_top col-12">
                <h2>Membership</h2>
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
                        <td colspan="5" class="text-center h5">There is no item in the trash.</td>
                    </tr>
                @else
                    @foreach($memberships as $membership)
                        <tr>
                            <td>{{ ($memberships->currentPage() - 1) * $memberships->perPage() + $loop->iteration }}</td>
                            <td>{{ $membership->membershipLevel}}</td>
                            <td>{{ $membership->numberOfBooks}}</td>
                            <td>{{ $membership->price}}</td>
                            <td>
                                <div class="action_button">
                                    <a href="{{ route('admin.membership.restore', ['id' => $membership->id]) }}"><i class="fa-solid fa-rotate-left"></i></a>
                                    <form method="post" action={{route('admin.membership.delete', ['id' => $membership->id])}} >
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
        <div class="row mt-4">
            <div class="col-xs-12">
                {!! $memberships->render() !!}
            </div>
        </div>

    </div>
@endsection
