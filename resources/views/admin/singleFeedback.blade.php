@extends('admin.sideMenu')
@section("main-content")

    <style>
        .feedback-card {
            margin: 20px;
            padding: 20px;
            border: 1px solid #e3e3e3;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .feedback-card-title {
            font-size: 1.5rem;
            color: #343a40;
        }
        .feedback-card-subtitle {
            font-size: 1rem;
            color: #6c757d;
        }
        .feedback-card-text {
            font-size: 1.2rem;
            color: #495057;
        }
        .feedback-card a {
            text-decoration: none;
        }
        .feedback-card a:hover {
            text-decoration: underline;
        }
    </style>
    <div class="container">
        <div class="feedback-card card">
            <div class="card-body">
                <h5 class="card-title feedback-card-title">
                    <a href="{{ route('admin.feedback.single', ['id' => $feedback->id]) }}">
                        {{ $feedback->name }}
                    </a>
                </h5>
                <h6 class="card-subtitle mb-2 text-muted feedback-card-subtitle">{{ $feedback->email }}</h6>
                <p class="card-text feedback-card-text">{{ $feedback->feedback }}</p>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
