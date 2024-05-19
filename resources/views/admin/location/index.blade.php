@extends('admin.sideMenu')
@section("main-content")
    <div class="ad_displayDetails col-10">
        <div class="d-flex detail_top">
        <div class=" col-10">
            <form method="get" action={{route('admin.location')}} class="form-inline d-flex" style="width: auto; height: 3rem;">
            <input class="search mr-sm-2 text-black"  placeholder="Search...." aria-label="Search" name="location" autocomplete="off">
            <button class="bg-main btn my-2 my-sm-0 search-button" type="submit">
                <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;  font-size: 20px"></i>
            </button>
            </form>
        </div>
        <div class="cta_container col-2">
            <a href={{route("admin.location.trash.index")}}><i class="fa-solid fa-trash"></i></a>
            <a href={{route("admin.location.add")}}><i class="fa-solid fa-plus"></i></a>
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
                            <td colspan="4" class="text-center h5">There is no item in the list.</td>
                        </tr>
                    @else
                        @foreach($locations as $location)
                            <tr>
                                <td>{{ ($locations->currentPage() - 1) * $locations->perPage() + $loop->iteration }}</td>
                                <td>{{ $location->address }}</td>
                                <td>{{ $location->price }}</td>
                                <td>
                                    <div class="action_button_main">
                                        <a href={{route('admin.location.edit', ['id' => $location->id])}}><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{ route('admin.location.trash', ['id' => $location->id]) }}" ><i class="fa-solid fa-xmark"></i></a>

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
                    {!! $locations->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
