<div class="row">
    <div class="col-xl-6 mx-auto">
        <div class="card">
            <div class="card-body flex flex-col justify-center items-center">
                <div class="mar-ver pad-btm text-center">
                    @if (session()->has('error'))
                        <div role="alert">
                            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                Error!!
                            </div>
                            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                                @if(is_array(session('error')))
                                    @foreach (session('error') as $message)
                                        <p>{{ $message }}</p>
                                    @endforeach
                                @else
                                    {{ session('error') }}
                                @endif
                            </div>
                        </div>
                    @endif
                    <h1 class="h3 text-2xl font-bold mt-4">Purchase Code</h1>
                    <p class="mt-2">
                        Provide your CodeCanyon purchase code.<br>
                    </p>
                </div>
                <div class="text-muted font-13">
                    <form wire:submit="submit">
                        <div class="mt-7 mb-8 w-full">
                            <x-laravel-envato::label for="purchase_code">Purchase Code:</x-laravel-envato::label>
                            <x-laravel-envato::input type="text" wire:model="purchase_code" id="purchase_code" name="purchase_code" placeholder="Enter random value!" />
                        </div>
                        <div class="text-center">
                            <x-laravel-envato::button type="submit" class="btn btn-indigo hover:bg-indigo-800">Next Step >></x-laravel-envato::button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
