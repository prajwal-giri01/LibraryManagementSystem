@extends('admin.sideMenu')
@section("main-content")
    <div class="ad_displayDetails col-10">
        <div class="d-flex">
            <div class="detail_top col-12">
                <h2>Author</h2>
            </div>

        </div>
        <div class="detail_content">

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
                    @if($authors->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center h5">There is no item in the trash.</td>
                        </tr>
                    @else
                        @foreach($authors as $author)
                            <tr>
                                <td>{{ ($authors->currentPage() - 1) * $authors->perPage() + $loop->iteration }}</td>
                                <td>{{ $author->name }}</td>
                                <td>
                                    <div class="action_button">
                                        <a href="{{ route('admin.author.restore', ['id' => $author->id]) }}"><i class="fa-solid fa-rotate-left"></i></a>

                                        <form method="post" action={{route('admin.author.delete', ['id' => $author->id])}} >
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
                    {!! $authors->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
