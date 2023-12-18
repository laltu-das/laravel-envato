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
                        <h1 class="h3 text-2xl font-bold mt-4">Chat and Mail Setup</h1>
                        <p class="mt-2 max-w-3xl text-center mx-auto">
                            Please register on <a href="#">pusher</a> and fill out the following fields.
                        </p>
                    </div>

                    <div class="text-muted font-13">
                        <form method="POST" wire:submit="submit">
                            @csrf
                            <div class="flex justify-center">
                                <label class="inline-flex items-center mt-3">
                                    <input id="pusherCheck" type="checkbox" name="skip_pusher" class="form-checkbox h-5 w-5 text-gray-600">
                                    <span class="ml-2 text-gray-700">Check this to skip setup <b>Pusher</b> later from dashboard settings</span>
                                </label>
                            </div>
                            <div class="flex flex-wrap -mb-8 -mr-6 p-8" id="pusherSetup">
                                <div class="pb-8 pr-6 w-full lg:w-1/4">
                                    <label class="form-label" for="pusherAppID">Pusher App ID:</label>
                                    <input type="text" id="pusherAppID" name="PUSHER_APP_ID" class="form-input" value="" autocomplete="off" required />
                                </div>

                                <div class="pb-8 pr-6 w-full lg:w-1/4">
                                    <label class="form-label" for="pusherAppKey">Pusher App Key:</label>
                                    <input type="text" id="pusherAppKey" name="PUSHER_APP_KEY" class="form-input" value="" autocomplete="off" required />
                                </div>

                                <div class="pb-8 pr-6 w-full lg:w-1/4">
                                    <label class="form-label" for="pusherAppSecret">Pusher App Secret:</label>
                                    <input type="text" id="pusherAppSecret" name="PUSHER_APP_SECRET" class="form-input" autocomplete="off" required />
                                </div>

                                <div class="pb-8 pr-6 w-full lg:w-1/4">
                                    <label class="form-label" for="pusherAppCluster">Pusher App Cluster:</label>
                                    <input type="text" id="pusherAppCluster" name="PUSHER_APP_CLUSTER" class="form-input" autocomplete="off" required />
                                </div>
                            </div>

                            <p class="justify-center text-center"> Please fill up following fields for the SMTP mail setup. You can use any SMTP info such as your own domain mail smtp, GMail SMTP, MailGun, SendGrid, MailChimp, etc.  </p>
                            <div class="flex justify-center">
                                <label class="inline-flex items-center mt-3">
                                    <input id="smtpCheck" type="checkbox" name="skip_mailer" class="form-checkbox h-5 w-5 text-gray-600">
                                    <span class="ml-2 text-gray-700">Check this to skip setup <b>SMTP</b> later from dashboard settings</span>
                                </label>
                            </div>
                            <div class="flex flex-wrap -mb-8 -mr-6 p-8" id="smtpSetup">
                                <div class="pb-8 pr-6 w-full lg:w-1/4">
                                    <label class="form-label" for="mailerHost">SMTP Host:</label>
                                    <input type="text" id="mailerHost" name="MAIL_HOST" class="form-input" value="" autocomplete="off" required />
                                </div>

                                <div class="pb-8 pr-6 w-full lg:w-1/4">
                                    <label class="form-label" for="mailerPort">SMTP Port:</label>
                                    <input type="text" id="mailerPort" name="MAIL_PORT" class="form-input" value="587" autocomplete="off" required />
                                </div>

                                <div class="pb-8 pr-6 w-full lg:w-1/4">
                                    <label class="form-label" for="smtpUsername">SMTP Username:</label>
                                    <input type="text" id="smtpUsername" name="MAIL_USERNAME" class="form-input" autocomplete="off" required />
                                </div>

                                <div class="pb-8 pr-6 w-full lg:w-1/4">
                                    <label class="form-label" for="smtpPassword">SMTP Password:</label>
                                    <input type="text" id="smtpPassword" name="MAIL_PASSWORD" class="form-input" autocomplete="off" required />
                                </div>

                                <div class="pb-8 pr-6 w-full lg:w-1/4">
                                    <label class="form-label" for="smtpEncryption">SMTP Encryption:</label>
                                    <input type="text" id="smtpEncryption" name="MAIL_ENCRYPTION" class="form-input" autocomplete="off" required />
                                </div>

                                <div class="pb-8 pr-6 w-full lg:w-1/4">
                                    <label class="form-label" for="MailFromAddress">Mail from address:</label>
                                    <input type="text" id="MailFromAddress" name="MAIL_FROM_ADDRESS" class="form-input" autocomplete="off" required />
                                </div>

                                <div class="pb-8 pr-6 w-full lg:w-1/4">
                                    <label class="form-label" for="mailFromName">Mail from name:</label>
                                    <input type="text" id="mailFromName" name="MAIL_FROM_NAME" class="form-input" autocomplete="off" required />
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
<script>
    function toggleActive(sel, boolean) {
        var el = document.getElementById(sel),
            all = el.getElementsByTagName('input'),
            i;
        for (i = 0; i < all.length; i++) {
            all[i].disabled = boolean;
        }
    }
    document.getElementById('pusherCheck').onchange = function () {
        toggleActive('pusherSetup', this.checked);
    }
    document.getElementById('smtpCheck').onchange = function () {
        toggleActive('smtpSetup', this.checked);
    }

</script>