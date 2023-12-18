<div class="row">
    <div class="col-xl-6 mx-auto">
        <div class="card">
            <div class="card-body flex flex-col justify-center items-center">
                <div class="mar-ver pad-btm text-center">
                    <h1 class="h3 text-2xl font-bold mt-4">HelpDesk Installation Steps</h1>
                    <p class="mt-1">You will need to know the following items before proceeding.</p>
                </div>
                <div class="flex justify-center mt-3">
                    <div class="px-6 py-2 rounded-lg border border-gray-200 w-full flex"><i class="check mr-2"></i> CodeCanyon purchase code</div>
                </div>
                <div class="flex justify-center gap-5 mt-3">
                    <ul class="bg-white rounded-lg border border-gray-200 w-96 text-gray-900">
                        <li class="px-6 py-2 border-b border-gray-200 w-full rounded-t-lg flex"><i class="check mr-2"></i> Database hostname</li>
                        <li class="px-6 py-2 border-b border-gray-200 w-full flex"><i class="check mr-2"></i> Database port</li>
                        <li class="px-6 py-2 border-b border-gray-200 w-full flex"><i class="check mr-2"></i> Database name</li>
                        <li class="px-6 py-2 border-b border-gray-200 w-full flex"><i class="check mr-2"></i> Database username</li>
                        <li class="px-6 py-2 border-b border-gray-200 w-full flex"><i class="check mr-2"></i> Database password</li>
                        <li class="px-6 py-2 border-b border-gray-200 w-full flex"><i class="check mr-2"></i> Pusher App ID</li>
                        <li class="px-6 py-2 border-b border-gray-200 w-full flex"><i class="check mr-2"></i> Pusher App Key</li>
                        <li class="px-6 py-2 w-full rounded-b-lg flex"><i class="check mr-2"></i> Pusher App Secret</li>
                    </ul>
                    <ul class="bg-white rounded-lg border border-gray-200 w-96 text-gray-900">
                        <li class="px-6 py-2 border-b border-gray-200 w-full rounded-t-lg flex"><i class="check mr-2"></i> Pusher App Cluster</li>
                        <li class="px-6 py-2 border-b border-gray-200 w-full flex"><i class="check mr-2"></i> SMTP Host</li>
                        <li class="px-6 py-2 border-b border-gray-200 w-full flex"><i class="check mr-2"></i> SMTP Port</li>
                        <li class="px-6 py-2 border-b border-gray-200 w-full flex"><i class="check mr-2"></i> SMTP Username</li>
                        <li class="px-6 py-2 border-b border-gray-200 w-full flex"><i class="check mr-2"></i> SMTP Password</li>
                        <li class="px-6 py-2 border-b border-gray-200 w-full flex"><i class="check mr-2"></i> SMTP Encryption</li>
                        <li class="px-6 py-2 border-b border-gray-200 w-full flex"><i class="check mr-2"></i> Mail from email</li>
                        <li class="px-6 py-2 w-full rounded-b-lg flex"><i class="check mr-2"></i> Mail from name</li>
                    </ul>
                </div>
                <p class="px-8 mt-6 text-center">
                    During the installation process, we will check if the files that are needed to be written
                    (<strong>.env file</strong>) have
                    <strong>write permission</strong>. We will also check if some php extensions are enabled on your server or not.
                </p>
                <p class="mt-5">
                    Gather the information mentioned above before hitting the <strong>Next Step</strong> button. If you are ready....
                </p>
                <br>
                <div class="text-center">
                    <x-laravel-envato::link href="{{ route('install.pre-installation') }}" class="btn btn-indigo hover:bg-indigo-800">
                        Next Step >>
                    </x-laravel-envato::link>
                </div>
            </div>
        </div>
    </div>
</div>
