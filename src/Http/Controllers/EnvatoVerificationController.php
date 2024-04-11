<?php

namespace Laltu\LaravelEnvato\Http\Controllers;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Session;
use Laltu\LaravelEnvato\Facades\LaravelEnvato;

class EnvatoVerificationController
{
    public function index()
    {
        return inertia('Verification');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
        ]);

        $verificationResult = LaravelEnvato::verify($request->purchase_code);

        if ($verificationResult->isVerified()) {
            Session::flash('success', 'Envato purchase key verified successfully!');
            return redirect()->route('dashboard');
        } else {
            Session::flash('error', 'Invalid Envato purchase key.');
            return redirect()->back()->withInput();
        }
    }
}
