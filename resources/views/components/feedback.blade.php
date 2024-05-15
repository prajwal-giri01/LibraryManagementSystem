<div class="modal fade feedback" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="position: fixed; bottom: 0; right: 0;">
    <div class=" modal-dialog" role="document">
        <div class="modal-content" style="background-color: #eff0f2">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">Feedback</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('feedback') }}">
                    @csrf
                    <div class="form-group">
                        <x-input-label for="name" value="{{ __('Name') }}" style="color: black !important;" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                    <div class="form-group mt-3">
                        <x-input-label for="email" value="{{ __('Email') }}" style="color: black !important;" />
                        <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>
                    <div class="form-group mt-3">
                        <x-input-label for="feedback" value="{{ __('Feedback') }}" style="color: black !important;" />
                        <textarea class="form-control" id="feedback" rows="3" cols="5" name="feedback"></textarea>
                    </div>
                    <x-primary-button class="mt-3">{{ __('Submit') }}</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</div>
