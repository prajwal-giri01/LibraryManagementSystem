@extends('user.sidebar')
@section("main-content")
    <style>
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            /*justify-content: center;*/
            padding: 20px;
        }

        .card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 260px;
            margin: 10px;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-content {
            padding: 20px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .card-header h3 {
            font-size: 1.25em;
            margin: 0;
        }

        .card-header .actions a {
            color: #007bff;
            text-decoration: none;
            font-size: 1.25em;
        }

        .card-header .actions a:hover {
            color: #0056b3;
        }

        .card-body p {
            margin: 5px 0;
        }

        .no-items {
            text-align: center;
            width: 100%;
            padding: 20px;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .no-items h5 {
            margin: 0;
            font-size: 1.5em;
            color: #666;
        }

        .pagination {
            text-align: center;
            margin: 20px 0;
        }


    </style>

    <div class="ad_displayDetails col-10">

        <div class="card-container">
            @if($currentBooks->isEmpty())
                <div class="no-items">
                    <h5>There is no item in the List.</h5>
                </div>
            @else
                @foreach($currentBooks as $currentBook)
                    <div class="card">
                        <div class="card-content">
                            <div class="card-header">
                                <h3 class="hide-overflow" title="{{ $currentBook->book->title }}">{{ $currentBook->book->title }}</h3>
                                <div class="actions">

                                </div>
                            </div>
                            <div class="card-body">
                                <p><strong>From:</strong> {{ date('Y-m-d', strtotime($currentBook->startingDate)) }}</p>
                                <p><strong>To:</strong> {{ date('Y-m-d', strtotime($currentBook->endingDate)) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="pagination">
            {{ $currentBooks->links() }}
        </div>


    </div>
@endsection
