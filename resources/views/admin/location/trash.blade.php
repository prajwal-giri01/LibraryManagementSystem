@extends('admin.sideMenu')
@section("main-content")
    <div class="ad_displayDetails col-10">
        <div class="d-flex">
            <div class="detail_top col-12">
                <h2>Location</h2>
            </div>

        </div>
        <div class="detail_content">

            <div class="event_container">
                <table>
                    <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Address</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($locations->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center h5">There is no item in the trash.</td>
                        </tr>
                    @else
                        @foreach($locations as $location)
                            <tr>
                                <td>{{ ($locations->currentPage() - 1) * $locations->perPage() + $loop->iteration }}</td>
                                <td>{{ $location->address }}</td>
                                <td>{{ $location->price }}</td>
                                <td>
                                    <div class="action_button">
                                        <a href="{{ route('admin.location.restore', ['id' => $location->id]) }}"><i class="fa-solid fa-rotate-left"></i></a>

                                        <form method="post" action={{route('admin.location.delete', ['id' => $location->id])}} >
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
                    {!! $locations->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
