@extends('admin.sideMenu')

@section("main-content")
    <Style>
        .ad_displayDetails {
            background-color: #f8f9fa; /* Light grey background */
            padding: 20px;
            border-radius: 8px;
        }

        .card {
            background-color: #ffffff; /* White card background */
            border: 1px solid #dee2e6; /* Light grey border */
            border-radius: 8px; /* Rounded corners */
        }

        .card-title {
            font-weight: bold;
            color: #333333; /* Dark grey text */
        }

        .card-text {
            color: #555555; /* Medium grey text */
        }

        .img-thumbnail {
            max-width: 50%; /* Make sure the image is responsive */
            height: auto;
            border: 2px solid #dee2e6; /* Add a border to the image */
            border-radius: 8px; /* Rounded corners for the image */
        }

    </Style>

    <div class="ad_displayDetails col-10 mt-2">
        <div class="w-full d-flex justify-content-center align-items-center flex-column">
            <div class="card shadow-sm w-75 p-3">
                <div class="container">
                    <div class="">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h5 class="card-title">Name:</h5>
                                        <p class="card-text">{{$rentedBook->user->name}}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h5 class="card-title">Book:</h5>
                                        <p class="card-text">{{$rentedBook->book->title}}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h5 class="card-title">Starting Date:</h5>
                                        <p class="card-text">{{ date('Y-m-d', strtotime($rentedBook->startingDate)) }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h5 class="card-title">Ending Date:</h5>
                                        <p class="card-text">{{ date('Y-m-d', strtotime($rentedBook->endingDate)) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h5 class="card-title">Status:</h5>
                                        <p class="card-text">{{$rentedBook->status}}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h5 class="card-title">Penalty Amount:</h5>
                                        <p class="card-text">{{ $rentedBook->penaltyAmount == NULL ? 0: $rentedBook->penaltyAmount }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h5 class="card-title">Damaged:</h5>
                                        <p class="card-text">{{ $rentedBook->isDamaged == 1 ? 'Yes' : 'No' }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h5 class="card-title">Late:</h5>
                                        <p class="card-text">{{ $rentedBook->isLate == 1 ? 'Yes' : 'No' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h5 class="card-title">Delivery:</h5>
                                        <p class="card-text">{{ $rentedBook->delivery_id == NULL ? 'No' : $rentedBook->delivery_id }}</p>
                                    </div>
                                    @if($rentedBook->delivery_id != NULL)
                                        <div class="mb-3">
                                            <h5 class="card-title">Delivery Price:</h5>
                                            <p class="card-text">{{ $rentedBook->delivery->price }}</p>
                                        </div>
                                    @endif

                                </div>
                                <div class="col-md-6">
                                    @if($rentedBook->delivery_id != NULL)
                                        <div class="mb-3">
                                            <h5 class="card-title">Delivery Location:</h5>
                                            <p class="card-text">{{ $rentedBook->delivery->address}}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>


                            @if($rentedBook->status == 'Pending')
                                <div class="row">
                                    <div class="col-md-12">
                                        <a class="btn btn-primary" href="{{route('admin.book.status.ongoing',['id' =>$rentedBook->id ])}}">Ongoing</a>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-md-12">
                                        <a class="btn btn-primary" data-toggle="modal" data-target="#bookModal" >Completed</a>
                                    </div>
                                </div>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade feedback" id="bookModal" tabindex="-1" role="dialog" aria-labelledby="bookModalLabel" aria-hidden="true" >
        <div class=" modal-dialog modalqr" role="document">
            <div class="modal-content " style="background-color: #eff0f2">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="bookModalLabel">Completion Of Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.book.status.completed', ['id' => $rentedBook->id]) }}">
                        @csrf
                        <div class="form-group d-flex">
                            <x-input-label for="damaged" value="{{ __('is Damaged') }}" style="color: black !important;" />
                            <input id="damaged" name="damaged" type="checkbox" class="mt-1 ml-3" onchange="toggleAmountField()">
                            <x-input-error class="mt-2" :messages="$errors->get('damaged')" />
                        </div>
                        <div class="form-group mt-3" id="amountField" style="display: none;">
                            <x-input-label for="amount" value="{{ __('Amount') }}" style="color: black !important;" />
                            <x-text-input id="amount" name="amount" type="number" class="mt-1 block w-full" />
                            <x-input-error class="mt-2" :messages="$errors->get('amount')" />
                        </div>
                        <x-primary-button class="mt-3">{{ __('Submit') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
<script>
    function toggleAmountField() {
        var damagedCheckbox = document.getElementById('damaged');
        var amountField = document.getElementById('amountField');
        if (damagedCheckbox.checked) {
            amountField.style.display = 'block';
        } else {
            amountField.style.display = 'none';
        }
    }
</script>
