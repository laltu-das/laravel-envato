<div class="row">
    <div class="col-xl-6 mx-auto">
        <div class="card">
            <div class="card-body flex flex-col justify-center items-center">
                <div class="mar-ver pad-btm text-center">
                    <h1 class="h3 text-2xl font-bold mt-4">Pre-Installation</h1>
                    <p class="mt-2">We ran diagnosis on your server. Review the items that have a red mark on it.
                        <br> If everything is green, you are good to go to the next step.</p>
                </div>

                <table class="mt-5 leading-normal">
                    <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Extensions
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Status
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($extensions as $label => $satisfied)
                        <tr>
                            <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">{{ $label }}</td>

                            <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                                <i class="{{ $satisfied ? 'check' : 'cross' }} mx-auto"></i>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Directories
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Status
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($directories as $label => $satisfied)
                        <tr>
                            <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">{{ $label }}</td>

                            <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                                <i class="{{ $satisfied ? 'check' : 'cross' }} mx-auto"></i>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <p class="text-center mt-8">
                    <a href="{{ $satisfied ? route('install.purchase-code') : '#' }}"
                       class="btn btn-indigo {{ $satisfied ? 'hover:bg-indigo-800' : 'disabled_button' }}" {{ !$satisfied ? '' : 'disabled' }}>
                        Next Step >>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
