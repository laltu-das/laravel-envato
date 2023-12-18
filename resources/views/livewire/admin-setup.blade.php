<div class="container pt-5">
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
                        <form method="POST" wire:submit="submit" onsubmit="document.getElementById('loader').classList.add('active')">
                            @csrf
                            <div class="flex flex-wrap max-w-3xl mx-auto p-6">
                                <div class="pb-8 pr-6 w-full lg:w-1/2">
                                    <label class="form-label" for="firstName">First name</label>
                                    <input type="text" id="firstName" name="first_name" class="form-input" value="" autocomplete="off" required />
                                </div>

                                <div class="pb-8 pr-6 w-full lg:w-1/2">
                                    <label class="form-label" for="lastName">Last Name</label>
                                    <input type="text" id="lastName" name="last_name" class="form-input" value="" autocomplete="off" required />
                                </div>

                                <div class="pb-8 pr-6 w-full lg:w-1/2">
                                    <label class="form-label" for="email">Admin Email</label>
                                    <input type="email" id="email" name="email" class="form-input" autocomplete="off" required />
                                </div>

                                <div class="pb-8 pr-6 w-full lg:w-1/2">
                                    <label class="form-label" for="password">Admin Password</label>
                                    <input type="password" id="password" name="password" class="form-input" autocomplete="off" required />
                                </div>
                            </div>

                            <div class="flex flex-col justify-center import_processing" id="loader">
                                <div class="btn-spinner importing mr-2"></div>
                                <span class="text-center">Working....</span>
                            </div>

                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-indigo hover:bg-indigo-800">Continue</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
