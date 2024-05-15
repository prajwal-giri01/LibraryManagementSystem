@extends('admin.sideMenu')
@section("main-content")
    <div class="ad_displayDetails col-10">
        <div class="d-flex detail_top">
        <div class=" col-10">
            <form method="get" action={{route('admin.author')}} class="form-inline d-flex" style="width: auto; height: 3rem;">
            <input class="search mr-sm-2 text-black"  placeholder="Search...." aria-label="Search" name="author" autocomplete="off">
            <button class="bg-main btn my-2 my-sm-0 search-button" type="submit">
                <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;  font-size: 20px"></i>
            </button>
            </form>
        </div>
        <div class="cta_container col-2">
            <a href={{route("admin.author.trash.index")}}><i class="fa-solid fa-trash"></i></a>
            <a href={{route("admin.author.add")}}><i class="fa-solid fa-plus"></i></a>
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
                            <td colspan="3" class="text-center h5">There is no item in the list.</td>
                        </tr>
                    @else
                        @foreach($authors as $author)
                            <tr>
                                <td>{{ ($authors->currentPage() - 1) * $authors->perPage() + $loop->iteration }}</td>
                                <td>{{ $author->name }}</td>
                                <td>
                                    <div class="action_button_main">
                                        <a href={{route('admin.author.edit', ['id' => $author->id])}}><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{ route('admin.author.trash', ['id' => $author->id]) }}" ><i class="fa-solid fa-xmark"></i></a>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div  class="row mt-4">
                <div class="col-xs-12">
                    {!! $authors->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
