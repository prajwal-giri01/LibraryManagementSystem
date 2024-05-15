@extends('admin.sideMenu')
@section("main-content")
    <div class="ad_displayDetails col-10">
    <div class="event_container">
        <table>
            <thead>
            <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Feedback</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if($feedbacks->isEmpty())
                <tr>
                    <td colspan="5" class="text-center h5">There is no item in the List.</td>
                </tr>
            @else
                @foreach($feedbacks as $feedback)
                    <a href="{{route('feedback.single',['id' => $feedback->id])}}">
                    <tr>
                        <td>{{ ($feedbacks->currentPage() - 1) * $feedbacks->perPage() + $loop->iteration }}</td>
                        <td>{{ $feedback->name}}</td>
                        <td>{{ $feedback->email}}</td>
                        <td>{{ $feedback->feedback}}</td>
                        <td>
                            <div class="action_button_main">
                                <a href="{{ route('admin.feedback.delete',['id' => $feedback->id]) }}"><i class="fa-solid fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                    </a>
                @endforeach
            @endif

            </tbody>
        </table>
    </div>
    <div class="row mt-4">
        <div class="col-xs-12">
            {!! $feedbacks->render() !!}
        </div>
    </div>
    </div>
@endsection
