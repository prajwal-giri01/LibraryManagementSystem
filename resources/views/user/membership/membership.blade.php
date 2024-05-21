@extends('user.sidebar')
@section("main-content")

    <div class="ad_displayDetails col-10">
        <div class="d-flex justify-content-around mt-4">
            @foreach($memberships as $membership)
                <div class="card" style="width: 18rem; ">
                    <div class="card-body text-center">
                        <p class="card-title h2">{{$membership->membershipLevel}}</p>
                        <p class="card-text pt-5 pb-5">
                            <span class="h3"> रु{{$membership->price}}</span>
                            <span>/month</span>
                        </p>

                        @php
                            $benefits = explode(',', $membership->Extra);
                        @endphp
                        @foreach($benefits as $benefit)
                            <p class="card-title font-bold">{{$benefit}} ,</p>
                        @endforeach
                    </div>

                    <!-- Button placed outside card-body -->
                    <div class="text-center mb-2">
                        @if($isActive == 0)
                            <button
                                class="inline-flex items-center px-4 py-2 dborder border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 bg-main primary_button"
                                data-toggle="modal" data-target="#myModal{{$membership->id}}">
                                Purchase
                            </button>
                        @else

                            <form method="post" action="{{route('membership.purchase',['id'=>$membership->id])}}">

                                @csrf
                                <button type="submit"
                                        class="inline-flex items-center px-4 py-2 dborder border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 bg-main primary_button"
                                >Purchase
                                </button>
                            </form>
                        @endif
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="myModal{{$membership->id}}" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modalqr" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bolder " id="myModalLabel">Purchase Confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Modal content goes here -->
                                <p class="border border-danger rounded border-2 p-2"><span
                                        class="fw-bolder "> Note: </span> Scan
                                    this QR code. Then, take a screenshot and upload the payment proof</p>
                                <img alt="Qr image" src="{{asset('images/qr.png')}}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn border" data-dismiss="modal">Close</button>
                                <x-primary-button data-toggle="modal" data-target="#ModalPayment{{$membership->id}}"
                                                  data-dismiss="modal">Next
                                </x-primary-button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="ModalPayment{{$membership->id}}" tabindex="-1" role="dialog"
                     aria-labelledby="ModalPaymentLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modalqr" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bolder " id="myModalLabel">Purchase Confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="{{route('membership.purchase',['id'=>$membership->id])}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <!-- Modal content goes here -->
                                    Please Insert the screenShot
                                    <div>
                                        <x-input-label for="image" :value="__('Upload Screenshot')"/>
                                        <div class="user_profileCircleUp">
                                            <img id="imagePreview{{$membership->id}}" class="avatar"
                                                 src="{{asset('/images/no-image.png')}}">
                                            <div class="upload-button">
                                                <i class="fa fa-camera"></i>
                                                <input name="image" class="input-file-upload"
                                                       id="imageUpload{{$membership->id}}"
                                                       type="file"
                                                       accept="image/png, image/gif, image/jpeg, image/webp, image/jpg"
                                                       onchange="readURL(this, 'imagePreview{{$membership->id}}');">
                                            </div>
                                        </div>
                                        <x-input-error :messages="$errors->get('image')" class="text-red-600"/>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn border" data-dismiss="modal">Close</button>
                                    <x-primary-button type="submit">Confirm Purchase</x-primary-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

<script>
    function readURL(input, previewId) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById(previewId).src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
