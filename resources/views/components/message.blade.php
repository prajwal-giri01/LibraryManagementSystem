@if (session()->has('message'))
    <div x-data="{show: true}"
         x-init="setTimeout(() => show = false, 3000)"
         x-show="show" class="position-fixed top-0 end-0 bg-main text-white p-3">
        <p>
            {{session('message')}}
        </p>
    </div>

@endif
@if (session()->has('error'))
    <div x-data="{show: true}"
         x-init="setTimeout(() => show = false, 3000)"
         x-show="show" class="position-fixed top-0 end-0 bg-danger  text-white p-3">
        <p>
            {{session('error')}}
        </p>
    </div>

@endif
