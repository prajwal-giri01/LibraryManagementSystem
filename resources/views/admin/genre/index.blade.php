@extends('admin.sideMenu')
@section("main-content")
    <div class="ad_displayDetails col-10">
        <div class="d-flex">
            <div class="detail_top col-10">
                <h2>Genre</h2>
            </div>
            <div class="cta_container col-2">
                <a href={{route("admin.genre.trash.index")}}><i class="fa-solid fa-trash"></i></a>
                <a href={{route("admin.genre.add")}}><i class="fa-solid fa-plus"></i></a>
            </div>
        </div>
            <div class="event_container">
                <table>
                    <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($genres->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center h5">There is no item in the List.</td>
                        </tr>
                    @else
                        @foreach($genres as $genre)
                            <tr>
                                <td>{{ ($genres->currentPage() - 1) * $genres->perPage() + $loop->iteration }}</td>
                                <td>{{ $genre->name }}</td>
                                <td>
                                    <div class="action_button_main">
                                        <a href="{{ route('admin.genre.edit', ['id' => $genre->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{ route('admin.genre.trash', ['id' => $genre->id]) }}"><i class="fa-solid fa-xmark"></i></a>
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
                    {!! $genres->render() !!}
                </div>
            </div>

    </div>
@endsection
