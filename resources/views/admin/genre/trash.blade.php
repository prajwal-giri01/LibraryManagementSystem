@extends('admin.sideMenu')
@section("main-content")
    <div class="ad_displayDetails col-10">
        <div class="d-flex">
            <div class="detail_top col-12">
                <h2>Genre</h2>
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
                        <td colspan="3" class="text-center h5">There is no item in the trash.</td>
                    </tr>
                @else
                    @foreach($genres as $genre)
                        <tr>
                            <td>{{ ($genres->currentPage() - 1) * $genres->perPage() + $loop->iteration }}</td>
                            <td>{{ $genre->name }}</td>
                            <td>
                                <div class="action_button">
                                    <a href="{{ route('admin.genre.restore', ['id' => $genre->id]) }}"><i class="fa-solid fa-rotate-left"></i></a>
                                    <form method="post" action={{route('admin.genre.delete', ['id' => $genre->id])}} >
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
                {!! $genres->render() !!}
            </div>
        </div>

    </div>
@endsection
