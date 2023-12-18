<div class="row">
    <div class="col-xl-6 mx-auto">
        <div class="card">
            <div class="card-body flex flex-col justify-center items-center">
                <div class="mar-ver pad-btm text-center">
                    @if ($errors->any())
                        <div role="alert">
                            <div class="border border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <h1 class="h3 text-2xl font-bold mt-4">Login Credentials</h1>
                    <p class="mt-2 max-w-3xl text-center mx-auto">
                        Fill this form with basic information & admin login credentials
                    </p>
                </div>
                <div class="text-muted font-13">
                    <form wire:submit="submit">
                        @csrf
                        <div class="flex flex-wrap max-w-md mx-auto p-6">
                            <div class="pb-8 pr-6 w-full">
                                <x-laravel-envato::label for="firstName">First name</x-laravel-envato::label>
                                <x-laravel-envato::input type="text" id="firstName" wire:model="first_name" autocomplete="off"  required="true"/>
                            </div>

                            <div class="pb-8 pr-6 w-full">
                                <x-laravel-envato::label for="lastName">Last Name</x-laravel-envato::label>
                                <x-laravel-envato::input type="text" id="lastName" wire:model="last_name" autocomplete="off" required="true" />
                            </div>

                            <div class="pb-8 pr-6 w-full">
                                <x-laravel-envato::label for="email">Admin Email</x-laravel-envato::label>
                                <x-laravel-envato::input type="email" id="email" wire:model="email" class="form-input" autocomplete="off" required="true" />
                            </div>

                            <div class="pb-8 pr-6 w-full">
                                <x-laravel-envato::label for="password">Admin Password</x-laravel-envato::label>
                                <x-laravel-envato::input type="password" id="password" wire:model="password" autocomplete="off" required="true" />
                            </div>
                        </div>
                        <div class="text-center mt-5">
                            <x-laravel-envato::button type="submit">Continue</x-laravel-envato::button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
