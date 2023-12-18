<div class="container pt-5">
    <div class="row">
        <div class="col-xl-6 mx-auto">
            <div class="card">
                <div class="card-body flex flex-col justify-center items-center">
                    <div class="mar-ver pad-btm text-center">
                        @if (session()->has('error'))
                            <div role="alert">
                                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                    Invalid Database Credentials!!
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
                        <h1 class="h3 text-2xl font-bold mt-4">Database setup</h1>
                        <p class="mt-2 max-w-3xl text-center">
                            Fill this form with your database connection details. If you didn't create a database yet please create a new one and fill the following form.
                        </p>
                    </div>

                    <div class="text-muted font-13">
                        <form method="POST" wire:submit="submit">
                            @csrf
                            <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                                <div class="pb-8 pr-6 w-full lg:w-1/3">
                                    <label class="form-label" for="db_host">Host:</label>
                                    <input type="text" id="db_host" name="DB_HOST" class="form-input" value="127.0.0.1" autocomplete="off" required />
                                </div>

                                <div class="pb-8 pr-6 w-full lg:w-1/3">
                                    <label class="form-label" for="db_port">Port:</label>
                                    <input type="text" id="db_port" name="DB_PORT" class="form-input" value="3306" autocomplete="off" required />
                                </div>

                                <div class="pb-8 pr-6 w-full lg:w-1/3">
                                    <label class="form-label" for="db_name">Database:</label>
                                    <input type="text" id="db_name" name="DB_DATABASE" class="form-input" autocomplete="off" required />
                                </div>

                                <div class="pb-8 pr-6 w-full lg:w-1/3">
                                    <label class="form-label" for="db_user">Database Username:</label>
                                    <input type="text" id="db_user" name="DB_USERNAME" value="root" class="form-input" autocomplete="off" required />
                                </div>
                                <div class="pb-8 pr-6 w-full lg:w-1/3">
                                    <label class="form-label" for="db_pass">Database Password:</label>
                                    <input type="text" id="db_pass" name="DB_PASSWORD" class="form-input" autocomplete="off" />
                                </div>
                            </div>

                            <div class="flex justify-end pr-8">
                                <button type="submit" class="btn btn-indigo hover:bg-indigo-800">Next Step >></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
