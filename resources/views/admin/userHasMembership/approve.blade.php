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
                <div class="card-body">
                    <div class="d-flex">
                    <div class="mb-3">
                        <h5 class="card-title">Name:</h5>
                        <p class="card-text">{{$userMembershipPurchaseApprove->user->name}}</p>
                    </div>
                    <div class="mb-3 " style="margin-left: 60%">
                        <h5 class="card-title">Membership:</h5>
                        <p class="card-text">{{$userMembershipPurchaseApprove->membership->membershipLevel}}</p>
                    </div>
                    </div>
                    <div class="d-flex">
                        <div class="mb-3">
                            <h5 class="card-title">Status:</h5>
                            <p class="card-text">{{$userMembershipPurchaseApprove->status}}</p>
                        </div>
                        <div class="mb-3 " style="margin-left: 60%">
                            <h5 class="card-title">Starting Date:</h5>
                            <p class="card-text">{{$userMembershipPurchaseApprove->startingDate}}</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <h5 class="card-title">Proof:</h5>
                        <img src="{{ $userMembershipPurchaseApprove->qr != NULL ? asset('storage/membership/'. $userMembershipPurchaseApprove->user->id . '/' . $userMembershipPurchaseApprove->qr) : asset('images/no-image.png') }}"
                             alt="ProofImage" class="img-fluid img-thumbnail">
                    </div>

                    @if($userMembershipPurchaseApprove->status != 'Active')
                      <a class="inline-flex items-center px-4 py-2 dborder border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 bg-main primary_button"
                     href="{{route('admin.membership.approve.store',['id' =>$userMembershipPurchaseApprove->id ])}}"   >
                       Approve
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
