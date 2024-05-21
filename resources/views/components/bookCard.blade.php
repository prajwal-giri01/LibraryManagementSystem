@props(['book','addresses'])
<!-- Book Card -->
<div class="book-card">
    <a href="#" id="openModal{{$book->id}}">
        <a href={{route('book',["id"=>$book->id])}}>
            <img
                src="{{ $book->image->image ? asset('storage/books/images/' . $book->id . '/' . $book->image->image) : asset('images/no-image.jpg') }}">
        </a>
        <div class="book-details bg text-white">
            <div class="details">
                <h4 class="book-title hide-overflow" title="{{ $book->title }}">{{ $book->title }}</h4>
                <div class="d-flex justify-content-between align-items-end">
                    <div style="width: 145px; max-width: 145px;">
                        <p class="hide-overflow" title="{{ $book->genres->name }}">{{ $book->genres->name }}</p>
                        <p class="hide-overflow" title="{{ $book->authors->name }}">{{ $book->authors->name }}</p>
                    </div>
                    <button class="small_btn" style="max-height: 35px;" id="openButton{{$book->id}}">Rent</button>
                </div>
            </div>
        </div>
    </a>
</div>

<!-- Modal Structure -->
<div class="modal fade" id="bookModal{{$book->id}}" tabindex="-1" aria-labelledby="bookModalLabel{{$book->id}}"
     aria-hidden="true">
    <div class="modal-dialog modalqr text-white" style="width: 25rem !important;">
        <div class="modal-content dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="modal-header">
                <h5 class="modal-title fw-bolder" id="bookModalLabel{{$book->id}}">Confirm Your Purchase</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="checkoutOptionForm{{$book->id}}">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <p>Please choose an option for how you would like to receive the book.</p>
                    <div class="mt-4">
                        <div>
                            <x-input-label for="startingDate{{$book->id}}" :value="__('Starting Date')" />
                            <x-text-input id="startingDate{{$book->id}}" class="block mt-1 w-full text-black" type="date" name="startingDate"
                                          :value="old('startingDate')" min="{{ \Carbon\Carbon::now()->toDateString() }}" max="{{ \Carbon\Carbon::now()->addMonth()->toDateString() }}" required />
                            <x-input-error :messages="$errors->get('startingDate')" class="mt-2"/>
                        </div>
                        <div class="mt-4">
                            <x-input-label for="endingDate{{$book->id}}" :value="__('Ending Date')"/>
                            <x-text-input id="endingDate{{$book->id}}" class="block mt-1 w-full text-black" type="date" name="endingDate"
                                          :value="old('endingDate')" min="{{ \Carbon\Carbon::now()->toDateString() }}" max="{{ \Carbon\Carbon::now()->addMonth()->toDateString() }}" required />
                            <x-input-error :messages="$errors->get('endingDate')" class="mt-2"/>
                        </div>

                        <div id="deliveryFields{{$book->id}}" style="display: none;">
                            <div class="mt-4">
                                <x-input-label for="address{{$book->id}}" :value="__('Address')" />
                                <select id="address{{$book->id}}" class="block mt-1 w-full text-black" name="address">
                                    <option selected disabled>Select your location</option>
                                    @foreach($addresses as $address)
                                        <option value="{{ $address->id }}" data-price="{{ $address->price }}">{{ $address->address }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                            </div>
                            <div class="mt-4">
                                <x-input-label for="price{{$book->id}}" :value="__('Price')" />
                                <x-text-input id="price{{$book->id}}" class="block mt-1 w-full text-black" type="text" name="price"
                                              :value="old('price')" disabled />
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="pickup{{$book->id}}" class="btn inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 bg-main primary_button"
                            style="background-color: #6c757d;" onclick="setAction('pickup', {{$book->id}})">
                        Pick Up
                    </button>
                    <button type="button" id="delivery{{$book->id}}" class="btn inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 bg-main primary_button">
                        Request Delivery
                    </button>
                    <button type="button" id="deliveryAction{{$book->id}}" class="btn inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 bg-main primary_button"
                            style="display: none; background-color: #6c757d;" onclick="setAction('delivery', {{$book->id}})">
                        Request Delivery
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const bookId = @json($book->id);
        const openButton = document.getElementById(`openButton${bookId}`);
        const modal = new bootstrap.Modal(document.getElementById(`bookModal${bookId}`));

        openButton.addEventListener('click', (e) => {
            e.preventDefault();
            modal.show();
        });

        function setAction(actionType, bookId) {
            const form = document.getElementById(`checkoutOptionForm${bookId}`);
            if (actionType === 'pickup') {
                form.action = "{{route('book.purchase.pickup', ['id' => $book->id])}}".replace('{{$book->id}}', bookId);
            } else if (actionType === 'delivery') {
                form.action = "{{route('book.purchase.delivery', ['id' => $book->id])}}".replace('{{$book->id}}', bookId);
            }
            form.submit();
        }

        const deliveryButton = document.getElementById(`delivery${bookId}`);
        const deliveryActionButton = document.getElementById(`deliveryAction${bookId}`);
        const pickupButton = document.getElementById(`pickup${bookId}`);
        const deliveryFields = document.getElementById(`deliveryFields${bookId}`);

        deliveryButton.addEventListener('click', function () {
            pickupButton.style.display = 'none';
            deliveryButton.style.display = 'none';
            deliveryActionButton.style.display = 'inline-flex';
            deliveryFields.style.display = 'block';
        });

        deliveryActionButton.addEventListener('click', function () {
            setAction('delivery', bookId);
        });

        pickupButton.addEventListener('click', function () {
            setAction('pickup', bookId);
        });

        document.getElementById(`startingDate${bookId}`).addEventListener('change', function () {
            document.getElementById(`endingDate${bookId}`).min = this.value;
        });

        document.getElementById(`address${bookId}`).addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            document.getElementById(`price${bookId}`).value = selectedOption.getAttribute('data-price');
        });
    });
</script>
